<?php
    include "config.php";
    
    if(!isset($_SESSION)){session_start();}
    
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $UserInativo = mysqli_query($conexao, "SELECT id FROM usuario WHERE email = '$login' AND senha = '$senha' AND ativo = 0  LIMIT 1");
    $qtdeInativo = mysqli_num_rows($UserInativo);
    $idInative = mysqli_fetch_array($UserInativo);

    $UserAtivo = mysqli_query($conexao, "SELECT id FROM usuario WHERE email = '$login' AND senha = '$senha' AND ativo = 1  LIMIT 1");
    $qtdeAtivo = mysqli_num_rows($UserAtivo);
    $idAtive = mysqli_fetch_array($UserAtivo);
    //instancia o e-mail
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';

    if($qtdeAtivo > 0){
        $token =  random_int(1000, 9999);
        //Faço update do token
        $id = $idAtive['id'];
        mysqli_query($conexao, "UPDATE usuario SET token = '$token' WHERE id = $id");
        //Faço o envio  do e-mail para requisitar o token
        //Faço o envio do email
        $mail = new PHPMailer();
        // Configuração do e-mail
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->IsSMTP(); 
        $mail->CharSet = 'UTF-8';
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;     
        $mail->SMTPSecure = 'STARTTLS'; 
        $mail->Host = 'smtp-mail.outlook.com'; 
        $mail->Port = 587;
        $mail->Username = 'savethedatecasamentos@outlook.com'; 
        $mail->Password = '@Savethedate123';
        $mail->SetFrom('savethedatecasamentos@outlook.com', ' Wesley da SaveTheDate');
        $mail->addAddress($login,'');
        $mail->Subject = "Token de Acesso";
        // Detalhes do envio de E-mail
        $mensagem = "<h1> Segue token de acesso: </h1>";
        $mensagem .= "<p>Para confirmar, você precisa informar o seguinte token na plataforma!</p>";
        $mensagem .="<h3>".$token."</h3>";
        $mensagem .= "<br><br><br>Atenciosamente, <b>SAVE THE DATE<b> - Ajudando a realizar sonhos!";
        $mail->msgHTML($mensagem);
        $mail->send();
        
        //Inicio a sessão
        $_SESSION['registro'] = time();
        $tempolimite = 3600; //3600; // Tempo para finalizar sessão em segundos
        $_SESSION['limite'] = $tempolimite;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $idAtive['id'];
        $_SESSION['ativo'] = false;
        $retorno = ["requireValidation"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
        exit;
    } else if ($qtdeInativo > 0){
        $_SESSION['registro'] = time();
        $tempolimite = 3600; //3600; // Tempo para finalizar sessão em segundos
        $_SESSION['limite'] = $tempolimite;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $idInative['id'];
        $_SESSION['ativo'] = false;
        $retorno = ["requireValidation"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
        exit;
    } else {
        header("HTTP/1.1 404 not found");
    }


?>
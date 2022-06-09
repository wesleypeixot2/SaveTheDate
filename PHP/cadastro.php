<?php
    //Carrego minha conexão com o banco de dados
    include "config.php";
    //Carrego os parametros de tela a partir do form
    $nome = $_POST["nome"];
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha_hash"];
    //$data = $_POST['dataCasamento'];  
    //$data = date("Y-m-d",strtotime(str_replace('/','-',$data)));  
    $telefone = $_POST["telefone"];
    $tipoUser = $_POST["tipoUser"];
    $token = random_int(1000, 9999);
    //Faço o insert no banco de dados
    mysqli_query($conexao, "INSERT INTO usuario (nome, senha, email, telefone, tipo,  token)
    VALUES ('$nome', '$senha', '$usuario', '$telefone', '$tipoUser', '$token')");
    //Obtenho o id da conexão para envio do e-mail
    $cid =  $conexao->insert_id;
    if($cid == null){
        $retorno = ["fail"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
        exit;
    }
    //Faço o envio do email
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
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
    $mail->addAddress($usuario,'');
    $mail->Subject = "Confirme seu cadastro";
    // Detalhes do envio de E-mail
    $mensagem = "<h1> Falta Muito Pouco para você poder desfrutar de nossa plataforma! </h1>";
    $mensagem .= "<p>Para confirmar, você precisa informar o seguinte token na plataforma!</p>";
    $mensagem .="<h3>".$token."</h3>";
    $mensagem .= "<br>Caso não tenha sido redirecionado para uma nova página use o link abaixo:<br>";
    $mensagem .= "http://http://localhost/SAVETHEDATE/open/confirmacaoCadastro.html?cid=".$cid;
    $mensagem .= "<br><br><br>Atenciosamente, <b>SAVE THE DATE<b> - Ajudando a realizar sonhos!";
    $mail->msgHTML($mensagem);
    $mail->send();

    $retorno = ["success"] ;
    header('Content-type: application/json');
    echo json_encode($retorno);
    exit;
    
?>
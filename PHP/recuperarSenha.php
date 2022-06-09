<?php
    include 'config.php';
    $email = $_POST["email"];
    $token = random_int(1000, 9999);
    $update = mysqli_query($conexao, "UPDATE usuario set token = '$token' WHERE email = '$email' AND ativo = true");

    if($update){
        $retorno = ['success'] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
    } else {
        header("HTTP/1.1 404 not found");
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
    $mail->addAddress($email,'');
    $mail->Subject = "Esqueceu a senha?";
    $mensagem = "<h> Recebemos uma solicitação de recuperação de senha.</h1>";
    $mensagem .= "<p> Siga o link abaixo e informe o token de acesso abaixo para recuperar sua senha. </p>";
    $mensagem .= "<h3>TOKEN: ".$token."</h3>";
    $mensagem .= "http://localhost/SAVETHEDATE/open/recuperarSenha.html";
    $mensagem .= "<br><br><br>Atenciosamente, <b>SAVE THE DATE<b> - Ajudando a realizar sonhos!";
    $mail->msgHTML($mensagem);
    $mail->send();
?>
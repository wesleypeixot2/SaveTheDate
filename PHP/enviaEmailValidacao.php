<?php
    include "config.php";

    if(!isset($_SESSION)){
        session_start();
    }

    $token =  random_int(1000, 9999);
    
    //Faço update do token
    $id = $_SESSION['id'];
    $usuario = $_SESSION['login'];

    mysqli_query($conexao, "UPDATE usuario SET token = '$token' WHERE id = $id");

    //Faço o envio do email
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    $mail = new PHPMailer();
    // Configuração do e-mail
    $mail->Mailer = "smtp";
    $mail->IsSMTP();
    $mail->CharSet = 'UTF-8';
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;     
    $mail->SMTPSecure = 'STARTTLS'; 
    $mail->Host = 'smtp-mail.outlook.com'; 
    $mail->Port = 587;
    $mail->Username = 'SaveTheDate.doNotReply@outlook.com.br'; 
    $mail->Password = '@Savethedate321';
    $mail->SetFrom('SaveTheDate.doNotReply@outlook.com.br', 'Wesley da SaveTheDate');
    $mail->addAddress($usuario,'');
    $mail->Subject = "Token de Acesso";
    // Detalhes do envio de E-mail
    $mensagem = "<h1> Segue token de acesso: </h1>";
    $mensagem .= "<p>Para confirmar, você precisa informar o seguinte token na plataforma!</p>";
    $mensagem .="<h3>".$token."</h3>";
    $mensagem .= "<br><br><br>Atenciosamente, <b>SAVE THE DATE<b> - Ajudando a realizar sonhos!";
    $mail->msgHTML($mensagem);
    $mail->send();
?>
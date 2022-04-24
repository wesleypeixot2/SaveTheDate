<?php

    $emailDestinatario = $_POST["email"];
  
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/SMTP.php';
    
    $mail = new PHPMailer();
    
    // Configuração
    $mail->IsSMTP();
    $mail->Mailer = "smtp";
    $mail->IsSMTP(); 
    $mail->CharSet = 'UTF-8';   
    $mail->SMTPDebug = 0;
    $mail->SMTPAuth = true;     
    $mail->SMTPSecure = 'ssl'; 
    $mail->Host = 'smtp.gmail.com'; 
    $mail->Port = 465;
    
    // Detalhes do envio de E-mail
    $mail->Username = 'contato.savethedate2022'; 
    $mail->Password = 'Savethedate@1';
    $mail->SetFrom('contato.savethedate2022@gmail.com', ' Wesley da SaveTheDate');
    $mail->addAddress($emailDestinatario,'');
    $mail->Subject = "Confirme seu cadastro";
    $mensagem = "<h1> Seja bem vindo à nossa plataforma! </h1>";
    $mensagem = "<h2> Segue abaixo o nosso token para confirmação de cadastro: </h2>";
    $mensagem .="<h3>".random_int(1000, 9999)."</h3>";
    $mensagem .= "<p>Para confirmar, você precisa entrar na página abaixo e colocar o número de token para confirmação de cadastro.</p>";
    $mensagem .= "http://localhost/SAVETHEDATE/WEBPAGES/open/confirmacaoCadastro.html";
    $mail->msgHTML($mensagem);
    $mail->send();
?>
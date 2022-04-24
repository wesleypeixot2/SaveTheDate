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
    $mail->SetFrom('contato.savethedate2022@gmail.com', 'Gabriel da SaveTheDate');
    $mail->addAddress($emailDestinatario,'');
    $mail->Subject = "Esqueceu a senha";
    $mensagem = "<h1> Token para cadastrar nova senha </h1>";
    $mensagem .="<h3>".random_int(1000, 9999)."</h3>";
    $mensagem .= "http://localhost/SAVETHEDATE/open/recuperarSenha.html";
    $mail->msgHTML($mensagem);
    $mail->send();

?>
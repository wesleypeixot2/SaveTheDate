<?php
    include 'config.php';
    $email = $_POST["email"];
    $token = random_int(1000, 9999);

    $emailValido = mysqli_query($conexao, "SELECT * FROM usuario WHERE email = '$email' AND ativo = 1");
    $isEmailValido = mysqli_num_rows($emailValido) > 0;
    $update = mysqli_query($conexao, "UPDATE usuario set token = '$token' WHERE email = '$email' AND ativo = 1");

    if($isEmailValido){
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
    $mail->addAddress($email,'');
    $mail->Subject = "Token de Acesso";
    // Detalhes do envio de E-mail
    $mensagem = "<h> Recebemos uma solicitação de recuperação de senha.</h1>";
    $mensagem .= "<p> Siga o link abaixo e informe o token de acesso abaixo para recuperar sua senha. </p>";
    $mensagem .= "<h3>TOKEN: ".$token."</h3>";
    $mensagem .= "http://localhost/SAVETHEDATE/webpages/recuperarSenha.html";
    $mensagem .= "<br><br><br>Atenciosamente, <b>SAVE THE DATE<b> - Ajudando a realizar sonhos!";
    $mail->msgHTML($mensagem);
    $mail->send();
?>
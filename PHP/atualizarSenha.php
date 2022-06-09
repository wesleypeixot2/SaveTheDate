<?php
    include "config.php";

    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $token = $_POST["token"];
    
    $update = mysqli_query($conexao, "UPDATE usuario set senha = '$senha' WHERE email = '$email' AND token = '$token' AND ativo = true");

    if($update){
        $retorno = ["success"];
        header('Content-type: application/json');
        echo json_encode($retorno);
    } else {
        header("HTTP/1.1 404 not found");
        $retorno = ["fail"] ;
    }


?>
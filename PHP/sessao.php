<?php
    session_start();
    
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if($login == "gabe@teste" && $senha == "123456"){
        $_SESSION['login'] = $login;
        $retorno = ["login"=>"gabe.lima@teste","nome"=>"Gabriel Lindo"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
    } else {
        header("HTTP/1.1 404 not found");
    }

?>
<?php
    if(!isset($_SESSION)){session_start();}
    
    $login = $_POST["login"];
    $senha = $_POST["senha"];

    if($login == "gabe@teste" && $senha == "123456"){
        $_SESSION['registro'] = time();
        $tempolimite = 3600; // Tempo para finalizar sessão em segundos
        $_SESSION['limite'] = $tempolimite;
        $_SESSION['login'] = $login;
        $retorno = ["login"=>"gabe.lima@teste","nome"=>"Gabriel Lindo"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
        exit;
    } else {
        header("HTTP/1.1 404 not found");
    }


?>
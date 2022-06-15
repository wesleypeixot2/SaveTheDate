<?php
    include "config.php";

    if(!isset($_SESSION)){
        session_start();
    }

    if(!isset($_SESSION['login'])){
        $retorno = 'naoLogado';
        header("HTTP/1.1 404 not found");
        echo json_encode($retorno);
    }

    $userActive = $_SESSION['ativo'];
    
    if($_SESSION['registro']){
        $segundos = time() - $_SESSION['registro'];
    }

    if($segundos > $_SESSION['limite'] || !$userActive){
        unset($_SESSION['registro']);
        unset($_SESSION['login']);
        unset($_SESSION['limite']);
        unset($_SESSION['id']);
        unset( $_SESSION['ativo']);
        session_destroy();
        $retorno = 'naoLogado';
        header("HTTP/1.1 404 not found");
        echo json_encode($retorno);
    } else { 
        $_SESSION['registro'] = time();
        $retorno = "logado";
        header('Content-type: application/json');
        echo json_encode($retorno);
    } 
?>


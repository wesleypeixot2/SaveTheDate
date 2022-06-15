<?php
    include "config.php";
    
    if(!isset($_SESSION)){session_start();}
    
    $login = $_POST["login"];
    $senha = $_POST["senha"];
    $UserInativo = mysqli_query($conexao, "SELECT id FROM usuario WHERE email = '$login' AND senha = '$senha' AND ativo = 0  LIMIT 1");
    $qtdeInativo = mysqli_num_rows($UserInativo);
    $idInative = mysqli_fetch_array($UserInativo);

    $UserAtivo = mysqli_query($conexao, "SELECT id FROM usuario WHERE email = '$login' AND senha = '$senha' AND ativo = 1  LIMIT 1");
    $qtdeAtivo = mysqli_num_rows($UserAtivo);
    $idAtive = mysqli_fetch_array($UserAtivo);

    if($qtdeAtivo > 0){
        //Inicio a sessão
        $_SESSION['registro'] = time();
        $tempolimite = 3600; //3600; // Tempo para finalizar sessão em segundos
        $_SESSION['limite'] = $tempolimite;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $idAtive['id'];
        $_SESSION['ativo'] = false;
        $retorno = ["enviarTokenConfirmacao"];
        header('Content-type: application/json');
        echo json_encode($retorno);
        exit;
    } else if ($qtdeInativo > 0){
        //Inicia a sessão
        $_SESSION['registro'] = time();
        $tempolimite = 3600; //3600; // Tempo para finalizar sessão em segundos
        $_SESSION['limite'] = $tempolimite;
        $_SESSION['login'] = $login;
        $_SESSION['id'] = $idInative['id'];
        $_SESSION['ativo'] = false;
        $retorno = ["requireValidation"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
        exit;
    } else {
        header("HTTP/1.1 404 not found");
        exit;
    }

    
?>
<?php
    
    include "config.php";
    if(!isset($_SESSION)){session_start();}

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    } else {
        $id = $_POST["id"];
    }
    
    $token = $_POST["token"];
    $selectToUpdate = mysqli_query($conexao, "SELECT * FROM usuario WHERE id = $id AND token = '$token'");
    $isUserValido = mysqli_num_rows($selectToUpdate);
    if($isUserValido){
        $update = mysqli_query($conexao, "UPDATE usuario set ativo = 1 WHERE id = $id AND token = '$token'");
        $_SESSION['ativo'] = true;
        $retorno = ["updated"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
    } else {
        header("HTTP/1.1 404 not found");
    }
?>
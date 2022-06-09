<?php
    
    include "config.php";
    if(!isset($_SESSION)){session_start();}
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    } else {
        $id = $_POST["id"];
    }
    $token = $_POST["token"];
    $update = mysqli_query($conexao, "UPDATE usuario set ativo = true  WHERE id = $id AND token = '$token'");

    if($update){
        $_SESSION['ativo'] = true;
        $retorno = ["updated"] ;
        header('Content-type: application/json');
        echo json_encode($retorno);
    } else {
        header("HTTP/1.1 404 not found");
    }
?>
<?php
    include "config.php";
    
    if(!isset($_SESSION)){session_start();}

    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
    }

    $senha = $_POST["senha"];
    
    $update = mysqli_query($conexao, "UPDATE usuario set senha = '$senha' WHERE id = $id");

    if($update){
        $retorno = ["success"];
        header('Content-type: application/json');
        echo json_encode($retorno);
    } else {
        header("HTTP/1.1 404 not found");
        $retorno = ["fail"] ;
    }


?>
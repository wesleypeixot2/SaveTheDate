<?php
    include "config.php";
    
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $searchUserActive = mysqli_query($conexao, "SELECT * FROM usuario WHERE  id = '$id' AND ativo = 1 LIMIT 1");
        $userActive = (mysqli_num_rows($searchUserActive) > 0);
    }

    if(!isset($_SESSION)){session_start();}

    if(!$_SESSION['login']){
        header("Location:../open/login.html");
    }

    if($_SESSION['registro']){
        $segundos = time() - $_SESSION['registro'];
    }

    $userActive = $_SESSION['ativo'];

    if($segundos > $_SESSION['limite'] || !$userActive){
        unset($_SESSION['registro']);
        unset($_SESSION['login']);
        unset($_SESSION['limite']);
        unset($_SESSION['id']);
        unset( $_SESSION['ativo']);
        session_destroy();
        header("Location:../open/login.html");
    } else { 
        $_SESSION['registro'] = time();
    } 
?>
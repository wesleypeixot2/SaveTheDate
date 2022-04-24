<?php
    if(!isset($_SESSION)){session_start();}

    if(!$_SESSION['login']){
        header("Location:../open/login.html");
    }

    if($_SESSION['registro']){
        $segundos = time() - $_SESSION['registro'];
    }

    if($segundos > $_SESSION['limite']){
        unset($_SESSION['registro']);
        unset($_SESSION['login']);
        unset($_SESSION['limite']);
        session_destroy();
        header("Location:../open/login.html");
    } else { 
        $_SESSION['registro'] = time();
    } 
?>
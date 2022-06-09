<?php
    unset($_SESSION['registro']);
    unset($_SESSION['login']);
    unset($_SESSION['limite']);
    unset($_SESSION['id']);
    unset( $_SESSION['ativo']);
    session_destroy();
    header("Location:../open/index.html"); 
?>
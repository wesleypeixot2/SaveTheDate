<?php
    if(!isset($_SESSION)){session_start();}
    
    $_SESSION['ativo'] = false;
    include "./validaSessao.php"

    header("Location:../webpages/index.html"); 
?>
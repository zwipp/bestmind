<?php

    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: home.php");
        exit;
    }

?>



Vc logou!!!

<a href="sair.php">Sair</a>
<?php
    session_start();
    // destruction de la session 
    if(isset($_SESSION['pseudo'])){
        session_destroy();
    }
    header('Location: ../index.php');
?>
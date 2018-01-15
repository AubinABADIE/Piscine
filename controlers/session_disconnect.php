<?php 
    session_start();

    $_SESSION = array();
    // Destruction de la session
    session_destroy();
    // Destruction du tableau de session
    unset($_SESSION);
            
    header('Location: ../views/session/new.php');
    exit();
?>
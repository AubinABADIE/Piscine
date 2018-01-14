<?php
    session_start();

    if(!isset($_SESSION['Logged']) || !$_SESSION['Logged']){
        header('Location: ../session/new.php');
        exit(); 
    }
?>
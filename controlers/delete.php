<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Editor, Name, Email, Phone FROM editor');

    header("Location: tasklist.php");
?>
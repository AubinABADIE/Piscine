<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('DELETE FROM game WHERE ID_Game = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Game = "'.$id.'"');
    unset($result);

    header("Location: ../views/editors/index.php");
    exit();
?>
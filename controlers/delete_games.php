<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Editor FROM game WHERE ID_Game = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);

    $result = $bdd->query('DELETE FROM game WHERE ID_Game = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Game = "'.$id.'"');
    unset($result);

    header('Location: ../views/editors/show.php?id='.$data[0]['ID_Editor']);
    exit();
?>
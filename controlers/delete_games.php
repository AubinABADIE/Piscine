<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Editor FROM contact WHERE ID_Contact = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);

    $result = $bdd->query('DELETE FROM game WHERE ID_Game = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Game = "'.$id.'"');
    unset($result);

    foreach ($data as $value) {
        header('Location: ../views/editors/show.php?id=' . $value['ID_Editor']);
    }
    exit();
?>
<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Editor FROM contact WHERE ID_Contact = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    $result = $bdd->query('DELETE FROM contact WHERE ID_Contact = "'.$id.'"');

    foreach ($data as $value) {
        header('Location: ../views/editors/show.php?id=' . $value['ID_Editor']);
    }
?>
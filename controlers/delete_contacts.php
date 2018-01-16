<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Editor FROM contact WHERE ID_Contact = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);
    
    $result = $bdd->query('DELETE FROM contact WHERE ID_Contact = "'.$id.'"');
    unset($result);

    header('Location: ../views/editors/show.php?id=' . $data[0]['ID_Editor']);
    exit();
?>
<?php

    require('connect_bdd.php');

    $id = $_GET['id'];
    
    $result = $bdd->query('DELETE FROM space WHERE ID_Space = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Space = "'.$id.'"');
    unset($result);

    header('Location: ../views/spaces/index.php');
    exit();
?>
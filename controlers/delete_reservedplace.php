<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Booking FROM reserved_place r INNER JOIN lodgment l ON (r.ID_Space = l.ID_Space) WHERE ID_Space = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);
    
    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Space = "'.$id.'"');
    unset($result);

    foreach ($data as $value) {
        header('Location: ../views/editors/show.php?id=' . $value['ID_Booking']);
    }
    exit();
?>
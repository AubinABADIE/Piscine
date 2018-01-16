<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT r.ID_Booking FROM reserved_place r INNER JOIN space s ON (r.ID_Space = s.ID_Space) WHERE r.ID_Space = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);
    
    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Space = "'.$id.'"');
    unset($result);

    header('Location: ../views/reservations/index.php?id="'.$data[0]['ID_Booking']);
    exit();
?>
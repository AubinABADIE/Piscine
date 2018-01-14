<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('DELETE FROM booking WHERE ID_Booking = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM bill WHERE ID_Booking = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM lodge WHERE ID_Booking = "'.$id.'"');
    unset($result);

    $result = $bdd->query('DELETE FROM reserved_place WHERE ID_Booking = "'.$id.'"');
    unset($result);

    header("Location: ../views/reservations/index.php");
    exit();
?>
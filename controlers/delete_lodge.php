<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Booking FROM lodge l INNER JOIN lodgment lo ON (l.ID_Lodgment = lo.ID_Lodgment) WHERE ID_Lodgment = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);
    
    $result = $bdd->query('DELETE FROM lodge WHERE ID_Lodgment = "'.$id.'"');
    unset($result);

    foreach ($data as $value) {
        header('Location: ../views/editors/show.php?id=' . $value['ID_Booking']);
    }
    exit();
?>
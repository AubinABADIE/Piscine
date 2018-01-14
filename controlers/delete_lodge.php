<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('SELECT ID_Booking FROM lodge WHERE ID_Booking = "'.$id.'"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    unset($result);
    
    $result = $bdd->query('DELETE FROM contact WHERE ID_Contact = "'.$id.'"');
    unset($result);

    foreach ($data as $value) {
        header('Location: ../views/editors/show.php?id=' . $value['ID_Editor']);
    }
    exit();
?>
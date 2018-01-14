<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('DELETE FROM contact WHERE ID_Contact = "'.$id.'"');
    unset($result);

    header("Location: ../views/editors/show.php");
    exit();
?>
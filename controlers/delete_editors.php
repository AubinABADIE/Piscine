<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('DELETE FROM editor WHERE ID_Editor = "'.$id.'"');
    unset($result);
    $result = $bdd->query('DELETE FROM trace WHERE ID_Editor = "'.$id.'"');
    unset($result);
    $result = $bdd->query('DELETE FROM contact WHERE ID_Editor = "'.$id.'"');
    unset($result);
    $result = $bdd->query('DELETE FROM game WHERE ID_Editor = "'.$id.'"');
    unset($result);
    $result = $bdd->query('DELETE FROM booking WHERE ID_Editor = "'.$id.'"');
    unset($result);
    $result = $bdd->query('DELETE FROM space WHERE ID_Editor = "'.$id.'"');
    unset($result);

    header("Location: ../views/editors/index.php");
?>
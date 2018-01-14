<?php

    require('connect_bdd.php');

    $id = $_GET['id'];

    $result = $bdd->query('DELETE FROM editor WHERE ID_Editor = "'.$id.'"');

    header("Location: ../views/editors/index.php");
?>
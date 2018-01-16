<?php

    require('connect_bdd.php');

    $id = $_GET['id'];
    
    $result = $bdd->query('DELETE FROM lodgment WHERE ID_Lodgment = "'.$id.'"');
    unset($result);

    header('Location: ../views/lodgments/index.php');
    exit();
?>
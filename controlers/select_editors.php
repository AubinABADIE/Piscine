<?php

    require('connect_bdd.php');

    $stmt = $pdo->query('SELECT * FROM editor;');
    $data = $stmt->fetchAll();

    foreach ($data as $key => $value) {
        echo '<div>'.$value['Value1'].'</div>';
        echo '<div>'.$value['Value2'].'</div>';
        echo '<div>'.$value['Value3'].'</div>';
    }

    $stmt->closeCursor();
    $stmt = null;
?>
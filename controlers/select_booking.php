<?php
    require('connect_bdd.php');

    $result = $bdd->query('SELECT ... FROM ...');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        echo '<tr id="'.$value['ID_Booking'].'">';
        echo '<td>'.$value['...'].'</td>';
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>
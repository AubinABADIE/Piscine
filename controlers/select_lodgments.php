<?php
    require('connect_bdd.php');

    $result = $bdd->query('SELECT * FROM lodgment');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        echo '<tr id="'.$value['ID_Lodgment'].'">';
        echo '<td>'.$value['Address'].', '.$value['Postal_Code'].' '.$value['Town'].'</td>';
        echo '<td>'.$value['Capacity'].'</td>';
        echo '<td>'.$value['Night_Price'].'</td>';
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>
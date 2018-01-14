<?php
    require('connect_bdd.php');

    $result = $bdd->query('SELECT s.*, t.Label AS Type FROM space s INNER JOIN gametype t ON (s.ID_GameType = t.ID_GameType)');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        $result2 = $bdd->query('SELECT Quantity FROM reserved_place WHERE ID_SPACE = "'.$value['ID_Space'].'"');
        $data2 = $result2->fetchAll(PDO::FETCH_ASSOC);
        $qty = 0;
        foreach ($data2 as $value2) {
            $qty += $value2['Quantity'];
        }
        $result2->closeCursor();
        unset($result2);
        
        echo '<tr id="'.$value['ID_Space'].'">';
        echo '<td>'.$value['Label'].'</td>';
        echo '<td>'.$value['Type'].'</td>';
        echo '<td>'.$qty.'</td>';
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>
<?php
    require('connect_bdd.php');

    $result = $bdd->query('SELECT s.*, e.Name AS Editor FROM space s INNER JOIN editor e ON (s.ID_Editor = e.ID_Editor)');
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
        
        echo '<tr id="'.$value['ID_Space'].'" class="spaceeditor-line">';
        echo '<td>'.$value['Label'].'</td>';
        echo '<td>'.$value['Editor'].'</td>';
        echo '<td>'.$qty.'</td>';
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>

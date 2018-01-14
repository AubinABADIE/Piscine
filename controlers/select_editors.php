<?php
    require('connect_bdd.php');

    $result = $bdd->query('SELECT ID_Editor, Name, Email, Phone FROM editor');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        echo '<tr id="'.$value['ID_Editor'].'">';
        echo '<td>'.$value['Name'].'</td>';
        echo '<td>'.$value['Email'].'</td>';
        echo '<td>'.$value['Phone'].'</td>';
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>
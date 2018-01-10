<?php
    require('connect_bdd.php');

    $result = $bdd->query('SELECT ID_Editor, Name, Email, Phone FROM editor');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        echo '<tr>';
        echo '<td>'.$value['ID_Editor'].'</td>';
        echo '<td>'.$value['Name'].'</td>';
        echo '<td>'.$value['Email'].'</td>';
        echo '<td>'.$value['Phone'].'</td>';
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>
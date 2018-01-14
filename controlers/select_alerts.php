<?php
    require('connect_bdd.php');
    $result = $bdd->query('SELECT ID_Trace,Name,Date_First_Contact,Date_Second_Contact,Replied FROM booking FULL JOIN editor ON trace.ID_Editor = editor.ID_Editor ORDER BY ID_Trace');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $value) {
        echo '<tr id="'.$value['ID_Trace'].'">';
        echo '<td>'.$value['ID_Trace'].'</td>';
		echo '<td>'.$value['Name'].'</td>';
        echo '<td>'.$value['Date_First_Contact'].'</td>';
        echo '<td>'.$value['Date_Second_Contact'].'</td>';
		echo '<td>'.$value['Replied'].'</td>';
        echo '</tr>';
    }
    $result->closeCursor();
    unset($result);
?>
<?php
    require('connect_bdd.php');
    $result = $bdd->query('SELECT ID_Booking,Date_Booking,Commentary,Name,ID_Lodgment,ID_Space FROM booking FULL JOIN editor ON booking.ID_Editor = editor.ID_Editor WHERE Is_Canceled = FALSE');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);
    foreach ($data as $value) {
        echo '<tr id="'.$value['ID_Booking'].'">';
        echo '<td>'.$value['ID_Booking'].'</td>';
	echo '<td>'.$value['Name'].'</td>';
        echo '<td>'.$value['Date_Booking'].'</td>';
        echo '<td>'.$value['Commentary'].'</td>';
	echo '<td>'.$value['ID_Lodgment'].'</td>';
        echo '<td>'.$value['ID_Space'].'</td>';
        echo '</tr>';
    }
    $result->closeCursor();
    unset($result);
?>

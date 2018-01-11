<?php
    include ('connect_bdd.php');
                                                    
    $result = $bdd->query('SELECT t.Date_First_Contact, t.Date_Second_Contact, t.Replied FROM trace t INNER JOIN editor e ON (t.ID_Editor = e.ID_Editor) WHERE e.ID_Editor = "1"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        echo '<p>Date premier contact : '.$value['Date_First_Contact'].'</p>';
        echo '<p>Date second contact : '.$value['Date_Second_Contact'].'</p>';
        echo '<p>Date réponse : '.$value['Replied'].'</p>';
    }

    $result->closeCursor();
    unset($result);
?>
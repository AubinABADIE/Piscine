<?php
    include ('connect_bdd.php');
                                                    
    $result = $bdd->query('SELECT g.Name, g.Quantity, g.IsEndowment, g.IsPrototype, s.Label AS Size, t.label AS Type FROM (game g INNER JOIN gamesize s ON (g.ID_GameSize = s.ID_GameSize)) INNER JOIN gametype t ON (g.ID_GameType = t.ID_GameType) WHERE g.ID_Editor = "1"');
    $data = $result->fetchAll(PDO::FETCH_ASSOC);

    foreach ($data as $value) {
        echo '<tr>';
        echo '<td>'.$value['Name'].'</td>';
        echo '<td>'.$value['Quantity'].'</td>';
        echo '<td>'.$value['Size'].'</td>';
        echo '<td>'.$value['Type'].'</td>';
        if ($value['IsEndowment'] == TRUE) {
            echo '<td>Oui</td>';
        } else {
            echo '<td>Non</td>';
        }
        if ($value['IsPrototype'] == TRUE) {
            echo '<td>Oui</td>';
        } else {
            echo '<td>Non</td>';
        }
        echo '</tr>';
    }

    $result->closeCursor();
    unset($result);
?>
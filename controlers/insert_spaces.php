<?php

    require('./connect_bdd.php');

	$insert = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['Lib1'])) || ($_POST['Lib1'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['type'])) || ($_POST['type'] == '')) {
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.
            
			$result = $bdd->prepare('INSERT INTO space (ID_Space, Label, ID_GameType, ID_Editor) VALUES (?, ?, ?, ?)');
            $result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $_POST['Lib1'], PDO::PARAM_STR);
            if ($_POST['type'] == 'Type') {
                $result->bindParam(3, $_POST['typeZone'], PDO::PARAM_STR);
                $result->bindParam(4, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(3, $myNull, PDO::PARAM_NULL);
                $result->bindParam(4, $_POST['editorZone'], PDO::PARAM_STR);
            }
            
            try {
                $result->execute();
                $result->closeCursor();
                unset($result);
                $redirect = true;
            } catch (PDOException $exception) {
                echo "<!-- Erreur lors de l\'insertion.\n" . $exception->getMessage() . "\n -->";
            }

            if ($redirect) {
                header('Location: ../views/spaces/index.php');
                    exit();
            }
        }
	}
?>

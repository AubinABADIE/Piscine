<?php

    require('connect_bdd.php');
    
	$update = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['name'])) || ($_POST['name'] == '')) {
			$update = false;
		}

		if ((!isset($_POST['quantity'])) ||  ($_POST['quantity'] == '')) {
			$update = false;
		}
        
        if ((!isset($_POST['size'])) ||  ($_POST['size'] == '')) {
			$update = false;
		}
        
        if ((!isset($_POST['type'])) ||  ($_POST['type'] == '')) {
			$update = false;
		}
        
        if ((!isset($_POST['dotation'])) ||  ($_POST['dotation'] == '')) {
			$update = false;
		}
        
        if ((!isset($_POST['prototype'])) ||  ($_POST['prototype'] == '')) {
			$update = false;
		}

		if ($update) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$result = $bdd->prepare('UPDATE game SET Name=:v1, Rules=:v2, Quantity=:v3, IsEndowment=:v4, IsPrototype=:v5, ID_GameSize=:v6, ID_GameType=:v7 WHERE ID_Game=:id');
            
			$result->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $result->bindParam(':v1', $_POST['name'], PDO::PARAM_STR);
            if(is_null($_POST['rules']) || $_POST['rules'] == ''){
                $result->bindParam(':v2', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v2', $_POST['rules'], PDO::PARAM_STR);
            }
            $result->bindParam(':v3', $_POST['quantity'], PDO::PARAM_INT);
            $result->bindParam(':v4', $_POST['dotation'], PDO::PARAM_STR);
            $result->bindParam(':v5', $_POST['prototype'], PDO::PARAM_STR);
            $result->bindParam(':v6', $_POST['size'], PDO::PARAM_INT);
            $result->bindParam(':v7', $_POST['type'], PDO::PARAM_INT);
        
			try {
				$result->execute();
				$result->closeCursor();
                unset($result);
				$redirect = true;
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de la mise à jour.\n" . $exception->getMessage() . "\n -->";
			}

			if ($redirect) {
                $result = $bdd->query('SELECT ID_Editor FROM game WHERE ID_Game = "'.$_GET['id'].'"');
                $data = $result->fetchAll(PDO::FETCH_ASSOC);
				header('Location: ../views/editors/show.php?id='.$data[0]['ID_Editor']);
				exit();
			}
		}
	}
?>
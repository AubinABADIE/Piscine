<?php

    require('connect_bdd.php');
    
	$update = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['name'])) || ($_POST['name'] == '')) {
			$update = false;
		}

		if ((!isset($_POST['dfirst'])) ||  ($_POST['dfirst'] == '')) {
			$update = false;
		}

		if ($update) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$result = $bdd->prepare('UPDATE editor SET Name=:v1, Address=:v2, Town=:v3, Postal_Code=:v4, Email=:v5, Phone=:v6 WHERE ID_Editor=:id');
            
			$result->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $result->bindParam(':v1', $_POST['name'], PDO::PARAM_STR);
            if(is_null($_POST['address']) || $_POST['address'] == ''){
                $result->bindParam(':v2', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v2', $_POST['address'], PDO::PARAM_STR);
            }
            if(is_null($_POST['town']) || $_POST['town'] == ''){
                $result->bindParam(':v3', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v3', $_POST['town'], PDO::PARAM_STR);
            }
            if(is_null($_POST['postalcode']) || $_POST['postalcode'] == ''){
                $result->bindParam(':v4', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v4', $_POST['postalcode'], PDO::PARAM_STR);
            }
            if(is_null($_POST['email']) || $_POST['email'] == ''){
                $result->bindParam(':v5', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v5', $_POST['email'], PDO::PARAM_STR);
            }
            if(is_null($_POST['phone']) || $_POST['phone'] == ''){
                $result->bindParam(':v6', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v6', $_POST['phone'], PDO::PARAM_STR);
            }

			try {
				$result->execute();
				$result->closeCursor();
                unset($result);
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de la mise à jour.\n" . $exception->getMessage() . "\n -->";
			}
            
            $result = $bdd->prepare('UPDATE trace SET Date_First_Contact=:v1, Date_Second_Contact=:v2, Replied=:v3 WHERE ID_Editor=:id');

			$result->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
			$result->bindParam(':v1', $_POST['dfirst'], PDO::PARAM_STR);
            if(is_null($_POST['dsecond']) || $_POST['dsecond'] == ''){
                $result->bindParam(':v2', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v2', $_POST['dsecond'], PDO::PARAM_STR);
            }
			if(is_null($_POST['replied']) || $_POST['replied'] == ''){
                $result->bindParam(':v3', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v3', $_POST['replied'], PDO::PARAM_STR);
            }
			

			try {
				$result->execute();
				$result->closeCursor();
                unset($result);
				$redirect = true;
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de la mise à jour.\n" . $exception->getMessage() . "\n -->";
			}

			if ($redirect) {
				header('Location: ../views/editors/show.php?id='.$_GET['id']);
				exit();
			}
		}
	}
?>
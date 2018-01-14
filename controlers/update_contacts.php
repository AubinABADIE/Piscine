<?php

    require('connect_bdd.php');
    
	$update = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['lastname'])) || ($_POST['lastname'] == '')) {
			$update = false;
		}

		if ((!isset($_POST['firstname'])) ||  ($_POST['firstname'] == '')) {
			$update = false;
		}

		if ($update) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$result = $bdd->prepare('UPDATE contact SET Lastname=:v1, Firstname=:v2, Job=:v3, Email=:v4, Phone=:v5 WHERE ID_Contact=:id');
            
			$result->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
            $result->bindParam(':v1', $_POST['lastname'], PDO::PARAM_STR);
            $result->bindParam(':v2', $_POST['firstname'], PDO::PARAM_STR);
            if(is_null($_POST['job']) || $_POST['job'] == ''){
                $result->bindParam(':v3', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v3', $_POST['job'], PDO::PARAM_STR);
            }
            if(is_null($_POST['email']) || $_POST['email'] == ''){
                $result->bindParam(':v4', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v4', $_POST['email'], PDO::PARAM_STR);
            }
            if(is_null($_POST['phone']) || $_POST['phone'] == ''){
                $result->bindParam(':v5', $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(':v5', $_POST['phone'], PDO::PARAM_STR);
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
				header('Location: ../views/editors/show.php');
				exit();
			}
		}
	}
?>
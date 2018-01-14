<?php
    
    require('connect_bdd.php');
    
	$insert = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['lastname'])) || ($_POST['lastname'] == '')) {
			$insert = false;
		}

		if ((!isset($_POST['firstname'])) ||  ($_POST['firstname'] == '')) {
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$result = $bdd->prepare('INSERT INTO contact (ID_Contact, Lastname, Firstname, Job, Email, Phone, ID_Editor) VALUES (?, ?, ?, ?, ?, ?, ?)');
            
			$result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $_POST['lastname'], PDO::PARAM_STR);
            $result->bindParam(3, $_POST['firstname'], PDO::PARAM_STR);
            if(is_null($_POST['job']) || $_POST['job'] == ''){
                $result->bindParam(4, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(4, $_POST['job'], PDO::PARAM_STR);
            }
            if(is_null($_POST['email']) || $_POST['email'] == ''){
                $result->bindParam(5, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(5, $_POST['email'], PDO::PARAM_STR);
            }
            if(is_null($_POST['phone']) || $_POST['phone'] == ''){
                $result->bindParam(6, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(6, $_POST['phone'], PDO::PARAM_STR);
            }
            $result->bindParam(7, $_GET['id'], PDO::PARAM_INT);
            
			try {
				$result->execute();
				$result->closeCursor();
                unset($result);
				$redirect = true;
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de l'insertion.\n" . $exception->getMessage() . "\n -->";
			}

			if ($redirect) {
				header('Location: ../views/editors/show.php?id='.$_GET['id']);
				exit();
			}
		}
	}
?>
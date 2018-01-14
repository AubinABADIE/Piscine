<?php

    require('./connect_bdd.php');

	$insert = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['name'])) || ($_POST['name'] == '')) {
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.
            
			$result = $bdd->prepare('INSERT INTO editor (ID_Editor, Name, Address, Town, Postal_Code, Email, Phone) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $_POST['name'], PDO::PARAM_STR);
            if(is_null($_POST['address']) || $_POST['address'] == ''){
                $result->bindParam(3, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(3, $_POST['address'], PDO::PARAM_STR);
            }
            if(is_null($_POST['town']) || $_POST['town'] == ''){
                $result->bindParam(4, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(4, $_POST['town'], PDO::PARAM_STR);
            }
            if(is_null($_POST['postalcode']) || $_POST['postalcode'] == ''){
                $result->bindParam(5, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(5, $_POST['postalcode'], PDO::PARAM_STR);
            }
            if(is_null($_POST['email']) || $_POST['email'] == ''){
                $result->bindParam(6, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(6, $_POST['email'], PDO::PARAM_STR);
            }
            if(is_null($_POST['phone']) || $_POST['phone'] == ''){
                $result->bindParam(7, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(7, $_POST['phone'], PDO::PARAM_STR);
            }
            $name = $_POST['name'];
            
            try {
				$result->execute();
				$result->closeCursor();
                unset($result);
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de l\'insertion.\n" . $exception->getMessage() . "\n -->";
			}
            
            $result = $bdd->query('SELECT ID_Editor FROM editor WHERE Name = "'.$name.'"');
            $data = $result->fetchAll(PDO::FETCH_ASSOC);
            $id = $data[0]['ID_Editor'];
            $result->closeCursor();
            unset($result);
			
            
            $result = $bdd->prepare('INSERT INTO trace(ID_Trace, Date_First_Contact, Date_Second_Contact, Replied, ID_Editor) VALUES (?, ?, ?, ?, ?)');
            $result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $myNull, PDO::PARAM_NULL);
            $result->bindParam(3, $myNull, PDO::PARAM_NULL);
            $result->bindParam(4, $myNull, PDO::PARAM_NULL);
            $result->bindParam(5, $id, PDO::PARAM_INT);
            
			try {
				$result->execute();
				$result->closeCursor();
                unset($result);
				$redirect = true;
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de l\'insertion.\n" . $exception->getMessage() . "\n -->";
			}

			if ($redirect) {
				header('Location: ../views/editors/index.php');
				exit();
			}
		}
	}
?>
<?php

    require('./connect_bdd.php');

	$insert = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['address'])) || ($_POST['address'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['town'])) || ($_POST['town'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['postalcode'])) || ($_POST['postalcode'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['capacity'])) || ($_POST['capacity'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['price'])) || ($_POST['price'] == '')) {
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.
            
			$result = $bdd->prepare('INSERT INTO lodgment (ID_Lodgment, Address, Town, Postal_Code, Capacity, Night_Price) VALUES (?, ?, ?, ?, ?, ?)');
            $result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $_POST['address'], PDO::PARAM_STR);
            $result->bindParam(3, $_POST['town'], PDO::PARAM_STR);
            $result->bindParam(4, $_POST['postalcode'], PDO::PARAM_STR);
            $result->bindParam(5, $_POST['capacity'], PDO::PARAM_INT);
            $result->bindParam(6, $_POST['price'], PDO::PARAM_INT);
            
            try {
                $result->execute();
                $result->closeCursor();
                unset($result);
                $redirect = true;
            } catch (PDOException $exception) {
                echo "<!-- Erreur lors de l\'insertion.\n" . $exception->getMessage() . "\n -->";
            }

            if ($redirect) {
                header('Location: ../views/lodgments/index.php');
                    exit();
            }
        }
	}
?>
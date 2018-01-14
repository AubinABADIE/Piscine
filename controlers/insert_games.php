<?php

    require('connect_bdd.php');
    
	$insert = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['name'])) || ($_POST['name'] == '')) {
			$insert = false;
		}

		if ((!isset($_POST['quantity'])) ||  ($_POST['quantity'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['size'])) ||  ($_POST['size'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['type'])) ||  ($_POST['type'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['dotation'])) ||  ($_POST['dotation'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['prototype'])) ||  ($_POST['prototype'] == '')) {
			$insert = false;
		}
        
        if ((!isset($_POST['renvoi'])) ||  ($_POST['renvoi'] == '')) {
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$result = $bdd->prepare('INSERT INTO game (ID_Game, Name, Rules, Quantity, IsEndowment, IsPrototype, ToReturn, ID_Editor, ID_GameSize, ID_GameType) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
            
            $result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $_POST['name'], PDO::PARAM_STR);
            if(is_null($_POST['rules']) || $_POST['rules'] == ''){
                $result->bindParam(3, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(3, $_POST['rules'], PDO::PARAM_STR);
            }
            $result->bindParam(4, $_POST['quantity'], PDO::PARAM_INT);
            $result->bindParam(5, $_POST['dotation'], PDO::PARAM_STR);
            $result->bindParam(6, $_POST['prototype'], PDO::PARAM_STR);
            $result->bindParam(7, $_POST['renvoi'], PDO::PARAM_STR);
            $result->bindParam(8, $_GET['id'], PDO::PARAM_INT);
            $result->bindParam(9, $_POST['size'], PDO::PARAM_INT);
            $result->bindParam(10, $_POST['type'], PDO::PARAM_INT);
        
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
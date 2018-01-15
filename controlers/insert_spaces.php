<?php

    require('./connect_bdd.php');

	$insert = true;
    $myNull = null;

	if (count($_POST) > 0) {
		if ((!isset($_POST['Lab1'])) || ($_POST['LAb1'] == '')) {
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.
            
			$result = $bdd->prepare('INSERT INTO space (ID_Space, Label, Type, Editor) VALUES (?, ?, ?, ?)');
            $result->bindParam(1, $myNull, PDO::PARAM_NULL);
            $result->bindParam(2, $_POST['name'], PDO::PARAM_STR);
            if(is_null($_POST['Lab1']) || $_POST['Lab1'] == ''){
                $result->bindParam(3, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(3, $_POST['Lab1'], PDO::PARAM_STR);
            }
            if(is_null($_POST['ID_GameType']) || $_POST['ID_GameType'] == ''){
                $result->bindParam(4, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(4, $_POST['ID_GameType'], PDO::PARAM_STR);
            }
            if(is_null($_POST['ID_Editor']) || $_POST['ID_Editor'] == ''){
                $result->bindParam(5, $myNull, PDO::PARAM_NULL);
            } else {
                $result->bindParam(5, $_POST['ID_Editor'], PDO::PARAM_STR);
            }
            $name = $_POST['name'];
            
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
?>

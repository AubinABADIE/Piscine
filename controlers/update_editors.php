<?php

    require('connect_bdd.php');

	$update = true;

	if (count($_POST) > 0) {
		if ((!isset($_POST['value1'])) || ($_POST['value1'] == '')) {
			/* S'il manque la valeur 1 on n'insère pas. */
			$update = false;
		}

		if ((!isset($_POST['value2'])) ||  $_POST['value2'] == '')) {
			/* S'il manque la valeur 2 on n'insère pas. */
			$update = false;
		}

		if ((!isset($_POST['value3'])) || ($_POST['value3'] == '')) {
			/* S'il manque la valeur 3 on n'insère pas. */
			$update = false;
		}

		if ($update) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$stmt = $pdo->prepare('update table set value1 = :v1, value2 = :v2, value3 = :v3 where id = :id;');

			$stmt->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
			$stmt->bindParam(':v1', $_POST['value1'], PDO::PARAM_STR);
			$stmt->bindParam(':v2', $_POST['value2'], PDO::PARAM_STR);
			$stmt->bindParam(':v3', $_POST['value3'], PDO::PARAM_STR);

			try {
				$stmt->execute();
				$stmt->closeCursor();
				$redirect = true;
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de la mise à jour.\n" . $exception->getMessage() . "\n -->";
			}

			$stmt = null;

			if ($redirect) {
				/* Mise à jour correctement effectuée, on redirige vers la page de l'article. */
				header('Location: ./page.php');
				exit();
			}
		}
	}
?>
<?php
	$insert = true;

	if (count($_POST) > 0) {
		if ((!isset($_POST['value1'])) || ($_POST['value1'] == '')) {
			/* S'il manque la valeur 1 on n'insère pas. */
			$insert = false;
		}

		if ((!isset($_POST['value2'])) ||  $_POST['value2'] == '')) {
			/* S'il manque la valeur 2 on n'insère pas. */
			$insert = false;
		}

		if ((!isset($_POST['value3'])) || ($_POST['value3'] == '')) {
			/* S'il manque la valeur 3 on n'insère pas. */
			$insert = false;
		}

		if ($insert) {
			$redirect = false; // Pour ne rediriger que si on a réussi l'opération.

			$stmt = $pdo->prepare('insert into table (value1, value2, value3) values (?, ?, ?);');

			$stmt->bindValue(1, $_POST['value1'], PDO::PARAM_STR);
			$stmt->bindValue(2, $_POST['value2'], PDO::PARAM_STR);
			$stmt->bindValue(3, $_POST['value3'], PDO::PARAM_STR);

			try {
				$stmt->execute();
				$stmt->closeCursor();
				$redirect = true;
			} catch (PDOException $exception) {
				echo "<!-- Erreur lors de l\'insertion.\n" . $exception->getMessage() . "\n -->";
			}

			$stmt = null;

			if ($redirect) {
				/* Insertion correctement effectuée, on redirige vers la page du nouvel événement. */
				header('Location: ./Page.php');
				exit();
			}
		}
	}
?>
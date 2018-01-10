<?php

	require('connect_bdd.php');
	
    session_start();

	if(isset($_POST['id']) && isset($_POST['pwd'])){
		$stmt = $pdo->prepare('SELECT * FROM user WHERE Pseudo = :username limit 1');
		$stmt->bindValue(':username', $_POST['id'], PDO::PARAM_STR);
		if (!$stmt->execute()) {
			$status = ERROR_USERUNKNOWN;
		} 
		else if ($stmt->rowCount() <= 0) {
			$status = ERROR_USERUNKNOWN;
		} 
		else {
			$row = $stmt->fetch();

		if (strtolower($row['Password']) != strtolower(hash('sha256', $_POST['pwd']))) {
			$status = ERROR_INCORRECTPASSWORD;
		} 
		else {
			$_SESSION['ID'] = $row['ID_User'];
			$_SESSION['Nom'] = $row['Name'];
			$_SESSION['Phone'] = $row['Phone'];
			$_SESSION['Email'] = $row['Email'];
            
			header('Location: ../views/editors/index.html');
			exit();
		}
	}
	$stmt->closeCursor();
	unset($stmt);

	}
	else{
		echo '<p>Fatal Error</p>';
	}

?>
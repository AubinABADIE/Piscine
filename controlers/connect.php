<?php

	require('./connect_bdd.php');
	
    session_start();

	if(isset($_POST['id']) && isset($_POST['pwd'])){
		$result = $bdd->prepare('SELECT * FROM user WHERE Pseudo = :username limit 1');
		$result->bindValue(':username', $_POST['id'], PDO::PARAM_STR);
		if (!$result->execute()) {
			$status = ERROR_USERUNKNOWN;
		} 
		else if ($result->rowCount() <= 0) {
			$status = ERROR_USERUNKNOWN;
		} 
		else {
			$row = $result->fetch();

		if (strtolower($row['Password']) != strtolower(hash('sha256', $_POST['pwd']))) {
			$status = ERROR_INCORRECTPASSWORD;
		} 
		else {
			$_SESSION['ID'] = $row['ID_User'];
			$_SESSION['Nom'] = $row['Name'];
			$_SESSION['Phone'] = $row['Phone'];
			$_SESSION['Email'] = $row['Email'];
            
			header('Location: ../views/editors/index.php');
			exit();
		}
	}
	$result->closeCursor();
	unset($result);

	}
	else{
		echo '<p>Fatal Error</p>';
	}

?>
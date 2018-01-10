<?php

	$Network = 'db710644193.db.1and1.com';
	$BDname = 'db710644193';
	$UserName = 'dbo710644193';
	$Password = 'ProjetFJM2017';

	try {
    	$strConnection = 'mysql:host='.$Network.';dbname='.$BDname; 
    	$arrExtraParam= array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
    	$bdd = new PDO($strConnection, $UserName, $Password, $arrExtraParam); // Instancie la connexion.
    	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch (PDOException $e) {
	    $msg = 'ERREUR PDO dans ' . $e->getFile() . ' L.' . $e->getLine() . ' : ' . $e->getMessage();
    	die($msg);
	}

?>
<?php
	global $pdo;

	try{
		$pdo = new PDO('mysql:host=localhost:3306;dbname=pokeregistrador;chasert=utf8', 'root', '35481665maroca');
		$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e){
		echo 'ERROR!';
		print_r($e);
	}

?>	
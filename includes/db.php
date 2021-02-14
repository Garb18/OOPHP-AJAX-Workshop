<?php
	session_start();
	
	$host = ip;
	$dbname = name;
	$user = user;
	$pass = password;

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>

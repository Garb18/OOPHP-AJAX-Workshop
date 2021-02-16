<?php
	session_start();
	
	$host = 'HOST';
	$dbname = 'NAME';
	$user = 'TODO';
	$pass = 'PASS';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>

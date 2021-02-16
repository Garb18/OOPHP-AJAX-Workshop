<?php
	session_start();
	
	$host = '172.16.11.22:3306';
	$dbname = 'garb1_18_todo';
	$user = 'garb1_todo';
	$pass = '9Iekg64@';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	}
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>

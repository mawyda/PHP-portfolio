<?php 
		
	$host = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "test"; 
	$dsn = "mysql:host=$host;dbname=$dbname"; // this is used for actual connection once DB/ table is built.
	$options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
?>
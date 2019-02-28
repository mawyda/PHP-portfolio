<?php

	// contains variable data for connection. Pulled in $connection.
	require "config.php";
	
	try {
		// Attempt connection to DB...
		$connection = new PDO("mysql:host=$host", $username, $password, $options);
		//Get SQL query from file...
		$sql = file_get_contents("data/init.sql");
		//Run query, which is the init creation of DB and table
		$connection->exec($sql);
	
		echo "DB and table successfully created";
	} 
	// error handling in $error var
	catch(PDOException $error) {
		echo "Received the following SQL error: <br>" . $error->getMessage() ."<p>The db is built already. 404 would be useful here..."; 
	}
?>
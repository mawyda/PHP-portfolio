<?php //phpinfo() ?>

<?php 
	require "config.php";
	$connection = new PDO($dsn, $username, $password, $options);
	// sql query 
	$sql = "SELECT * FROM blogs";
	//prepare, bind, and execute 
	#$statement = $connection->prepare($sql);
	// removing the bind statement for now...
	#$statement->execute();
	//$result = $statement->fetchAll();
	# $result = $statement;
	
	//New attempt 
	/*$statement = $connection->query("SELECT * FROM blogs");
	$result = $statement->execute();
	$result = $result->fetchAll();
	*/

	//Hopefully this is it:
	$result = $connection->query($sql);

	?>
	<br /> 
	<p> Is anything working</p>
	<br /> 
	<?php echo "It doesn't seem like it."; ?>
	<ul>
	<?php 
		//echo $result;
		//echo "<br/>The len is " . sizeof($result);
		
		foreach ($result as $row) { ?>
			<li><?php echo $row["title"] . "\t"; ?></li>
			<li><?php echo $row["date"] . "\n"; ?></li>
			
		<?php } ?>
	</ul>
<?php 
		echo "<br />";
		echo "<br />Anything here? " . $result[0];
?>


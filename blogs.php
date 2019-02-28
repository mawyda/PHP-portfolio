
<?php 
	/*
	// connect to db, pull data, and then diplay it on the site. 
	try {
		require "config.php";
		$connection = new PDO($dsn, $username, $password, $options);
		// sql query 
		$sql = "SELECT *
						FROM blogs";
		//prepare, bind, and execute 
		$statement = $connection->prepare($sql);
		// removing the bind statement for now...
		$result = $statement->execute();
		$result = $statment->fetchall();
	} // errors
		catch(PDOException $error) {
			echo "Error displaying the blog posts: <br/>" . $error->getMessage();
		}
	*/
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Blog Posts</title> 
		
		<link rel= "stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include "templates/header.php"; ?>
		
		<!-- Individual blog posts will go here, with imgs, probably -->
		<main class="">
			<br />	
			<!-- Need the code for grabbing the blog data 

			For now, just build out the forms to send to the other page: 
			-->
			<a href="create.php">Create New Post</a>
		
			<!-- This will need to get moved to a new page, but for now simply show the posts. -->
			<br />			
			<hr /> 
			<br />			
			<div class="blog_posts">
				<!-- foreach entry in the db, pull the data, show it in html.
				Better to create a new page for each? I don't have a controller for urls 
				though.
				-->
				<h3>Check out our blogs</h3>
			</div>
			<br />			
			<hr /> 
			<hr />
			<ul>	
				<!-- Add an if loop to check if there is any data to display?? -->
				<?php foreach ($result as $row) { ?>
					<!-- ul for each item? -->
					<li>
						<!-- Is escaping the html necessary here? -->
						<h3><?php echo escape($row['title']); ?></h3>
						<span id="timestamp"><?php echo escape($row['date']); ?></span>
						<!-- Need to sort out the image deal below.... -->		
						<img src=""></img>
						<p><?php echo escape($row['contents']); ?></p>
						<br />
						<hr />
					</li>
				<?php } ?>
			</ul>
		</main>
		<br />			
			<hr /> 
	</body>	
	<br />
	<?php include "templates/footer.php"; ?>
		
</html>




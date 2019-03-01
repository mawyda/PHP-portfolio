
<?php 
	
	// connect to db, pull data, and then diplay it on the site. 
	try {
		require "config.php";
		$connection = new PDO($dsn, $username, $password, $options);
		// sql query 
		$sql = "SELECT * FROM blogs ORDER BY id DESC";
		//
		//$statement = $connection->prepare($sql);
		// removing the bind statement for now...
		//$result = $statement->execute();
		//result = $statement->fetchall();
		$result = $connection->query($sql);
	} // errors
		catch(PDOException $error) {
			echo "Error displaying the blog posts: <br/>" . $error->getMessage();
		}
	
?>


<!doctype html>
<html lang="en">
	<head>
		<title>Blog Posts</title> 
		
		<link rel= "stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div class="container">
		<?php include "templates/header.php"; ?>
		
		<!-- Individual blog posts will go here, with imgs, probably -->
		<main class="">
			<br />	
			<a href="create.php">Create New Post</a>
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
			<ul>	
				<!-- Add an if loop to check if there is any data to display?? -->
				<?php foreach ($result as $row) { ?>
					<!-- ul for each item? -->
					<li>
						<!-- Is escaping the html necessary here? -->
						<h3><?php echo $row['title']; ?></h3>
						<span id="timestamp"><?php echo $row['date']; ?></span>
						<!-- Need to sort out the image deal below.... -->
						
						<img src="<?php echo $row['image']; ?>" />
						<p><?php echo $row['contents']; ?></p>
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
	</div>	
</html>




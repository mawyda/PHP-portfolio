
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
		<div id="container">
		<?php include "templates/header.php"; ?>
		
		<!-- Individual blog posts will go here, with imgs, probably -->
			<div id="blog_intro">
				<!--<main class="">-->
				<h3>Check out our blogs</h3>
				<br />	
				<a href="create.php">Create New Post</a>
				<br />		
				<!-- <div class="blog_posts"> -->

				
			</div>
			<hr />
			<div id="blogs">
				<ul>	
				<!-- Add an if loop to check if there is any data to display?? -->
				<?php foreach ($result as $row) { ?>
					<!-- ul for each item? -->
					<div id="ind_blog">
						<li>
							<!-- Is escaping the html necessary here? -->
							<div id="top_blog">
								<div id="blog_header">
									<h3><?php echo $row['title']; ?></h3>
									<span id="timestamp"><?php echo $row['date']; ?></span>
								</div>
								<div id="blog_img">
									<img src="<?php echo $row['image']; ?>" />
								</div>
							</div>
							<div id="blog_text">
								<p><?php echo $row['contents']; ?></p>
							</div>
							<br />
							<hr />
						</li>
					</div>
				<?php } ?>
				</ul>
			</div>
		<!--</main>-->
		<br />			
		<!--<hr />-->
			<br />
			<?php include "templates/footer.php"; ?>
		</div>
	</body>		
</html>




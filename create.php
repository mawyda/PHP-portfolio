<?php
	//Check if form has been submitted, versus a GET request. 
	// isset acts like Pythons truthiness for non-NULL vars
	if (isset($_POST['submit'])) {
		require "config.php";
		
		try {
			//Connect to the correct DB and table for data insert 
			$connection = new PDO($dsn, $username, $password, $options);
			//Get form data.
			$new_post = array(
				"title" => $_POST['title'],
				"contents" => $_POST['contents'],
				"image" => $_POST['image']
			);
			//Create the sql statment to insert data into table.
			//Note: sprintf is like using format() or %s
			$sql = sprintf(
				"INSERT INTO %s (%s) VALUES (%s)", 
				"blogs",
				//implode() is simply .join() function...
				implode(", ", array_keys($new_post)),
				":" . implode(", :", array_keys($new_post))
			);
			// Insert new data for blog post. Note that the sql commands are a lot like execute() and then fetchone() in that it's a two step process...
			$statement = $connection->prepare($sql);
			$statement->execute($new_post);
			//return a msg upon succesfful completion 
			$msg = sprintf(
				"Blog post <blockquote> %s </blockquote> Successfully created! <br />",
				$new_post['title']
			);						
		} 
		catch(PDOException $error) {
			echo "Error recevied: <br/>" . $error->getMessage();
		}
	}

?>


<!doctype HTML>
<html lang="en">
	<head> 
		<title>Create a New Blog Post</title>
			
		<link rel= "stylesheet" href="css/style.css">
	</head>
	<body>
		<?php include "templates/header.php"; ?>
		<br />
		<?php echo $msg; ?>
		<main>
			<div class="new_post">
				<form action="create.php" method="post">
					<label for="title">Title:</label>
					<input type="title" name="title" id="title"  />
					<label for="contents">Contents:</label>
					<input type="textarea" name="contents" id="contents"  />
					<label for="image">Image:</label>
					<input type="file" name="image" id="image"  />
					<input type="submit" name="submit" value="Post It!" />
				</form>
			</div>
		</main>
	</body>
	<br />
	<?php include "templates/footer.php"; ?>
</html>
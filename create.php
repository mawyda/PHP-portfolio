<?php
	//Check if form has been submitted, versus a GET request. 
	// isset acts like Pythons truthiness for non-NULL vars
	if (isset($_POST['submit'])) {
		require "config.php";
		
		try {
			//Connect to the correct DB and table for data insert 
			$connection = new PDO($dsn, $username, $password, $options);

			// actual location to save the file to.
			$target = "images/";
			$target = $target . $_FILES['image']['name']; 

			//Get form data.
			$new_post = array(
				"title" => $_POST['title'],
				"contents" => $_POST['contents'],
				//"image" => $_POST['image']
				"image" => $target
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
			//return a msg upon successful completion 
			$msg = sprintf(
				"Blog post <blockquote> %s </blockquote> Successfully created! <br />",
				$new_post['title']
			);
			//move the files and create a msg. 
			if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
					$msg2 = "Your file " . basename($_FILES['image']['name']) . " has been uploaded.";
				}
			else {
				/*$msg2 = "There was an error uploading your image named <br />" . $_FILES['image']['name']; */
				$msg2 = "The file name is " . $_FILES['image']['tmp_name'];
			}
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
			
		<link rel= "stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<div id="container">
			<?php include "templates/header.php"; ?>
			<br />
			<?php echo $msg; ?>
			<?php echo $msg2; ?>
			<br />
			<br />
			<main>
				<div class="new_post">
					<form enctype="multipart/form-data" action="create.php" method="POST">
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
		<br />
		<?php include "templates/footer.php"; ?>
		</div> 
	</body>
</html>
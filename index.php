<!doctype html>
<html lang="en">
	
	<head>
		<title>My PHP Site</title>
		<link rel= "stylesheet" href="css/style.css">
	</head>
	
	<body>
		<?php include "templates/header.php"; ?> 
		
		<!-- Contents of the page -->
		<main class="main">
			<h1>Hello World!!</h1>
			<br />
			<?php echo "Today's date is: " . date('F d, Y') ?>
			<br />
			<p>My name is Matt Dalton and I like to code. PHP is a new language for me, but i intend to become a master in it.</p>
		</main>
		
		<?php include "templates/footer.php"; ?>
			
	</body>	
</html>
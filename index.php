<!doctype html>
<html lang="en">
	
	<head>
		<title>My PHP Site</title>
		<link href="/css/style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<div class="container">
		<?php include "templates/header.php"; ?> 
		
		<!-- Contents of the page -->
		<main class="main">
			<div class="intro">
				<!-- Include an image and caption here. -->
				<h1>Hello World!!</h1>
				<br />
				<?php echo "Today's date is: " . date('F d, Y') ?>
				<br />
			</div> 
			<div class="about">
				
				<p>My name is Matt Dalton and I like to code. I currently work in a role that requires understanding of a lot of different programming principles. I am currently working towards proficiency in Full Stack Web Dev and Data Science. 
				PHP is a new language for me, but I intend to become a master in it.</p>
			</div> 
		</main>
		
		<?php include "templates/footer.php"; ?>
	</body>	
	</div>
</html>
<!doctype html>
<html lang="en">
	
	<head>
		<title>My PHP Site</title>
		<link href="/css/style.css" type="text/css" rel="stylesheet" />
	</head>
	
	<body>
		<div id="container">
		<?php include "templates/header.php"; ?> 
		
		<!-- Contents of the page -->
		<main id="main"> <!-- Main will need changed... -->
			<div id="intro">
				<!-- Include an image and caption here. -->
				<div id="greeting">
					<h1>Hello World!!</h1>
					<?php echo "Today's date is: " . date('F d, Y') ?>
				</div>

				<div id="image_div">
					<!-- there will be a picture here...-->
					<img id="home_image" src="../static/home_image.jpg" />
				</div>
			</div> 
			<div id="about">
				<h2>About Me</h2>
				<p>My name is Matt Dalton and I love to code. I currently work in a role that requires understanding of a lot of different programming principles. Currently, I am working towards proficiency in Full Stack Web Dev and Data Science. </p>
				<p>
				This site was written in PHP, which is a brand new language for me. The purpose was to challenge myself and expand my Dev ecosystem. 
				I am currently hoping to find employment where I can grow and work with others.
				</p>
			</div> 
		</main>
		
		<?php include "templates/footer.php"; ?>
	</body>	
	</div>
</html>
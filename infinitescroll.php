<?php
session_start();
	include "templates/header.php";
	include_once "./config/database.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz - Gallery</title>
	<style>
		.center {
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>

<body class="purp_body">
	<section class="hero is-fullheight">
		<div class="hero-body">
  			<div class="container">
				<h2 class="title has-text-centered">Gallery</h2>
				
				<div class="gallery-container">
					<?php
						include "functions/galleryFunctions.php";
						$_SESSION['URI'] = $_SERVER['REQUEST_URI'];
						// echo $_SESSION['URI'];
						echo displayImages($_GET['page']);
					?>
				</div>
  			</div>
		</div>
	</section>
	<?php
	include "templates/footer.php";
	?>
</body>

</html>
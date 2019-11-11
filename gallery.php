<?php
session_start();
	include "templates/header.php";
	include_once "../config/database.php"
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
				<!-- will design soemething here still -->
				<?php
				// Select all from images orderby creationdate desc

				while($row = mysqli_fetch_assoc($result)){
					echo '<a href="#">
					<div style="background-image: url(/gallery/'.$row["imgFullNameGallery"].');"></div>';
				}
				?>
  			</div>
		</div>
	</section>
	<?php
	include "templates/footer.php";
?>
</body>

</html>
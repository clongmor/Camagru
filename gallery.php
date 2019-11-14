<?php
session_start();
	include "templates/header.php";
	include_once "./config/database.php";
	//include "./functions/galleryFunctions.php"
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

						$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
						$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						
						$stmnt = $dbh->prepare("SELECT * FROM `image` ORDER BY `creationdate` DESC");
						$stmnt->execute();
						$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
						foreach($result as $image){
							echo "<img src=\"./gallery/".$image['source']."\" alt=\"error\">";
						}
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
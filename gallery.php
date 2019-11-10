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
	<link rel="stylesheet" href="./css/styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<link rel="stylesheet" href="../css/debug.css">
	<style>
		.center {
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>

<body class="purp_body">
<div class="columns" style="margin-top: 2rem" style="padding-left: 0; padding-right: 0;">
        <div  class="column is-offset-2 is-two-thirds box" style="padding: 1.5rem">
            
        <section class="hero is-small" >
            <div class="hero-body">
				<div class="container" style="margin-top: -1rem;">
				<?php
				// Select all from images orderby creationdate desc

				while($row = mysqli_fetch_assoc($result)){
					echo '<a href="#">
					<div style="background-image: url(/gallery/'.$row["imgFullNameGallery"].');"></div>';
				}
				?>
				</div>
            </div>

</body>

</html>
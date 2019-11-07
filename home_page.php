<?php
    session_start();
	include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz</title>
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
				<figure class="image center">
					<img src="./imgs/welcome.png" alt="Welcome" style="max-height: 900px; max-width:900px;">
				</figure>
			</div>
		</div>
	</section>
	<?php
	include "templates/footer.php";
?>
</body>

</html>
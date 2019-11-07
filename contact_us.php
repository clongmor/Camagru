<?php
	session_start();
	include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz - Contact Us</title>
	<link rel="stylesheet" href="./css/styles.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
	<script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	<!-- <link rel="stylesheet" href="../css/debug.css"> -->
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
				<section class="section">
					<div class="container">
						<h2 class="title has-text-centered">Contact Madimgz</h2>
						<subtitle class="subtitle center">Let us know if you have any suggestions, comments or feeback to give</subtitle>
						<div class="columns">
							<div class="column is-6"><img class="center" src="./imgs/logo_sq.png" style="max-height:400px;" alt=""></div>
							<div class="column is-6">
								<form>
									<div class="field">
										<div class="control">
											<input class="input" type="email" placeholder="Email">
										</div>
									</div>
									<div class="field">
										<div class="control">
											<textarea class="textarea" rows="11" placeholder="Write something..."></textarea>
										</div>
									</div>
									<div class="field">
										<div class="control">
											<button class="button is-primary is-fullwidth" type="submit">Submit</button>
										</div>
										<!-- this should potentially store the comment in the database with email address so it can be replied to -->
									</div>
								</form>
							</div>
						</div>
					</div>
				</section>
			</div>
		</div>
	</section>
	<?php
	include "templates/footer.php";
?>
</body>

</html>
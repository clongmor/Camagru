<?php
session_start();
include "templates/header.php";
include "./config/database.php";
include "./functions/editorFunctions.php";
?>

<!DOCTYPE html>
<html>

<head>
	<script src="functions/jsFunctions/editorFunctions.js"> </script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz - Editor</title>
	<style>
		.center {
			display: flex;
			justify-content: center;
			align-items: center;
		}

		.overflow_pics {
			overflow-x: scroll;
			overflow-y: hidden;
			white-space: nowrap;
		}

		.pics_box {
			width: 100%;
			max-height: 400px;
		}

		#webcam_box {
			width: 50%;
			max-height: 400px;
			margin-left: 25%;
		}

		video {
			-webkit-transform: scaleX(-1);
			transform: scaleX(-1);
		}

		.padding_top {
			margin-top: 20px;
		}

		.padding_bot {
			margin-bottom: 20px;
		}
	</style>
</head>
<?php if (isset($_SESSION['username'])) : ?>

	<body class="purp_body">

		<section class="hero">
			<div class="hero-body">


				<div class="section">
					<h1 class="title">
						Editor
					</h1>
					<h2 class="subtitle">
						Creating your own Madimgz starts here!
					</h2>

					<div class="section has-background-primary">


						<div class="container">
							<h1 class="subtitle">
								Upload an image from your computer or take a picture with your webcam.
								PRO TIP: make sure you click submit if uploading from your computer!
							</h1>
								<form action="functions/editorFunctions.php" method="post" enctype="multipart/form-data">
									<input type="hidden" name="action" value="uploadUserImage">
									<div class="field">
										<div class="control">
											<input class="input" type="file" name="image">`
										</div>
									</div>
									<div class="field">
										<button type="submit" class="button purp_body is-fullwidth" value="Submit" href="editor.php"><strong>Upload My Image!</strong></button>
									</div>
								</form>
						</div>
						<div>
							<h1 class="title center">
								OR
							</h1>
						</div>
						<div class="container">
							<h1 class="subtitle">
								directly take a picture with your webcam below:
							</h1>
							<video autoplay="true" id="webcam_box" class="center has-background-primary">

							</video>
						</div>
						<script>
							var video = document.querySelector("#webcam_box");

							if (navigator.mediaDevices.getUserMedia) {
								const stream = navigator.mediaDevices.getUserMedia({
										video: true,
										audio: false
									})
									.then(function(stream) {
										window.stream = stream;
										video.srcObject = stream;
									})
									.catch(function(err) {
										console.log("No Webcam Found!");
									});
							}
						</script>
						<button id="snap">Take Picture</button>
					</div>
					<div class="section has-background-primary">
						<h1 class="subtitle">
							Select an image from the provided images to decorate your chosen photo with:
						</h1>
						<div class="field">
							<div class="control">
								<label class="checkbox">
									<input type="checkbox" name="img_overlay">
									<img src="./imgs/halloween_hat.png" alt="h_hat" style="max-height: 100px; max-width:100px;">
								</label>
								<label class="checkbox">
									<input type="checkbox" name="img_overlay">
									<img src="./imgs/grateful_neon.png" alt="grateful" style="max-height: 100px; max-width:100px;">
								</label>
								<label class="checkbox">
									<input type="checkbox" name="img_overlay">
									<img src="./imgs/heart.png" alt="heart" style="max-height: 100px; max-width:100px;">
								</label>
								<label class="checkbox">
									<input type="checkbox" name="img_overlay">
									<img src="./imgs/pony.png" alt="pony" style="max-height: 100px; max-width:100px;">
								</label>
								<label class="checkbox">
									<input type="checkbox" name="img_overlay">
									<img src="./imgs/tongue_face.png" alt="tongue_face" style="max-height: 100px; max-width:100px;">
								</label>
							</div>
						</div>
					</div>
					<div class="section has-background-primary">
						<p>
							Once you have done both of the above, click on create and watch the magic happen!
						</p>
						<form action="functions/galleryFunctions.php" method="post" enctype="multipart/form-data">
							<div class="field">
								<button type="submit" class="button purp_body is-fullwidth" value="Submit" href="## where to go here?"><strong>Create My Image!</strong></button>
							</div>
						</form>
					</div>
					<div class="section">
						<div> <canvas id="my_canvas" style="height: 500px; max-width:500px; border:1px solid #000000;"></canvas> </div>

						<script>
							 
						</script>
					</div>
				</div>
				<div class="section has-background-primary has-text-centered pics_box">
					<div class="subtitle"> Here are your previously uploaded pictures:</div>
					<div class="field">
						<div class="control">


							<!-- need to change action for deleting images here -->
							<div class="field is-grouped overflow_pics">
								<div class="control">
									<figure>
										<img src="./imgs/tongue_face.png" alt="tongue_face" style="max-height: 100px; max-width:100px;">
										<figcaption>
											<button type="submit" class="button purp_body padding_top padding_bot" value="Submit" href="## where to go here?"><strong>Delete</strong></button>
											<!-- need to display images from DB here in these (just placeholder pictures) -->
											<?php

													$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
													$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

													$userId =  $_SESSION['id'];

													$stmnt = $dbh->prepare("SELECT `source` FROM `image` WHERE `userid`=?");
													$stmnt->execute([$userId]);
													$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

													foreach ($result as $image) {
														echo "<img src=\"./gallery/" . $image['source'] . "\">";
													}

													?>
										</figcaption>
									</figure>
								</div>
							</div>
						</div>
					</div>
				</div>
		</section>
	<?php endif; ?> 

	<?php if (!isset($_SESSION['username'])) : ?>
		<body class="purp_body">
			<section class="hero is-fullheight">
				<div class="hero-body">
					<div class="container">
						<script>
							
							function Redirect() {
								window.location = "login.php";
							}

							document.write("Hi, you don't seem to have access to this page. Please login and then try again.");
							setTimeout('Redirect()', 4000);

						</script>
					</div>
				</div>
			</section> 
			<?php endif; ?> 
			<?php
				include "templates/footer.php";
			?>
			</section>
		</body>

</html>
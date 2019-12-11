<?php
session_start();
include "templates/header.php";
include "./config/database.php";
include "./functions/editorFunctions.php";
?>

<!DOCTYPE html>
<html>

<head>

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
			max-height: 500px;
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
		.padding_left {
			margin-left: 10px;
		}

		canvas {
			max-width: 90%;
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
						<div class="section">
							<h1 class="subtitle">
								Upload an image from your computer or take a picture with your webcam.
								PRO TIP: make sure you click submit if uploading from your computer!
							</h1>
							<!-- User image upload -->
							
								<div class="field">
									<div class="control">
										<input class="input" id="upload_base" type="file" accept="image/*" style="display:none" onchange="userBaseImage(this.files[0])">
									</div>
								</div>
								<div class="field">
									<button type="button" id="file_select" class="button purp_body is-fullwidth" ><strong>Upload My Image!</strong></button>
								</div>
								<script>
								const fileSelect = document.getElementById("file_select");
								fileElem = document.getElementById("upload_base");

								fileSelect.addEventListener("click", function(e) {
									if (fileElem){
										fileElem.click();
									}
								}, false);
								</script>
						</div>
						<div class="padding_top">
							<h1 class="title center">
								OR
							</h1>
						</div>
						<!-- Webcam Section -->
						<div class="section">
							<h1 class="subtitle">
								directly take a picture with your webcam below:
							</h1>
							<video autoplay="true" id="webcam_box" class="center has-background-primary">

							</video>
						</div>
						<div class="container center">
							<button id="stream" class="button padding_bot purp_body" onclick="getWebcamStream()">Switch On Webcam</button>
						</div>
						<!-- Canvases -->
						
						<div class="container center padding_top">
							<canvas id="my_canvas" width="500" height="500" style="border:5px solid rgb(189, 114, 224);">
							</canvas>
							<canvas id="sticker_canvas" width="500" height="500" style="position:absolute; border:5px solid rgb(189, 114, 224);">
							</canvas>
						</div>
						<div class="center">
						<button id="snap" class="button padding_top purp_body" onclick="getWebcamImage()">Take Picture</button>
							<button id="restart" class="button padding_top padding_left purp_body" type="submit" onclick="window.location.reload();">Restart</button>
						</div>
							<div class="section has-background-primary">
								<h1 class="subtitle">
									Select an image from the provided images to decorate your chosen photo with:
								</h1>

								<script>

								</script>
								<!--Stickers -->
								
								<div class="field">
									<div class="control">
										<label class="checkbox">
											<input type="checkbox" name="img_overlay" onclick="getSticker(document.getElementById('h_hat').src)">	
											<img id="h_hat" src="imgs/halloween_hat.png" alt="h_hat" style="max-height: 100px; max-width:100px;">
										</label>
										<label class="checkbox">
											<input type="checkbox" name="img_overlay" onclick="getSticker(document.getElementById('grateful').src)">
											<img id="grateful" src="imgs/grateful_neon.png" alt="grateful" style="max-height: 100px; max-width:100px;">
										</label>
										<label class="checkbox">
											<input type="checkbox" name="img_overlay" onclick="getSticker(document.getElementById('heart').src)">
											<img id="heart" src="imgs/heart.png" alt="heart" style="max-height: 100px; max-width:100px;">
										</label>
										<label class="checkbox">
											<input type="checkbox" name="img_overlay" onclick="getSticker(document.getElementById('pony').src)">
											<img id="pony" src="imgs/pony.png" alt="pony" style="max-height: 100px; max-width:100px;">
										</label>
										<label class="checkbox">
											<input type="checkbox" name="img_overlay" onclick="getSticker(document.getElementById('tongue_face').src)">
											<img id="tongue_face" src="imgs/tongue_face.png" alt="tongue_face" style="max-height: 100px; max-width:100px;">
										</label>
									</div>
								</div>
							</div>
							<!-- Submit form -->
							
							<div class="section has-background-primary" onmouseenter="checkCanvas()">
								<p>
									Once you have done both of the above, click on create and watch the magic happen!
								</p>
										<button disabled id="submit_image" type="button" class="button purp_body is-fullwidth" onclick="getImageDataUrl()">
										<strong> Create My Image! </strong>
										</button>
									</div>
							</div>
							<div class="section">
							</div>
						</div>
					</div>
					<!-- User Images -->
					
					<div class="section has-background-primary has-text-centered pics_box overflow_pics">
						<div class="subtitle"> Here are your previously uploaded pictures:</div>
						<div class="field">
							<div class="control">
								<div class="field is-grouped ">
									<?php
										include "functions/getUserDetails.php";
										$_SESSION['URI'] = $_SERVER['REQUEST_URI'];
										// echo $_SESSION['URI'];
										echo getEditorImages();
										?>
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
		<script src="functions/jsFunctions/editorFunctions.js"> </script>
		</body>

</html>
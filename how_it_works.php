<?php
	session_start();
    include "templates/header.php";
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz - About Us</title>
	<style>
	.border {
		border: 2px solid black;
	}
	.right {
		float:right;
	}
	.center {
	display: flex;
	justify-content: center;
	align-items: center;
	}
</style>
  </head>
  <body class="purp_body">
  <section class="hero">
  <div class="hero-body">
    	<div class="section">
			<h1 class="title">
				How to get your pictures out there for the world to see?
			  </h1>
			  <h2 class="subtitle">
				Here is where you can get the best of both worlds, we combine your image of choice (via webcam or image upload) with a crazy awesome image of your choice from the provided selection, to create some photo magic. You can then choose to upload it to our gallery and share with your friends or if its not up to standard, you can delete it and start again!
			  </h2>
		</div>
		<div class="section has-text-white has-background-primary">
			<h1 class="title">
				Step 1: Create an account and confirm via email
			  </h1>
			  <h2 class="subtitle">
				make sure you confirm your email before you try to login!
			  </h2>
			<img class="border right" src="imgs/sign_up_submit.jpg" alt="Sign_up_submit" style="max-height: 197px; max-width:500px;">
		</div>
		<div class="section">
			<h1 class="title">
				Step 2: login and go to the Create an Image page
			  </h1>
			  <img class="border" src="imgs/create_img_page.png" alt="Sign_up_submit" style="max-height: 197px; max-width:500px;">
		</div>
		<div class="section has-text-white has-background-primary">
			<h1 class="title">
				Step 3: Switch on the webcam and take a photo or upload an image.
			  </h1>
			  <h2 class="subtitle">
			  make sure to click the upload button if you choose not to use the webcam
			  </h2>
			  <img class="border" src="imgs/switch_on_webcam.png" alt="Sign_up_submit" style="max-height: 197px; max-width:500px;">
		</div>
		<div class="section">
			<h1 class="title">
				Step 4: select the image(s) that you want to add to your photo.
			  </h1>
			  <h2 class="subtitle">
			  choose from a range of supplied images that you can decorate your photo with.
			  </h2>
			  <img class="border" src="imgs/choose_sticker.png" alt="Sign_up_submit" style="max-height: 197px; max-width:400px;">
		</div>
		<div class="section has-text-white has-background-primary">
			<h1 class="title">
				Step 5: click the create my image button to upload to the gallery
			  </h1>
			  <h2 class="subtitle">
			  	or restart if you don't like what you see.
			</h2>
			<img class="border" src="imgs/create_img_button.png" alt="Sign_up_submit" style="max-height: 197px; max-width:400px;">
		</div>
	</div>
  </section>
  <?php
	include "templates/footer.php";
?>
  </body>
</html>
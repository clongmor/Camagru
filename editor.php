<?php
	session_start();
	include "templates/header.php";
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
	</style>
</head>
<!-- need to make sure a user is logged in when trying to access this page e.g. if they type the web address directly, it should display access denied -->
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
		</div>
		<div class="section has-background-primary">
			<h1 class="subtitle">
				Upload an image from your computer or take a picture with your webcam.
				PRO TIP: make sure you click submit if uploading from your computer!
			  </h1>
				<form action="editor.php" method="post">
				  <div class="field">
				  	<div class="control">
					  <input class="input" type="file" name="upload_image" required>
				  	</div>
			  	  </div>
			  	<div class="control">
				  <button type="submit" class="button purp_body is-fullwidth" value="Submit" href="## where to go here?"><strong>Upload My Image!</strong></button>
			 	</div>
			  </form>
			  <?php
				// need to store image that is submitted
			  ?>
			<h1 class="title center">
				OR
			</h1>
			<h1 class="subtitle">
				directly take a picture with your webcam below:
			</h1>
			insert webcam to take a picture here
		</div>
		<div class="section has-background-primary">
			<h1 class="subtitle">
				Select an image from the provided images to decorate your chosen photo with:
			</h1>
			<div class="field">
  				<div class="control">
   					<label class="radio">
      					<input type="radio" name="img_overlay">
							  <img src="./imgs/halloween_hat.png" alt="h_hat" style="max-height: 100px; max-width:100px;">
    				</label>
    				<label class="radio">
      					<input type="radio" name="img_overlay">
						  <img src="./imgs/grateful_neon.png" alt="grateful" style="max-height: 100px; max-width:100px;">
					</label>
					<label class="radio">
      					<input type="radio" name="img_overlay">
						  <img src="./imgs/heart.png" alt="heart" style="max-height: 100px; max-width:100px;">
					</label>    				
					<label class="radio">
      					<input type="radio" name="img_overlay">
						  <img src="./imgs/pony.png" alt="pony" style="max-height: 100px; max-width:100px;">
					</label>
					<label class="radio">
      					<input type="radio" name="img_overlay">
						  <img src="./imgs/tongue_face.png" alt="tongue_face" style="max-height: 100px; max-width:100px;">
    				</label>
  				</div>
			</div>
		</div>
		<div class="section has-background-primary">
			<p>
				Once you have done both of the above, click on create and watch the magic happen!
			</p>
			  <form action="editor.php" method="post">
			  	<div class="field is-grouped">
					<div class="control">
						<button type="submit" class="button purp_body is-fullwidth" value="Submit" href="## where to go here?"><strong>Create My Image!</strong></button>
					</div>
			 	</div>
			  </form>
			  <?php
			//   need to check both an image is uploaded and an image is selected to superimpose with
			  ?>
		</div>
		<div class="section">
			<h1 class="subtitle">
				Here's your photo:
			  </h1>
			  need to insert live view of photo/not-live view of photo here.
			  <p> to view your previously uploaded photos, please <a href="./user_images.php">click here</a>.
			  </p>
		</div>
	</div>
  </section>
  <?php
	include "templates/footer.php";
?>
  </body>

</html>
<?php
	session_start();
    include "templates/header.php";
    include "./config/database.php";
    include "./functions/galleryFunctions.php";
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
              <?php if (isset($_SESSION['username'])){
                echo'  
                <form action="functions/galleryFunctions.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="action" value="uploadUserImage">
				  <div class="field">
				  <div class="control">
					  <input class="input" type="file" name="image">
				  </div>
			  	</div>
			  	<div class="field">
				  <button type="submit" class="button purp_body is-fullwidth" value="Submit" href="## where to go here?"><strong>Upload My Image!</strong></button>
			 	</div>
			  </form>
		</div>
		<div class="section has-background-primary">
			<h1 class="subtitle">
				Select an image from the provided images to decorate your chosen photo with:
			  </h1>
			  <img></img>
		</div>
		<div class="section has-text-white has-background-primary">
			<h1 class="subtitle">
				Once you have done both of the above, click on create and watch the magic happen!
			  </h1>
			  <form action="functions/galleryFunctions.php" method="post" enctype="multipart/form-data>
			  <div class="field">
				  <button type="submit" class="button purp_body is-fullwidth" value="Submit" href="## where to go here?"><strong>Create My Image!</strong></button>
			 	</div>
			  </form>
		</div>
		<div class="section">
			<h1 class="subtitle">
				Here\'s your photo:
			  </h1>
			  need to insert live view of photo/not-live view of photo here.
			  <p> to view your previously uploaded photos, please <a href="./user_images.php">click here</a>.
			  </p>
        </div>
        </div>
  </section>';
              }
else
echo 'Please log in to access this page';
//redirect on timer
include "templates/footer.php";
?>
  </body>

</html>
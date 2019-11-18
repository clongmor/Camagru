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

		.overflow_pics {
			overflow-x: scroll;
			overflow-y: hidden;
		}

		.pics_box {
			width: 100%;
			height: 500px;
		}
		#webcam_box {
			width: 50%;
			max-height: 400px;
			margin-left: 25%;
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
		</div>
		<div class="section has-background-primary">
		<div class="container">
			<h1 class="subtitle">
				Upload an image from your computer or take a picture with your webcam.
				PRO TIP: make sure you click submit if uploading from your computer!
              </h1>  
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
			  <?php
				// need to store image that is submitted
			  ?>
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

			if (navigator.mediaDevices.getUserMedia)
			{
				const stream = navigator.mediaDevices.getUserMedia({video: true})
				.then(function(stream)
				{
					window.stream  = stream;
					video.srcObject = stream;
				})
				.catch(function(err) 
				{
					console.log("No Webcam Found!");
				});
			}
		</script>
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

			  </div>
		<div class="section has-background-primary has-text-centered overflow_pics pics_box">
			<div class="subtitle"> Here are your previously uploaded pictures:</div>
			  <div class="field">
			  	<div class="control">
					  <!-- need to pull user specific images from database and display them here, I'm thinking a horizontal scroll bar to display them all. potentially with check boxes and a delete button below them too, but thats for later. -->
				</div>
			</div>
		</div>
	</div>
  </section>
  </body>
<?php endif; ?>

<?php if (!isset($_SESSION['username'])) : ?>
<body class="purp_body">
	<section class="hero is-fullheight">
		<div class="hero-body">
			<div class="container">
				<h1 class="title center">
					Hi, you don't seem to have access to this page. Please login and then try again.
				</h1>
			</div>
		</div>
	</section>
</body>
<?php endif; ?>
	<?php
	include "templates/footer.php";
	?>

</html>
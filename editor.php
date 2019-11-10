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
                <h1 class="title">
                    Upload Image
                </h1>
                <h2 class="subtitle">
                    Upload an Image here.
                </h2>
                </div>
            </div>
            </section>
           <?php if (isset($_SESSION['username'])){
            echo '<form action="./functions/galleryFunctions.php" method ="post" enctype="multipart/form-data" id="update-handle-form">

            <div class="field is-horizontal">
					<div class="field-label grow-1 is-normal">
						<label class="label">New Image</label>
					</div>
					<div class="field-body">
						<div class="field has-addons">
							<p class="control">
								<a class="button is-static">@</a>
							</p>
							<p class="control is-expanded">
                                <input type="file" name="image" id="image-selecter" accept="image/*">
                                <input type="submit" name="submit" value="Upload Image">
							</p>
						</div>
					</div>
				</div>

                <div class="buttons" id="uploading-text" style="display:none;">
                    <button id="update-handle" class="button is-primary">Upload</button>
                    Uploading...
                </div>
            </div>
            </form>
            <img id="preview">
        </div>';
           }
           else
           echo 'Please log in to access this page';
           //redirect on timer
           ?>
</body>
</html>
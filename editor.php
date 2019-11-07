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
	<section class="hero is-fullheight">
		<div class="hero-body">
  			<div class="container">
    			<h2 class="title has-text-centered">Editor</h2>
				<html>
<head>
    <title>Image Upload with AJAX, PHP and MYSQL</title>
</head>
<script type="text/javascript">

var previewImage = document.getElementById("preview"),	
	uploadingText = document.getElementById("uploading-text");

function submitForm(event){
	//prevent default form submission
	event.preventDefault();
	uploadImage();
}

function uploadError(error) {
    // called on error
    alert(error || 'Something went wrong');
}
function showImage(url) {
    previewImage.src = url;
    uploadingText.style.display = "none";
}

function uploadImage(){
	var imageSelecter = document.getElementById("image-selecter"),
		file = imageSelecter.files[0];
	if (!file) 
		return alert("Please select a file");
	// clear the previous image
	previewImage.removeAttribute("src");
	// show uploading text
	uploadingText.style.display = "block";
	// create form data and append the file
	var formData = new FormData();
	formData.append("image", file);
	// do the ajax part
	var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {
		if (this.readyState === 4 && this.status === 200) {
			var json = JSON.parse(this.responseText);
			if (!json || json.status !== true) 
				return uploadError(json.error);

			showImage(json.url);
		}
	}
	ajax.open("POST", "upload.php", true);
	ajax.send(formData); // send the form data
}
</script>
<body>
<form onsubmit="submitForm(event);">
    <input type="file" name="image" id="image-selecter" accept="image/*">
    <input type="submit" name="submit" value="Upload Image">
</form>
<div id="uploading-text" style="display:none;">Uploading...</div>
<img id="preview">
</body>
</html>
  			</div>
		</div>
	</section>
</body>
<?php
$host = 'localhost';
$user = 'user';
$password = 'password';
$database = 'database';
$mysqli = new mysqli($host, $user, $password, $database);
try {
    if (empty($_FILES['image'])) {
        throw new Exception('Image file is missing');
    }
    $image = $_FILES['image'];
    // check INI error
    if ($image['error'] !== 0) {
        if ($image['error'] === 1) 
            throw new Exception('Max upload size exceeded');
            
        throw new Exception('Image uploading error: INI Error');
    }
    // check if the file exists
    if (!file_exists($image['tmp_name']))
        throw new Exception('Image file is missing in the server');
    $maxFileSize = 2 * 10e6; // in bytes
    if ($image['size'] > $maxFileSize)
        throw new Exception('Max size limit exceeded'); 
    // check if uploaded file is an image
    $imageData = getimagesize($image['tmp_name']);
    if (!$imageData) 
        throw new Exception('Invalid image');
    $mimeType = $imageData['mime'];
    // validate mime type
    $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
    if (!in_array($mimeType, $allowedMimeTypes)) 
        throw new Exception('Only JPEG, PNG and GIFs are allowed');
    
    // nice! it's a valid image
    // get file extension (ex: jpg, png) not (.jpg)
    $fileExtention = strtolower(pathinfo($image['name'] ,PATHINFO_EXTENSION));
    // create random name for your image
    $fileName = round(microtime(true)) . mt_rand() . '.' . $fileExtention; // anyfilename.jpg
    // Create the path starting from DOCUMENT ROOT of your website
    $path = '/examples/image-upload/images/' . $fileName;
    // file path in the computer - where to save it 
    $destination = $_SERVER['DOCUMENT_ROOT'] . $path;

    if (!move_uploaded_file($image['tmp_name'], $destination))
        throw new Exception('Error in moving the uploaded file');

    // create the url
    $protocol = stripos($_SERVER['SERVER_PROTOCOL'],'https') === true ? 'https://' : 'http://';
    $domain = $protocol . $_SERVER['SERVER_NAME'];
    $url = $domain . $path;
    $stmt = $mysqli -> prepare('INSERT INTO image_uploads (url) VALUES (?)');
    if (
        $stmt &&
        $stmt -> bind_param('s', $url) &&
        $stmt -> execute()
    ) {
        exit(
            json_encode(
                array(
                    'status' => true,
                    'url' => $url
                )
            )
        );
    } else 
        throw new Exception('Error in saving into the database');

} catch (Exception $e) {
    exit(json_encode(
        array (
            'status' => false,
            'error' => $e -> getMessage()
        )
    ));
}
?>
</html>
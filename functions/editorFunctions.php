
<?php

//if ($_POST['action'] == 'uploadUserImage')
//{
	
	//uploadUserImage();
//}

function uploadUserImage() {
	// ini_set("display_errors", 1);
	session_start();
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$file = $_FILES['image'];
	
	$fileName = $file["name"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];
	$fileExt = strtolower(end(explode('.', $fileName)));
	$allowedExt = array("jpg", "jpeg", "png");
	
	if (in_array($fileExt, $allowedExt)) {
		if ($fileError === 0) {
			if ($fileSize < 10000000) {
				if (empty($fileName) || empty($fileSize)) {
					header("Location ../editor.php?upload=empty");
					exit();
				} else {
					$userId = $_SESSION['id'];
					
					$data = file_get_contents($fileTempName);
					$encImage = base64_encode($data);
	
					$stmnt = $dbh->prepare("INSERT INTO `image` (`userid`, `source`) VALUES (?, ?);");
					$stmnt->execute([$userId, $encImage]);
					
				
					
					header("Location: ../editor.php?upload=success");
				}
			} else {
				echo "There was an error uploading the file";
				exit();
			}
		} else {
			echo "Please upload a jpeg or png file";
			exit();
		}
	}

}

function imageMerge(){

}

?>
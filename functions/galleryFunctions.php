<?php


function uploadUserImage(){
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if (isset($_POST['submit'])){
	
	$newFileName = $_POST['filename'];
	if (empty($newFileName)){
		$newFileName = "randomname";
	}
	else {
		$newFileName = str_replace(" ", "-", $newFileName);
	}
	$imageTitle = $_POST['filetitle'];

	$file = $_FILES['image'];

	$fileName = $file["name"];
	$fileTempName = $file["tmp_name"];
	$fileError = $file["error"];
	$fileSize = $file["size"];

	$fileExt = explode(".", $fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array("jpg", "jpeg", "png");

	if (in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if ($fileSize < 200000){
				$imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
				$fileDestination = "../gallery/" . $imageFullName;

				if (empty($imageTitle) || empty($imageDesc)) {
					header("Location ../editor.php?upload=empty");
					exit();
				} else {
					$creationDate = time();

					$stmnt = $dbh->prepare("INSERT INTO `image` (`source`, `creationdate`) VALUES (?, ?);");
					$stmnt->execute([$fileDestination, $creationDate]);
					
					move_uploaded_file($fileTempName, $fileDestination);

					header("Location ../editor.php?upload=success");

				}
			}
			else{	
			echo "File is too large";
				exit();
			}
		}
		else{
			echo "Error uploading image";
			exit();
		}
	}
		else{
			echo "Please upload a jpeg or png file";
			exit();
		}

}
}

function pagination(){
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	echo $perPage = isset($_GET['per-page']) && $_GET['per-page'] <= 50 ? (int)$_GET['per-page'] : 10;

	//

}
?>
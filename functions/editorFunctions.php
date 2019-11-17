
<?php

if ($_POST['action'] == 'uploadUserImage')
{
	uploadUserImage();
}

function uploadUserImage(){
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
	
	if (in_array($fileExt, $allowedExt)){
		if($fileError === 0){
			if ($fileSize < 200000){
		
				
				if (empty($fileName) || empty($fileSize)) {
					header("Location ../editor.php?upload=empty");
					exit();
				} else {
					$userName = $_SESSION['username'];
					$search = $dbh->prepare("SELECT `id` FROM `user` WHERE `username`=?");
					$search->execute([$userName]);
					$result = $search->fetch(PDO::FETCH_ASSOC);
					$userId = $result['id'];
	
					$stmnt = $dbh->prepare("INSERT INTO `image` (`userid`, `source`) VALUES (?, ?);");
					$stmnt->execute([$userId, $fileName]);
					
					move_uploaded_file($fileTempName, "../gallery/" . $fileName);

					header("Location: ../editor.php?upload=success");

				}
			}
			else{	
			echo "File is too large";
				exit();
			}
		}
		else{
			echo "There was an error uploading the file";
			exit();
		}
	}
		else{
			echo "Please upload a jpeg or png file";
			exit();
		}

}

//not working yet
function displayImages(){
	
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$userName = $_SESSION['username'];

	$stmnt = $dbh->prepare("SELECT * FROM `image` WHERE (`username`=?) ORDER BY `creationdate` DESC;");
	$stmnt->execute($userName);
	$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $image){
		echo "<img src=\"./gallery/".$image['source']."\">";
	}
}

?>
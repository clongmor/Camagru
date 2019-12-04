
<?php
session_start();

//if ($_POST['action'] == 'uploadUserImage')
//{
	
	//uploadUserImage();
//}

/*function uploadUserImage() {
	ini_set("display_errors", 1);
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
*/

if (isset($_POST['imagedata']) && isset($_POST['stickerdata']))
{
	//ini_set("display_errors", 1);
	saveMergedImage();
}

function saveMergedImage(){
	//ini_set("display_errors", 1);
	include "../config/database.php";

	$userId = $_SESSION['id'];
	$base = $_POST['imagedata'];

	$sticker = $_POST['stickerdata'];
	
		$dst = imagecreatefromstring(base64_decode(substr($base, 22)));
		$src = imagecreatefromstring(base64_decode(substr($sticker, 22)));
			
		imagecopyresampled($dst, $src, 0, 0, 0, 0, 640, 480, 640, 480);
		ob_start();
			imagepng($dst);
			$source =  ob_get_contents();
		ob_end_clean();

		$mergedImage = $source;

	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmnt = $dbh->prepare("INSERT INTO `image` (`userid`, `source`) VALUES (?, ?);");
	$stmnt->execute([$userId, "data:image/png;base64," . base64_encode($mergedImage)]);

}
?>
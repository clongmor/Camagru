<?php
if ($_POST['action'] == 'uploadUserImage')
{
	uploadUserImage();
}

function uploadUserImage(){
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$file = $_FILES['image'];

	$fileName = $file['image']['name'];
	$fileTempName = $file['image']['tmp_name'];
	$fileError = $file['image']['error'];
	$fileSize = $file['image']['size'];
	$fileType = $_FILES['image']['type'];
	$fileExt = strtolower(end(explode('.', $_FILES['image']['name'])));

	$allowedExt = array("jpg", "jpeg", "png");

	if (in_array($fileExt, $allowedExt)){
		if($fileError === 0){
			if ($fileSize < 200000){
				$imageFullName = $fileName . $fileExt;
				$fileDestination = "../gallery/" . $imageFullName;

				if (empty($fileName) || empty($fileSize)) {
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
			new UploadException($file);
			exit();
		}
	}
		else{
			echo "Please upload a jpeg or png file";
			exit();
		}

}
class UploadException extends Exception
{
    public function __construct($code) {
        $message = $this->codeToMessage($code);
        parent::__construct($message, $code);
    }

    private function codeToMessage($code)
    {
        switch ($code) {
            case UPLOAD_ERR_INI_SIZE:
                $message = "The uploaded file exceeds the upload_max_filesize directive in php.ini";
                break;
            case UPLOAD_ERR_FORM_SIZE:
                $message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form";
                break;
            case UPLOAD_ERR_PARTIAL:
                $message = "The uploaded file was only partially uploaded";
                break;
            case UPLOAD_ERR_NO_FILE:
                $message = "No file was uploaded";
                break;
            case UPLOAD_ERR_NO_TMP_DIR:
                $message = "Missing a temporary folder";
                break;
            case UPLOAD_ERR_CANT_WRITE:
                $message = "Failed to write file to disk";
                break;
            case UPLOAD_ERR_EXTENSION:
                $message = "File upload stopped by extension";
                break;

            default:
                $message = "Unknown upload error";
                break;
        }
        return $message;
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
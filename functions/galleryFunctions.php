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
		
				$fileDestination = "../gallery/" . $fileName;
				
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
					$stmnt->execute([$userId, $fileDestination]);
					
					move_uploaded_file($fileTempName, $fileDestination);

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



class Pagination{
	protected $dbh;
	protected $display;

	public function __construct($dbh){
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$this->dbh = $dbh;
	}


	public function getUserImages($userId){

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = (isset($_GET['per-page']) && $_GET['per-page'] <= 50) ? (int)$_GET['per-page'] : 10;

	//page number
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	$dbh = $this->dbh;
	$stmnt = $dbh->prepare("SELECT `id` `source` `creationdate` FROM `image` WHERE `userid`=? LIMIT ?, ?");

	$stmnt->execute([$userId, $start, $perPage]);

	$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
	
	//foreach loop?
	$display = $result["source"];

	$total = $dbh->query("SELECT FOUND_ROWS as total)->fetch total");
	$pages = ciel($total/$perPage);
	return($display);
}

public function getAllImages(){

	$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
	$perPage = (isset($_GET['per-page']) && $_GET['per-page'] <= 50) ? (int)$_GET['per-page'] : 10;

	//page number
	$start = ($page > 1) ? ($page * $perPage) - $perPage : 0;

	$dbh = $this->dbh;
	$stmnt = $dbh->prepare("SELECT * FROM `image` LIMIT ?, ?");

	$stmnt->execute([$start, $perPage]);

	$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

	$display = $result["source"];

	$total = $dbh->query("SELECT FOUND_ROWS as total)->fetch total");
	$pages = ciel($total/$perPage);
	return($display);
}

}
?>
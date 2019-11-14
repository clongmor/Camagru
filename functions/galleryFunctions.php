<?php
//none of this works

class Pagination{
	protected $dbh;

	public function __construct(){
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
	$stmnt = $dbh->prepare("SELECT `id` `source` `creationdate` FROM `image` WHERE `userid`=? ORDER BY `creationdate` DESC LIMIT ?, ?");

	$stmnt->execute([$userId, $start, $perPage]);

	$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
	
	//foreach loop?
	$display = $result["source"];

	$total = $dbh->prepare("SELECT count(*) AS total FROM `image` WHERE `userid`=?");
	$total->execute($userId);

	$pages = ciel($total/$perPage);
}


}

function displayImages(){
	
	include "../config/database.php";
	$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
	$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$stmnt = $dbh->prepare("SELECT * FROM `image` ORDER BY `creationdate` DESC");
	$stmnt->execute();
	$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
	foreach($result as $image){
		echo "<img src=\"./gallery/".$image['source']."\">";
	};
}

?>
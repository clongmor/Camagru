<?php

	function displayImages() {
		include "config/database.php";
		include "functions/comments.php";
		$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$stmnt = $dbh->prepare("SELECT * FROM `image` ORDER BY `creationdate` DESC");
		$stmnt->execute();
		$result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

		foreach($result as $image){
			$string = $string."<div class='box'><img src=\"./gallery/".$image['source']."\" alt=\"error\" class='image is-640x480 center'>";
			$string = $string."<hr>".getComments($image['id']);
			$string = $string."</div><br>";
		}
		return ($string);
	}


	echo displayImages();
?>
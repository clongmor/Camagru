
<?php
session_start();

if (isset($_POST['imagedata']) && isset($_POST['stickerdata']))
{
	//ini_set("display_errors", 1);
	saveMergedImage();
}

function saveMergedImage(){
	include "../config/database.php";

	$userId = $_SESSION['id'];
	$base = $_POST['imagedata'];

	$sticker = $_POST['stickerdata'];
	
		$dst = imagecreatefromstring(base64_decode(substr($base, 22)));
		$src = imagecreatefromstring(base64_decode(substr($sticker, 22)));
			
		imagecopyresampled($dst, $src, 0, 0, 0, 0, 640, 500, 640, 500);
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
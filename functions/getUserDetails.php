<?php

    function getUserImages() {
        include "config/database.php";
        include "comments.php";
        include "likeFunctions.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmnt = $dbh->prepare("SELECT user.username AS username, user.id AS userid, image.source, image.id AS imageid FROM user INNER JOIN image ON user.id = image.userid WHERE user.username = ?;");
        $stmnt->execute([$_GET['name']]);
        $result = $stmnt->fetchAll();
        $string = "";

        foreach ($result as $image) {
            $string = $string . "<div class='box'>";
            if ($_SESSION['username'] == $_GET['name'])
                $string = $string . "<form action='functions/deleteImage.php' method='post'><input name='imageid' type='hidden' value='".$image['imageid']."'></input><button type='submit'>Delete Image</button></form>"; 
            $string = $string . "<img src=\"./gallery/" . $image['source'] . "\" alt=\"error\" class='image is-640x480 center'>";
            if (isset($_SESSION['username']))
                $string = $string . "<form action='forms/likes.php' method='post'><input type='hidden' name='imageid' value='"
            .$image['imageid']."'><input type='hidden' name='userid' value='".$_SESSION['id']."'></input><input type='hidden' name='username' value='".$image['username']."'></input><button type='submit'>";
            $string = $string . "<p>Likes: " . getLikeCount($image['imageid']);
            $string = $string . "</p></button></form><br>";
            $string = $string . getComments($image['imageid']);
            if (isset($_SESSION['username']))
                $string = $string."<form action='functions/storeComment.php?userid=".$_SESSION['id']."&imageid=".$image['id']."&username=".$_GET['name']."' method='post'><br>Text: <input type='text' name='text'><input type='submit' value='Post Comment'></form>";
            $string = $string ."</div>";
        }
        return ($string);
    }

    function getUserProfile()
    {
        include "config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmnt = $dbh->prepare("SELECT * FROM `user` WHERE (`username`=?);");
        $stmnt->execute([$_GET['name']]);
        $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);


        foreach ($result as $user) {
            $string = $string . "<div class='box'><img src=\"./gallery/".$user['picturesource']."\" alt=\"error\" class='image is-128x128'>".$user['username']."'s Profile<br>Contact Details: ".$user['email']."</div><br>";
        }
        return ($string);
    }

    function deleteImage($id) {
		ini_set('display_errors', 1);

        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        try {
            $stmt = $dbh->prepare("DELETE FROM `image` WHERE (`id` = ?);");
            $stmt->execute([$id]);
            if ($stmt->rowCount() == 0)
                echo "fail";
        } catch (PDOException $e) {
            echo "ERROR  DB: \n" . $e->getMessage() . "\nAborting process\n";
        }
        header("Location: ".$_SESSION['URI']);
    }

	function getEditorImages() {
		// ini_set('display_errors', 1);
		session_start();
		include "config/database.php";
		include "comments.php";
		include "likeFunctions.php";
		$dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
		$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$stmnt = $dbh->prepare("SELECT user.username AS username, user.id AS userid, image.source, image.id AS imageid FROM user INNER JOIN image ON user.id = image.userid WHERE user.username = ?;");
		$stmnt->execute([$_SESSION['username']]);
		$result = $stmnt->fetchAll();
		$string = "";

		foreach ($result as $image) {
			$string = $string .
				"<img src='./gallery/" . $image['source'] . "' alt='tongue_face' style='max-height: 100px; max-width:100px;''>
					<form action='functions/deleteImage.php' method='post'>
						<button type='submit' class='button purp_body padding_top padding_bot' value='Submit'><strong>Delete</strong></button>
						<input type='hidden' value='" . $image['imageid'] . "' name='imageid'></input>
					</form>";
		}
		return ($string);
	}
?>

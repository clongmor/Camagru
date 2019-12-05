<?php

    function getUserImages() {
        include "../database.phpdatabase.php";
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
            $string = $string . "<img src='" . $image['source'] . "' alt='error' class='image is-640x480 center'>";
            if (isset($_SESSION['username']))
                $string = $string . "<form action='forms/likes.php' method='post'><input type='hidden' name='imageid' value='"
            .$image['imageid']."'><input type='hidden' name='userid' value='".$_SESSION['id']."'></input><input type='hidden' name='username' value='".$image['username']."'></input><button type='submit'>";
            $string = $string . "<p>Likes: " . getLikeCount($image['imageid']);
            $string = $string . "</p></button></form><br>";
            $string = $string . getComments($image['imageid']);
            if (isset($_SESSION['username']))
                $string = $string."<form action='functions/storeComment.php' method='post'><br>Text: 
                <input type='text' name='text'></input>
                <input type='submit' value='Post Comment'></input>
                <input type='hidden' name='userid' value='".$_SESSION['id']."'></input>
                <input type='hidden' name='imageid' value='".$image['imageid']."'></input>
                <input type='hidden' name='username' value='".$_GET['name']."'></input></form>";
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
        $string = "";

        if ($stmnt->rowCount() == 0) {
            return "<strong>This user does not exist.</strong>";
        } else {
                foreach ($result as $user) {
                $string = $string . "<div class='box'><img src='".$user['picturesource']."' alt='error' class='image is-128x128'>".$user['username']."'s Profile<br>Contact Details: ".$user['email']."</div><br>";
            }
        }
        return ($string);
    }

    function deleteImage($id) {
		// ini_set('display_errors', 1);

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
				"<img src='" . $image['source'] . "' alt='tongue_face' style='max-height: 100px; max-width:100px;''>
					<form action='functions/deleteImage.php' method='post'>
						<button type='submit' class='button purp_body padding_top padding_bot' value='Submit'><strong>Delete</strong></button>
						<input type='hidden' value='" . $image['imageid'] . "' name='imageid'></input>
					</form>";
		}
		return ($string);
    }
    
    function uploadProfileImage() {
        // ini_set("display_errors", 1);
        session_start();
        include "../../config/database.php";
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
                        header("Location: ".$_SESSION['URI']);
                        exit();
                    } else {
                        $userId = $_SESSION['id'];
                        
                        $data = file_get_contents($fileTempName);
                        $encImage = base64_encode($data);
        
                        $stmnt = $dbh->prepare("UPDATE `user` SET `picturesource`=? WHERE (`id`=?);");
                        $stmnt->execute(["data:image;base64," . $encImage, $userId]);
                        
                        header("Location: ".$_SESSION['URI']);
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
?>

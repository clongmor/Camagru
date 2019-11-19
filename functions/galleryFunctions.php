<?php

	function displayImages() {
        include "config/database.php";
        include "functions/comments.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmnt = $dbh->prepare("SELECT user.username, image.source, image.id FROM user INNER JOIN image ON user.id = image.userid;");
        $stmnt->execute();
        $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $image) {
            $string = $string . "<div class='box'>
                <img src=\"./gallery/" . $image['source'] . "\" alt=\"error\" class='image is-640x480 center'><br>";
            $string = $string . getComments($image['id']);
            $string = $string."<form action='functions/storeComment.php?userid=".$_SESSION['id']."&imageid=".$image['id']."&username=".$_GET['name']."' method='post'><br>Text: <input type='text' name='text'><input type='submit' value='Post Comment'></form>";
            $string = $string ."</div>";
        }
        return ($string);
	}
?>

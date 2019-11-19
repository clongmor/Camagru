<?php

    function getUserImages() {
        include "config/database.php";
        include "functions/comments.php";
        include "likeFunctions.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmnt = $dbh->prepare("SELECT user.username as username, user.id as userid, image.source, image.id FROM user INNER JOIN image ON user.id = image.userid WHERE user.username = ?;");
        $stmnt->execute([$_GET['name']]);
        $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $image) {
            $string = $string . "<div class='box'>
                <img src=\"./gallery/" . $image['source'] . "\" alt=\"error\" class='image is-640x480 center'><form action='forms/likes.php' method='post'><input type='hidden' name='imageid' value='"
                .$image['id']."'><input type='hidden' name='userid' value='".$_SESSION['id']."'></input><input type='hidden' name='username' value='".$image['username']."'></input><button type='submit'><p>Likes: ";
            $string = $string . getLikeCount($image['id']);
            $string = $string . "</p></button></form><br>";
            $string = $string . getComments($image['id']);
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

        $user['picturesource'] = "defaultprofile.jpg";

        foreach ($result as $user) {
            $string = $string . "<div class='box'><img src=\"./gallery/".$user['picturesource']."\" alt=\"error\" class='image is-128x128'>".$user['username']."'s Profile<br>Contact Details: ".$user['email']."</div><br>";
        }
        return ($string);
    }
?>

<?php
    function getUserImages()
    {
        include "config/database.php";
        include "functions/comments.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmnt = $dbh->prepare("SELECT user.username, image.source, image.id FROM user INNER JOIN image ON user.id = image.userid WHERE user.username = ?;");
        $stmnt->execute([$_GET['name']]);
        $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $image) {
            $string = $string . "<div class='box'>
                <img src=\"./gallery/" . $image['source'] . "\" alt=\"error\" class='image is-640x480 center'><br>";
            $string = $string . getComments($image['id']);
            $string = $string . "</div>";
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
            $string = $string . "<div class='box'><img src=\"./gallery/".$user['picturesource']."\" alt=\"error\" class='image is-640x480 center'>".$user['username']."'s Profile<br>Contact Details: ".$user['email']."</div><br>";
        }
        return ($string);
    }
?>

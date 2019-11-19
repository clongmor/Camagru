<?php

    function addLike($userid, $imageid) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `like` (`userid`, `imageid`) VALUES (?, ?);");
        $stmt->execute([$imageid, $userid]);
        return ;
    }

    function removeLike($userid, $imageid) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("DELETE FROM `like` WHERE (`userid`=? AND `imageid`=?);");
        $stmt->execute([$imageid, $userid]);
        return ;
    }

    function like($userid, $imageid) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `like` WHERE (`userid`=? AND `imageid`=?);");
        $stmt->execute([$imageid, $userid]);
        $count = $stmt->rowCount();

        if ($count == 0) {
            addLike($userid, $imageid);
        } else {
            removeLike($userid, $imageid);
        }

        if (isset($_POST['username']))
            header("Location: ../user.php?name=" . $_POST['username']);
        else
            header("Location: ../gallery.php");
    }

    // function getLikeCount($imageid) {

    // }
?>
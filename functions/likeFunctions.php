<?php

    function addLike($userid, $imageid) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `like` (`userid`, `imageid`) VALUES (?, ?);");
        $stmt->execute([$userid, $imageid]);
        return ;
    }

    function removeLike($userid, $imageid) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("DELETE FROM `like` WHERE (`userid`=? AND `imageid`=?);");
        $stmt->execute([$userid, $imageid]);
        return ;
    }

    function like($userid, $imageid) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `like` WHERE (`userid`=? AND `imageid`=?);");
        $stmt->execute([$userid, $imageid]);
        $count = $stmt->rowCount();

        if ($count == 0) {
            addLike($userid, $imageid);
        } else {
            removeLike($userid, $imageid);
        }

        // echo $userid." AND ".$imageid;
        // echo $_POST['username'];
        if (isset($_POST['username']))
            header("Location: ../user.php?name=" . $_POST['username']);
        else
            header("Location: " . $_SESSION['URI']);
    }

    function getLikeCount($imageid) {
        // echo $imageid;
        include "config/database.php";
        // include "config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT COUNT(*) as `count` FROM `like` WHERE (`imageid`=?);");
        $stmt->execute([$imageid]);
        $count = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return ($count['count']);
    }

    // echo "<!>".getLikeCount(5);
?>
<?php

    function getComments($id) {
        include "/homes/hde-vos/Documents/camagru/config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `user`.`username`, `comment`.`text` FROM `comment` INNER JOIN `user` ON `user`.`id` = `comment`.`userid` WHERE `imageid` = ?;");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $string = "";

        foreach ($result as $comment) {
            $string = $string."<br><a href='user.php?name=".$comment['username']."'><strong>".$comment['username']."</strong></a>: ".$comment['text'];
        }
        return ($string);
    }

?>
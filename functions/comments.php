<?php

    function getComments($id) {
        include "/homes/apappas/Applications/MAMP/apache2/htdocs/teamCamagru/config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `comment` WHERE `imageid`=?");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $string = "";

        foreach ($result as $comment) {
            $string = $string."<br>".$comment['text'];
        }
        return ($string);
    }

?>
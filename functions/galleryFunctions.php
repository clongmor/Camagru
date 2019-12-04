<?php

	function displayImages($page) {
        // ini_set("display_errors", 1);
        include "config/database.php";
        include "comments.php";
        include "likeFunctions.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmnt = $dbh->prepare("SELECT * FROM user INNER JOIN image ON user.id = image.userid LIMIT ".htmlspecialchars($page * 5 - 5).", 5;");
        $stmnt->execute();
        $result = $stmnt->fetchAll(PDO::FETCH_ASSOC);
        $count = $stmnt->rowCount();
        $string = "";
        
        foreach ($result as $image) {
            $string = $string . "<div class='box'><img src='" . $image['source'] . "' alt='error' class='image is-640x480 center'><br>";
            if (isset($_SESSION['username']))
                $string = $string . "<form action='forms/likes.php' method='post'><input type='hidden' name='imageid' value='".$image['id']
                    ."'><input type='hidden' name='userid' value='".$_SESSION['id']."'></input><button type='submit'>";
            $string = $string . "<p>Likes: " . getLikeCount($image['id']);
            $string = $string . "</p></button></form><br>";
            $string = $string . getComments($image['id']);
            if (isset($_SESSION['username']))
                $string = $string."<form action='functions/storeComment.php' method='post'><br>Text: 
                    <input type='text' name='text'></input>
                    <input type='submit' value='Post Comment'></input>
                    <input type='hidden' name='userid' value='".$_SESSION['id']."'></input>
                    <input type='hidden' name='imageid' value='".$image['id']."'></input>
                    <input type='hidden' name='username' value='".$_GET['name']."'></input></form>";
                    $string = $string ."</div>";
            }
            if ($count > 0) {
                $string = $string ."<form action='functions/pagination.php' method='get'><button type='submit' name='next' value='".$_GET['page']."'>Next</button></form>";
                $string = $string ."<form action='functions/pagination.php' method='get'><button type='submit' name='previous' value='".$_GET['page']."'>Previous</button></form>";
            }
            if ($count > 4)
                $_SESSION['pagesleft'] = TRUE;
            else
                $_SESSION['pagesleft'] = FALSE;
                return ($string);
        }
?>

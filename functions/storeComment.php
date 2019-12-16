<?php
    function commentEmail($commenter, $imageid, $text) {
        // ini_set("display_errors", 1);
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `user`.`username`, `user`.`email`, `user`.`verified` FROM `user` INNER JOIN `image` ON `image`.`userid` = `user`.`id` WHERE (`image`.`id` = ?);");
        $stmt->execute([$imageid]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($results['verified'] == 2) {
        $to = $results['email'];
        $subject = 'Madimgz - Comment on Post';
        $message = $commenter.' has commented on your post.<br>They said the following: '.$text.'<br>Go to the following link to reply: http://localhost:8081/camagru/user.php?name='.$results['username'];
        
        $headers = 'From: admin@madimgz.com';

        mail($to, $subject, $message, $headers);
        return (1);
        } else {
            return (0);
        }
    }

    // $_GET['userid'] = "1"; 
    // $_GET['imageid'] = "1";
    // $_POST['text'] = "test email send";
    // echo $_GET['userid']."\n".$_GET['imageid']."\n".$_POST['text'];
    // echo $_SESSION['username']."   asdfasdfasdf\n";
    session_start();
    // ini_set("display_errors", 1);

    include "../config/database.php";
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    try {
        $stmt = $dbh->prepare("INSERT INTO `comment` (`userid`, `imageid`, `text`) VALUES (?,?,?);");
        $stmt->execute([$_POST['userid'], $_POST['imageid'], htmlspecialchars($_POST['text'])]);
        commentEmail($_SESSION['username'], $_POST['imageid'], $_POST['text']);
    } catch (PDOException $e) {
        echo "ERROR  DB: \n" . $e->getMessage() . "\nAborting process\n";
    }
    
    header("Location: " . $_SESSION['URI']);
?>

<?php
    function storeUserDetails($username, $password, $email) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Checks whether username already exists.
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `username`=?");
        $stmt->execute([$username]);
        if ($count = $stmt->rowCount()) {
            $_SESSION['error'] = "User already exists.";
            $_SESSION['signup_success'] = FALSE;
            $stmt = null;
            return (0);
        }

        //Checks whether email is already in use.
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `email`=?");
        $stmt->execute([$email]);
        if ($count = $stmt->rowCount()) {
            $_SESSION['error'] = "Email is already in use.";
            $_SESSION['signup_success'] = FALSE;
            $stmt = null;
            return (0);
        }

        //Inserts details if username and email does not exist.
        $stmt = $dbh->prepare("INSERT INTO `user` (`username`, `password`, `email`) VALUES (?, ?, ?);");
        if ($stmt->execute([$username, $password, $email])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing users data to database.";
            return (0);
        }
    }
?>
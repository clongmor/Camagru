<?php

    function storeUserDetails($username, $password, $email) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Checks whether username already exists.
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `username`=?");
        $stmt->execute([$username]);
        if ($stmt->rowCount()) {
            $_SESSION['error'] = "User already exists.";
            $_SESSION['signup_success'] = FALSE;
            $stmt = null;
            return (0);
        }

        //Checks whether email is already in use.
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `email`=?");
        $stmt->execute([$email]);
        if ($stmt->rowCount()) {
            $_SESSION['error'] = "Email is already in use.";
            $_SESSION['signup_success'] = FALSE;
            $stmt = null;
            return (0);
        }

        insertPassword($username);
        insertUsername($password);
        insertEmail($email);
    }
    
    function insertUsername($username) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `user` (`username`) VALUES (?);");
        if ($stmt->execute([$username])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing username to database.";
            return (0);
        }
    }

    function insertPassword($password) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `user` (`password`) VALUES (?);");
        if ($stmt->execute([$password])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing password to database.";
            return (0);
        }  
    }
    
    function insertEmail($email) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `user` (`email`) VALUES (?);");
        if ($stmt->execute([$email])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing email to database.";
            return (0);
        }
    }
    
    function insertPictureSource($picturesource) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `user` (`picturesource`) VALUES (?);");
        if ($stmt->execute([$picturesource])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing picturesource to database.";
            return (0);
        }
    }

    function insertVerified($verified) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `user` (`verified`) VALUES (?);");
        if ($stmt->execute([$verified])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing verified to database.";
            return (0);
        }
    }

    function insertToken($token) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("INSERT INTO `user` (`token`) VALUES (?);");
        if ($stmt->execute([$token])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing token to database.";
            return (0);
        }
    }

?>
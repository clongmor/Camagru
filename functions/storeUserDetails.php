<?php

    function storeUserDetails($username, $password, $email) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Checks whether username already exists.
        try {
            $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `username`=?");
            $stmt->execute([$username]);
            if ($stmt->rowCount()) {
                $_SESSION['error'] = "User already exists.";
                $_SESSION['signup_success'] = FALSE;
                $stmt = null;
                return (0);
            }
        } catch (PDOException $e) {
            echo "ERROR  DB: \n".$e->getMessage()."\nAborting process\n";
            exit(-1);
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

        //Inserts details if username and email does not exist.
        $_SESSION['token'] = md5( rand(0,1000) );
        $token = $_SESSION['token'];
        $stmt = $dbh->prepare("INSERT INTO `user` (`username`, `password`, `email`, `token`) VALUES (?, ?, ?, ?);");
        if ($stmt->execute([$username, hash('whirlpool', $password), $email, $token])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing user data to database.";
            return (0);
        }
    }
    
    function updatePictureSource($picturesource) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("UPDATE `user` (`picturesource`) VALUES (?);");
        if ($stmt->execute([$picturesource])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing picturesource to database.";
            return (0);
        }
    }

    function updateVerified($verified) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("UPDATE `user` (`verified`) VALUES (?);");
        if ($stmt->execute([$verified])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing verified to database.";
            return (0);
        }
    }

    function updateToken($token) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("UPDATE `user` (`token`) VALUES (?);");
        if ($stmt->execute([$token])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error storing token to database.";
            return (0);
        }
    }

?>
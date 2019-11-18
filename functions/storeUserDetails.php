<?php

    function storeUserDetails($username, $password, $email) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //Checks whether username already exists.
        try {
            $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `username`=?;");
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
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE `email`=?;");
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
    
    // This is a template for any need queries.
    // function Query($picturesource) {
    //     include "../config/database.php";
    //     $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    //     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     $stmt = $dbh->prepare("Query;");
    //     if ($stmt->execute([$variable])) {
    //         $stmt = null;
    //         return (1);
    //     } else {
    //         $_SESSION['error'] = "Error message.";
    //         return (0);
    //     }
    // }

    function updateUsername($newusername) {
        include "/homes/hde-vos/Documents/camagru/config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `id` FROM `user` WHERE (`username`=?);");
        if ($stmt->execute([$_SESSION['username']])) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result['id'])
                $_SESSION['error'] = "Could not find user.";
            $id = $result['id'];
        }

        $stmt = $dbh->prepare("UPDATE `user` SET `username`=? WHERE (`id`=?);");
        if ($stmt->execute([$newusername, $id])) {
            $_SESSION['username'] = $newusername;
            $stmt = null;
            $stmt = $dbh->prepare("SELECT `username` FROM `user` WHERE (`id`=?);");
            if ($stmt->execute([$id])) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$result['username']) {
                    $_SESSION['error'] = "Could not find user.";
                    return (0);
                }
            }
            $_SESSION['usernamereset'] = TRUE;
            return (1);
        } else {
            $_SESSION['error'] = "Could not update username.";
            return (0);
        }
    }

    function updateEmail($newEmail) {
        include "/homes/hde-vos/Documents/camagru/config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `id` FROM `user` WHERE (`username`=?);");
        if ($stmt->execute([$_SESSION['username']])) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result['id'])
                $_SESSION['error'] = "Could not find user.";
            $id = $result['id'];
        }

        $stmt = $dbh->prepare("UPDATE `user` SET `email`=? WHERE (`id`=?);");
        if ($stmt->execute([$newEmail, $id])) {
            $stmt = null;
            $stmt = $dbh->prepare("SELECT `email` FROM `user` WHERE (`id`=?);");
            if ($stmt->execute([$id])) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$result['email']) {
                    $_SESSION['error'] = "Could not find user.";
                    return (0);
                }
            }
            $_SESSION['emailreset'] = TRUE;
            return (1);
        } else {
            $_SESSION['error'] = "Could not update email.";
            return (0);
        }
    }

    function updatePassword($newpassword) {
        include "/homes/hde-vos/Documents/camagru/config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `id` FROM `user` WHERE (`username`=?);");
        if ($stmt->execute([$_SESSION['username']])) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result['id'])
                $_SESSION['error'] = "Could not find user.";
            $id = $result['id'];
        }

        $stmt = $dbh->prepare("UPDATE `user` SET `password`=? WHERE (`id`=?);");
        if ($stmt->execute([hash("whirlpool", $newpassword), $id])) {
            $stmt = null;
            $stmt = $dbh->prepare("SELECT `password` FROM `user` WHERE (`id`=?);");
            if ($stmt->execute([$id])) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (!$result['password']) {
                    $_SESSION['error'] = "Could not find user.";
                    return (0);
                }
            }
            $_SESSION['passwordreset'] = TRUE;
            return (1);
        } else {
            $_SESSION['error'] = "Could not update password.";
            return (0);
        }
    }

    function updateNotifications($setting) {
        include "/homes/hde-vos/Documents/camagru/config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT `id` FROM `user` WHERE (`username`=?);");
        if ($stmt->execute([$_SESSION['username']])) {
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$result['id'])
                $_SESSION['error'] = "Could not find user.";
            $id = $result['id'];
        }

        $stmt = $dbh->prepare("UPDATE `user` SET `verified`=? WHERE (`id`=?);");
        if ($stmt->execute([$setting, $id])) {
            $stmt = null;
            $stmt = $dbh->prepare("SELECT `verified` FROM `user` WHERE (`id`=?);");
            if ($stmt->execute([$id])) {
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                var_dump($result);
                if (!$result['verified']) {
                    $_SESSION['error'] = "Could not find user.";
                    return (0);
                }
            }
            $_SESSION['passwordreset'] = TRUE;
            return (1);
        } else {
            $_SESSION['error'] = "Could not update notifications settings.";
            return (0);
        }
    }
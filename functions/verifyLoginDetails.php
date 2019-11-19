<?php

    function email_verification($user, $email){
        $to = $email;
        $subject = 'Madimgz email verification';
        $message = '
        Welcome '.$user.'
        Please click on the link below to verify your account:
        http://localhost:8080/camagru/email_verification.php?email='.$email.'&token='.$_SESSION['token'].'';
        
        $headers = 'From: admin@madimgz.com';

        mail($to, $subject, $message, $headers);
        return (0);
    }

    function verifyLoginDetails($username, $password) {
        include "../config/database.php";
        session_start();
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $_SESSION['error'] = NULL;
        //Checks whether username already exists.
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`username`=? AND `password`=?  AND `verified`>0);");
        $stmt->execute([$username, hash('whirlpool', $password)]);
        $results = $stmt->fetch();
        $_SESSION['id'] = $results['id'];
        if ($stmt->rowCount() == 1) {
            $stmt = NULL;
            return (1);
        }
        $usr = $dbh->prepare("SELECT * FROM `user` WHERE (`username`=? AND `password`=?);");
        $usr->execute([$username, hash('whirlpool', $password)]);
        if ($stmt->rowCount() == 0 && $usr->rowCount() == 1) {
            $_SESSION['error'] = "Please validate your email and try again";
            return (0);
        }
        else {
            $_SESSION['error'] = "Username or password is incorrect.";
            return (0);
        }
    }
?>
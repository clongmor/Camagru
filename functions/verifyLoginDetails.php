<?php

    function email_verification($user, $email){
        $to = 'xcamagru_user@mailinator.com';
        $subject = 'Madimgz email verification';
        $message = '
        Welcome '.$user.'
        Please click on the link below to verify your account:
        http://127.0.0.1:8080/teamCamagru/email_verification.php?email='.$email.'&token='.$_SESSION['token'].'';
        
        $headers = 'From: lady.xerena@gmail.com';

        mail($to, $subject, $message, $headers);
        return (0);
    }

    function verifyLoginDetails($username, $password) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $_SESSION['error'] = NULL;
        //Checks whether username already exists.
        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`username`=? AND `password`=?);");
        $stmt->execute([$username, $password]);
        if ($stmt->rowCount() == 1) {
            $stmt = NULL;
            return (1);
        }
        else {
            $_SESSION['error'] = "Username or password is incorrect.";
            return (0);
        }
    }

?>
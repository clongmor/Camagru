<?php

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
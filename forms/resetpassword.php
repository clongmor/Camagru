<?php
    session_start();
    include "../config/database.php";
    include "../forms/validation.php";

    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $_SESSION['resetpasswordsuccess'] = FALSE;

    if (validatePassword($password, $repeatpassword)) {
        $stmt = $dbh->prepare("UPDATE `user` SET `password`=? WHERE (`username`=? AND `token`=?);");
        if ($stmt->execute([hash('whirlpool', $password), $_GET['username'], $_GET['token']])) {   
            $stmt = null;
            $_SESSION['resetpasswordsuccess'] = TRUE;
            $_SESSION['error'] = NULL;
        } else {
            $_SESSION['resetpasswordsuccess'] = FALSE;
            $_SESSION['error'] = "Error resetting the users password.";
        }
    }
    header("Location: ../passwordreset.php?username=".$_GET['username']."&token=".$_GET['token']);
?>
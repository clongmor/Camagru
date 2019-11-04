<?php
    include "config/database.php";
    include "validation.php";
    include "../functions/verifyLoginDetails.php";
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['login_success'] = NULL;
    $_SESSION['error'] = NULL;

    if (empty($username)) {
        $_SESSION['error'] = "Please insert a username.";
    } else if (empty($password)) {
        $_SESSION['error'] = "Please insert a password."; 
    } else {
        if (verifyLoginDetails($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['login_success'] = TRUE;
            header("Location: ../home_page.php");
        } else {
            $_SESSION['login_success'] = FALSE;
            header("Location: ../login.php");
        }
    }
    
?>
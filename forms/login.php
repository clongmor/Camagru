<?php
    
    session_start();
    include "../config/database.php";
    include "../forms/validation.php";
    include "../functions/verifyLoginDetails.php";
    

    $username = $_POST['username'];
    $password = $_POST['password'];
    // $username = "Hallocoos";
    // $password = "12345678";
    $_SESSION['login_success'] = NULL;
    $_SESSION['error'] = NULL;



    if (empty($username)) {
        $_SESSION['error'] = "Please insert a username.";
        header("Location: ../login.php");
    } else if (empty($password)) {
        $_SESSION['error'] = "Please insert a password.";
        header("Location: ../login.php");
    } else {
        if (verifyLoginDetails($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = FALSE;
            $_SESSION['login_success'] = TRUE;

            // echo ("Location: ../home_page.php");
            header("Location: ../home_page.php");
        } else {
            $_SESSION['login_success'] = FALSE;
            // echo ("Location: ../login.php");
            header("Location: ../login.php");
        }
    }
?>

<?php
    include "config/database.php";
    include "validation.php";
    include "../functions/storeUserDetails.php";
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $email = $_POST['email'];

    $_SESSION['signup_success'] = FALSE;

    if (validateUsername($username) == 1) {
        if (validateEmail($email) == 1) {
            if (validatePassword($password, $repeatpassword) == 1) {
                $_SESSION['signup_success'] = TRUE;
                storeUserDetails($username, $password, $email);
            }
        }
    }
    
    header("Location: ../sign_up.php");
?>
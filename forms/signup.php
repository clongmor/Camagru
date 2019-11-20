<?php
    include "validation.php";
    include "../functions/storeUserDetails.php";
    include "../functions/verifyLoginDetails.php";
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $email = $_POST['email'];


    // $username = "wdvwdvwdv";
    // $password = "123456789";
    // $repeatpassword = $password;
    // $email = "wdv1@mailinator.com";

    $_SESSION['signup_success'] = FALSE;

    if (validateUsername($username) == 1) {
        if (validateEmail($email) == 1) {
            if (validatePassword($password, $repeatpassword) == 1) {
                if (storeUserDetails($username, $password, $email)) {
                    $_SESSION['signup_success'] = TRUE;
                    email_verification($username, $email);
                }
            }
        }
    }
    
    header("Location: ../sign_up.php");
?>

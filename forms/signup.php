<?php
    include "../config/database.php";
    include "validation.php";
    include "../functions/storeUserDetails.php";
    include "../functions/verifyLoginDetails.php";
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];
    $email = $_POST['email'];
    $_SESSION['signup_success'] = FALSE;

    if (validateUsername($username) == 1) {
        if (validateEmail($email) == 1) {
            if (validatePassword($password, $repeatpassword) == 1) {
<<<<<<< HEAD
               if(storeUserDetails($username, $password, $email)){
                email_verification($username, $email);
                $_SESSION['signup_success'] = TRUE;
               }
=======
                if (storeUserDetails($username, $password, $email))
                    $_SESSION['signup_success'] = TRUE;
                email_verification($username, $email);
>>>>>>> 5eeed0d3cb049162e63552402cf32bf3324d80df
            }
        }
    }
 header("Location: ../sign_up.php");
?> 
<?php
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
                if (storeUserDetails($username, $password, $email)) {
                    $_SESSION['signup_success'] = TRUE;
                    email_verification($username, $email);
                }
            }
        }
    }
<<<<<<< HEAD
    
=======
>>>>>>> 2c6f1835e9eb16dcd8727e6769002c4438c9cbbb
    header("Location: ../sign_up.php");
?>

<?php 
    include "../../functions/storeUserDetails.php";
    include "../validation.php";
    session_start();

    // $_SESSION['username'] = "Hallocoos";
    // $_SESSION['password'] = "12341234";
    // $_SESSION['repeatpassword'] = "12341234";
    // echo $_SESSION['username'];
    $_SESSION['passwordcheck'] = TRUE;
    if (validatePassword($_POST['password'], $_POST['repeatpassword'])) {
        updatePassword($_POST['password']);
    }
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
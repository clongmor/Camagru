<?php 
    include "../../functions/storeUserDetails.php";
    include "../validation.php";
    session_start();

    // $_SESSION['username'] = "wouterdevos";
    // $_POST['email'] = "wdv2@mailinator.com";
    // echo $_SESSION['username'];
    // echo $_POST['email'];
    $_SESSION['emailcheck'] = TRUE;
    if (validateEmail($_POST['email'])) {
        updateEmail($_POST['email']);
    }
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
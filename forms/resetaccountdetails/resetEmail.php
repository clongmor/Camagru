<?php 
    include "../functions/storeUserDetails.php";
    include "../forms/validation.php";
    session_start();

    // $_SESSION['username'] = "Hallocoos";
    // $_POST['email'] = "wdv@live.co.za";
    // echo $_SESSION['username'];
    // echo $_POST['email'];
    $_SESSION['emailcheck'] = TRUE;
    if (validateEmail($_POST['email'])) {
        updateEmail($_POST['email']);
    }
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
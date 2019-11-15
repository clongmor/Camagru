<?php 
    include "/homes/hde-vos/Documents/camagru/functions/storeUserDetails.php";
    include "/homes/hde-vos/Documents/camagru/forms/validation.php";
    session_start();

    // $_SESSION['username'] = "Hallocoos";
    // $_POST['email'] = "wdv@live.co.za";
    // echo $_SESSION['username'];
    // echo $_POST['email'];
    if (validateEmail($_POST['email'])) {
        updateEmail($_POST['email']);
    }
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
<?php 
    include "/homes/hde-vos/Documents/camagru/functions/storeUserDetails.php";
    include "/homes/hde-vos/Documents/camagru/forms/validation.php";
    session_start();

    // $_SESSION['username'] = "Hallocoos";
    // $_POST['username'] = "Hallocoos";
    // echo $_SESSION['username'];
    // echo $_POST['username'];
    if (validateUsername($_POST['username'])) {
        updateUsername($_POST['username']);
    }
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
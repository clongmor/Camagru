<?php
    session_start();
    include "config/database.php";
    include "../functions/validation.php";
    include "../functions/storeUserDetails.php";

    $password = $_POST['password'];
    $repeatpassword = $_POST['repeatpassword'];

    if (validatePassword($password, $repeatpassword)) {
        resetPassword($password);
        unset($_SESSION['error']);
        $_SESSION['resetpasswordsuccess'] = TRUE;
        header("Location: localhost:8080/camagru/passwordreset.php");
    } else {
        $_SESSION['resetpasswordsuccess'] = FALSE;
        header("Location: localhost:8080/camagru/passwordreset.php");
    }

?>
<?php
    include "config/database.php";
    include "../functions/validation.php";
    include "../functions/storeUserDetails.php";
    session_start();

    $password = $_SESSION['password'];
    $repeatpassword = $_SESSION['repeatpassword'];

    if (validatePassword($password, $repeatpassword)) {
        resetPassword($password);
        $_SESSION['resetpassword'] = TRUE;
        unset($_SESSION['error']);
    }

    header("Location: ../passwordreset.php");
?>
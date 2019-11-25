<?php
    include "../../functions/storeUserDetails.php";
    include "../validation.php";
    session_start();
    // ini_set('display_errors',1);

    // $_SESSION['username'] = "Hallocoos";
    // $_POST['username'] = "Hallocoos";
    // echo $_SESSION['username'];
    // echo $_POST['username'];
    $_SESSION['usernamecheck'] = TRUE;
    if (validateUsername($_POST['username'])) {
        updateUsername($_POST['username']);
    }
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
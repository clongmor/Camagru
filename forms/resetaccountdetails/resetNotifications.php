<?php
    include "../../functions/storeUserDetails.php";
    include "../validation.php";
    session_start();

    // $_SESSION['username'] = "Hallocoos";
    // $_SESSION['password'] = "12341234";
    // $_SESSION['repeatpassword'] = "12341234";
    // echo $_SESSION['username'];
    // $_POST['notifications'] = "Yes";
    $_SESSION['notificationcheck'] = TRUE;
    if ($_POST['notifications'] === "Yes" && isset($_POST['notifications']))
        updateNotifications(2);
    else
        updateNotifications(1);
    // echo $_SESSION['error'];
    header("Location: ../../account_settings.php");
?>
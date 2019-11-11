<?php

    include "validation.php";
    include "../functions/verifyLoginDetails.php";
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $_SESSION['login_success'] = NULL;
    $_SESSION['error'] = NULL;

    if (empty($username)) {
        $_SESSION['error'] = "Please insert a username.";
    } else if (empty($password)) {
        $_SESSION['error'] = "Please insert a password.";
    } else {
        if (verifyLoginDetails($username, $password)) {
            $_SESSION['username'] = $username;
            $_SESSION['login_success'] = TRUE;
        } else {
            $_SESSION['login_success'] = FALSE;
        }
    }
        echo "asdf";
        echo "<script>window.open('../home_page.php','_self')</script>";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    ls;dknjkldfhsjkl;dfgs;ljkdfghsabr
</body>

</html>
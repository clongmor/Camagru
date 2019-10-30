<?php
    include "config/database.php";
    include "validation.php";
    session_start();
    print_r($_POST);
    function signup() {

    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (validateUsername($username) == 1) {
        return;
    } else {
        header("Location: ../sign_up.php");
        return;
    }

    header("Location: ../sign_up.php");
?>
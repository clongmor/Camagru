<?php
    include "../functions/emailPassword.php";
    session_start();

    $user = $_POST['username'];
    $email = $_POST['email'];
    $to = $email;
    $subject = 'Madimgz Password Reset';
    $message = '
    Welcome '.$user.'
    Please click on the link below to reset your password:
    http://127.0.0.1:8080/teamCamagru/passwordreset.php?user='.$user;
    $headers = 'From: lady.xerena@gmail.com';

    mail($to, $subject, $message, $headers);

    $_SESSION['emailpasswordreset_success'] = "<p>The link to reset your password has been sent. Please check your email.</p>";

    header("Location: ../forgot_password.php");
?>
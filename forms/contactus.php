<?php

    session_start();

    $email = $_POST['email'];
    $text = $_POST['text'];

    $to = 'madimgz@mailinator.com';
    $subject = 'Madimgz - Contact Us';
    $message = $email.' has contacted us about the following: '.$text;
    $headers = 'From: '.$email;
    mail($to, $subject, $message, $headers);

    header("Location: ../contact_us.php");
    $_SESSION['success'] = "Email has been sent to the Madimgz team! Thank you for you feedback.";

?>
<?php
    session_start();
    include "../config/database.php";
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`username`=?);");
    $stmt->execute([$username]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $token = $result['token'];
    
    $to = $email;
    $subject = 'Madimgz Password Reset';
    $message = 'Welcome '.$username.'
    Please click on the link below to reset your password:
    http://localhost:8081/camagru/passwordreset.php?username='.$username.'&token='.$token;
    $headers = 'From: admin@madimgz.co.za';
    mail($to, $subject, $message, $headers);
    $_SESSION['emailpasswordreset_success'] = "<p>The link to reset your password has been sent. Please check your email.</p>";

    header("Location: ../forgot_password.php");
?>

<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign Up</title>
</head>

<body class="purp_body">
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="title">
                    Sign Up
                </div>
                <div class="subtitle">
                    <strong>We'll just need a few details from you to get started with posting your very own
                        crazy</strong><img src="./imgs/logo_rec_white.png" alt="" width="112" height="15">
                </div>
                <section class="section">
                    <div class="container has-text-centered">
                        <div class="columns is-centered">
                            <div class="column is-5 is-4-desktop">
                                <form method="post" action="forms/signup.php">
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="text" name="username" placeholder="Username" value="Hallocoos">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="text" name="email" placeholder="Email" value="wdv@live.co.za">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="password" name="password" placeholder="Password" value="12345678">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="password" name="repeatpassword" placeholder="Repeat Password" value="12345678">
                                        </div>
                                    </div>
                                    <div class="field is-grouped">
                                        <div class="control is-expanded">
                                            <button type="submit" value="Submit" class="button is-primary is-fullwidth">Sign up!</button>
                                        </div>
                                    </div>
                                    <span>
                                        <?php
                                        if ($_SESSION['signup_success'] == TRUE){
                                        $mail = new PHPMailer;
                                        $mail->setFrom('camagru@test.com', 'Cama Gru');
                                        $mail->addAddress('xcamagru_user@mailinator.com', '$_POST[username]');
                                        $mail->Subject = 'emailtest';
                                        $mail->AltBody = 'This is a test message';
                                        
                                        if (!$mail->send()){
                                                echo 'Mailer Error: '. $mail->ErrorInfo;
                                            }
                                        else{
                                            echo 'Message sent!';
                                        }
                                    }
                                        if ($_SESSION['signup_success'] == TRUE) {
                                            echo "Signup success please check your email.";
                                            $_SESSION['error'] = NULL;
                                            $_SESSION['signup_success'] = NULL;
                                        } else if ($_SESSION['error'] !== NULL) {
                                            echo " Signup failed. " . $_SESSION['error'];
                                            $_SESSION['error'] = NULL;
                                        }
                                        ?>
                                    </span>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </section>
</body>

</html>
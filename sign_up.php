<?php
    session_start();
    include "templates/header.php";
    include "./functions/verifyLoginDetails.php";
?>

<!DOCTYPE html>
<html lang="en">

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
                                            <input class="input" type="text" name="username" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="text" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="password" name="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- REMOVE THE value="" -->
                                            <input class="input" type="password" name="repeatpassword" placeholder="Repeat Password">
                                        </div>
                                    </div>
                                    <div class="field is-grouped">
                                        <div class="control is-expanded">
                                            <button type="Submit" value="Submit" class="button is-primary is-fullwidth">Sign up!</button>
                                        </div>
                                    </div>
                                    <span>
                                        <?php
                                        if ($_SESSION['signup_success'] == TRUE) {
                                            echo "Signup success please check your email to verify your account. After account verification, you can set you account details in the settings section.";
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
	<?php
	include "templates/footer.php";
?>
</body>

</html>
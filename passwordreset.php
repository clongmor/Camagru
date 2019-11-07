<?php
    session_start();
    include "templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Password Reset</title>
</head>

<body class="purp_body">

<section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="title">
                    Reset Password
                </div>
                <section class="section">
                    <div class="container has-text-centered">
                        <div class="columns is-centered">
                            <div class="column is-5 is-4-desktop">
                                <form method="post" action="forms/resetpassword.php">
                                    <div class="field">
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="text" name="password" placeholder="Password" value="123456789">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="text" name="repeatpassword" placeholder="Repeat Password" value="123456789">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <button class="button is-primary is-fullwidth" href="forms/resetpassword.php" type="Submit">Change Password!</button>
                                    </div>
                                    <?php
                                        // If $_SESSION['error'] is set, then it'll display the error, else it's display that the password has been successfully reset.
                                        if ($_SESSION['resetpasswordsuccess'] == TRUE) {
                                            echo "Password reset is successfull. Please login with new password.";
                                        } else if (isset($_SESSION['error'])) {
                                            echo "Password reset error: ".$_SESSION['error'];
                                            unset($_SESSION['error']);
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
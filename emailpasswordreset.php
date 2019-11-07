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
                                <form method="post" action="passwordreset.php">
                                    <div class="field">
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="text" name="email" placeholder="Email" value="wdv@live.co.za">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <!-- The href needs a value, not sure what Xandra is planning for the email functions, so it's empty atm. -->
                                        <button class="button is-primary is-fullwidth">Reset Password!</button>
                                    </div>
                                    <?php
                                        // Remove the following line to implement the code
                                        unset($_SESSION['error']);
                                        // Display's error message if $_SESSION['error'] is set, else sends the password reset email.
                                        if (isset($_SESSION['error'])) {
                                            echo " Email for Password Reset Error: ".$_SESSION['error'];
                                        } else if (!isset($_SESSION['error'])) {
                                            
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
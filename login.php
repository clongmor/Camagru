<?php
    session_start();
    include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Madimgz - Login</title>
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="../css/debug.css">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="purp_body">
    <section class="hero is-fullheight">
        <div class="hero-body">
            <div class="container has-text-centered">
                <div class="title">
                    Login
                </div>
                <section class="section">
                    <div class="container has-text-centered">
                        <div class="columns is-centered">
                            <div class="column is-5 is-4-desktop">
                                <form method="post" action="forms/login.php">
                                    <div class="field">
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="text" name="username" placeholder="Username" value="Hallocoos">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="password" name="password" placeholder="Password" value="12345678">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <button class="button is-primary is-fullwidth" type="Submit">Sign in!</button>
                                    </div>
                                    <?php
                                        if ($_SESSION['login_success'] == FALSE) {
                                            if ($_SESSION['error'] !== NULL)
                                                echo "<p style='color:Black'>Login failed. " . $_SESSION['error'] . "</p>";
                                            $_SESSION['login_success'] = NULL;
                                            $_SESSION['error'] = NULL;
                                            $_SESSION['username'] = NULL;
                                        }
                                    ?>
                                    <!-- We still need a password reset page. -->
                                    <a href="emailpasswordreset.php">Forgot Password</a>
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
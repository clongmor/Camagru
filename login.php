<?php
	include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Madimgz - Login</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <!-- <link rel="stylesheet" href="../css/debug.css"> -->
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
                                <form>
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="text" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <div class="control">
                                            <input class="input" type="password" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="field">
                                        <button class="button is-primary is-fullwidth">Sign in!</button>
                                    </div><a href="#">Forgot Password</a>
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
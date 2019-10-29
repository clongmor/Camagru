<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
</head>

<body>
    <header>
        <nav class="navbar" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="./home_page.php">
                    <img src="imgs/logo_rec.png" width="112" height="30" title="MadImgz">
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        Gallery
                    </a>

                    <a class="navbar-item" href="./how_it_works.php">
                        How It Works
                    </a>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            More
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="./about.php">
                                About
                            </a>
                            <a class="navbar-item" href="./contact_us.php">
                                Contact Us
                            </a>
                        </div>
                    </div>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item">
                        <div class="buttons">
                            <a class="button is-primary" href="sign_up.php">
                                <strong>Sign up</strong>
                            </a>
                            <a class="button is-light" href="login.php">
                                Log in
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
</body>

</html>
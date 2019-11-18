<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="./css/mystyles.css">
    <link rel="stylesheet" href="./css/styles.css">
    <style>
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body class="purp_body">
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
                    <a class="navbar-item" href="./gallery.php">
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
                    <?php
                    if(isset($_SESSION['username'])){
                    echo '<div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                            My Account
                        </a>
                    <div class="navbar-dropdown">
                            <a class="navbar-item" href="./account_settings.php">
                                Account Settings
                            </a>
                            <a class="navbar-item" href="./editor.php">
                                Create An Image
                            </a>
                        </div>
                    </div>';
                    } ?>
                </div>
                <?php if (!isset($_SESSION['username'])) : ?>
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
                <?php endif; ?>
				<?php if (isset($_SESSION['username'])) : ?>
				<div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <?php echo "Welcome ".$_SESSION['username']; ?>
                        </a>
						<div class="navbar-dropdown">
                            <a class="navbar-item" href="./account_settings.php">
                                Account Settings
                            </a>
                            <a class="navbar-item" href="./editor.php">
                                Create An Image
                            </a>
						</div>
				</div>
                <?php endif; ?>
                <?php if (isset($_SESSION['username'])) : ?>
                    <form action="signout.php">
                        <div class="navbar-end">
                            <div class="navbar-item">
                                <div class="buttons">
                                    <a class="button is-primary" href="signout.php">
                                        <strong>Sign Out</strong>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                <?php endif; ?>
            </div>
        </nav>
    </header>
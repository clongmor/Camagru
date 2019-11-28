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

                <a role="button" class="navbar-burger burger" onclick="document.querySelector('.navbar-menu').classList.toggle('is-active');" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item" href="./gallery.php?page=1">
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
                    <form action="forms/findUserProfile.php" method="post">
                        <div class="navbar-item field has-addons center">
                            <div class="control">
                                <input class="input" type="text" name="username" placeholder="Find a user Profile">
                            </div>
                            <div class="control">
                                <button class="button is-primary" type="submit" value="Submit">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
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
                            <a class="navbar-item" href="./user.php?name=<?php echo $_SESSION['username']?>">
                                View My Profile
                            </a>
						</div>
				</div>
                <?php endif; ?>
                <?php if (isset($_SESSION['username'])) : ?>
                    <form>
                        <div class="navbar-end">
                            <div class="navbar-item">
                                <div class="buttons">
                                    <a class="button is-primary" href="forms/signout.php">
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
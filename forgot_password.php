<?php 
	session_start();
	include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz - Forgot Password</title>
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
			<div class="section">
				<h1 class="title">Forgot Password?</h1>
				<h2 class="subtitle">Not to worry, we can help with that!</h2>
				<p>Just fill in the email you registered with in the box below and submit it. Then check your email inbox for an email from us with your new password. You can then use this password to login and change it to a different password from your account settings</p>
			</div>
                <section class="section">
                    <div class="container has-text-centered">
                        <div class="columns is-centered">
                            <div class="column is-5 is-4-desktop">
							<form method="post" action="forms/emailpasswordreset.php">
                                    <div class="field">
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="text" name="username" placeholder="Username" value="">
										</div>
										<br>
                                        <div class="control">
                                            <!-- Remove the value="" -->
                                            <input class="input" type="text" name="email" placeholder="Email" value="">
                                        </div>
									</div>
                                    <div class="field">
                                        <button class="button is-primary is-fullwidth" type="Submit">Reset Password!</button>
                                    </div>
                                    <?php
										echo $_SESSION['emailpasswordreset_success'];
										$_SESSION['emailpasswordreset_success'] = NULL;
                                    ?>
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
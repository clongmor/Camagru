<?php
session_start();
include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz - Account Settings</title>
	<style>
		.center {
			display: flex;
			justify-content: center;
			align-items: center;
		}
	</style>
</head>

<body class="purp_body">
	<?php if (isset($_SESSION['username'])) : ?>
	<?php
		$_SESSION['URI'] = $_SERVER['REQUEST_URI'];
	?>
		<section class="hero is-fullheight">
			<div class="hero-body">
				<div class="container">
					<h1 class="title has-text-centered"> Want to change your details?</h1>
					<h1 class="subtitle has-text-centered">You've come to the right place!</h1>
					<section class="section">
						<div class="container">
							<div class="columns is-centered">
								<div class="column is-5 is-4-desktop">
									<form method="post" action="forms/resetaccountdetails/resetUsername.php">
										<div class="field">
											<div class="control">
												Change your username:
												<input class="input" type="text" name="username" placeholder="Username" value="">
											</div>
										</div>
										<div class="field">
											<div class="control">
												<button type="submit" value="Submit" class="button is-primary is-fullwidth has-text-grey">Confirm Username Change</button>
											</div>
										</div>
										<?php
											if ($_SESSION['usernamecheck']) {
												if (isset($_SESSION['error'])) {
													echo "Error setting new username: " . $_SESSION['error'];
												} else if ($_SESSION['usernamereset']) {
													echo "Username reset is successful. Please remember to log in with new username after signing out.";
												}
												unset($_SESSION['usernamereset']);
												unset($_SESSION['error']);
												$_SESSION['usernamecheck'] = FALSE;
											}
											?>
									</form>
								</div>
							</div>
						</div>
					</section>
					<section class="section">
						<div class="columns is-centered">
							<div class="column is-5 is-4-desktop">
								<form method="post" action="forms/resetaccountdetails/resetEmail.php">
									<div class="field">
										<div class="control">
											Change your email:
											<input class="input" type="text" name="email" placeholder="Email" value="">
										</div>
									</div>
									<div class="field">
										<div class="control">
											<button type="submit" value="Submit" class="button is-primary is-fullwidth has-text-grey">Confirm Email Change</button>
										</div>
									</div>
									<?php
										if ($_SESSION['emailcheck']) {
											if (isset($_SESSION['error'])) {
												echo "Error setting new email: " . $_SESSION['error'];
											} else if ($_SESSION['emailreset']) {
												echo "Email reset is successful.";
											}
											unset($_SESSION['emailreset']);
											unset($_SESSION['error']);
											$_SESSION['emailcheck'] = FALSE;
										}
										?>
								</form>
							</div>
						</div>
					</section>
					<section class="section">
						<div class="columns is-centered">
							<div class="column is-5 is-4-desktop">
								<form method="post" action="forms/resetaccountdetails/resetPassword.php">
									<div class="field">
										<div class="control">
											Change your password:
											<input class="input" type="password" name="password" placeholder="Password" value="">
										</div>
									</div>
									<div class="field">
										<div class="control">
											<input class="input" type="password" name="repeatpassword" placeholder="Repeat Password" value="">
										</div>
									</div>
									<div class="field">
										<div class="control">
											<button type="submit" value="Submit" class="button is-primary is-fullwidth has-text-grey">Confirm Password Change</button>
										</div>
									</div>
									<?php
										if ($_SESSION['passwordcheck']) {
											if (isset($_SESSION['error'])) {
												echo "Error setting new password: " . $_SESSION['error'];
											} else if ($_SESSION['passwordreset']) {
												echo "Password reset is successful.";
											}
											unset($_SESSION['passwordreset']);
											unset($_SESSION['error']);
											$_SESSION['passwordcheck'] = FALSE;
										}
										?>
								</form>
							</div>
						</div>
					</section>
					<section class="section">
						<div class="columns is-centered">
							<div class="column is-5 is-4-desktop">
							<form action="forms/resetaccountdetails/resetProfileImage.php" method="post" enctype="multipart/form-data">
								<div class="field">
									<h1>Change your Profile Picture! </h1>
								</div>
								<input type="hidden" name="action" value="uploadUserImage">
								<div class="field">
									<div class="control">
										<input class="input" type="file" name="image">`
									</div>
								</div>
								<div class="field">
									<div class="control">
										<button type="submit" class="button is-primary is-fullwidth has-text-grey" value="Submit">Upload New Profile Picture!</button>
									</div>
								</div>
							</form>
							</div>
						</div>
					</section>
					<section class="section">
						<div class="columns is-centered">
							<div class="column is-5 is-4-desktop">
								<form method="post" action="forms/resetaccountdetails/resetNotifications.php">
								<div class="field">
									<h1>Do you want to receive email notifications for comments and likes on your uploaded images? </h1>
								</div>
								<div class="field">
									<label class="radio">
									<input type="checkbox" name="notifications" value="Yes">
									Yes
									</label>
								</div>
								<div class="field">
									<div class="control">
										<button type="submit" value="Submit" class="button is-primary is-fullwidth has-text-grey">Change my notifications</button>
									</div>
								</div>
								<?php
									if ($_SESSION['notificationcheck']) {
										if (isset($_SESSION['error'])) {
											echo "Error setting new notification settings: " . $_SESSION['error'];
										} else if ($_SESSION['notificationreset']) {
										echo "Notification settings are successfully reset.";
										}
										unset($_SESSION['notificationreset']);
										unset($_SESSION['error']);
										$_SESSION['notificationcheck'] = FALSE;
									}
								?>
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php if (!isset($_SESSION['username'])) : ?>
		<section class="hero is-fullheight">
			<div class="hero-body">
					<section class="section">
						<h1 class="title center">
							Hi, you don't seem to have access to this page. Please login and try again.
						</h1>
						<script>
				function Redirect(){
  				window.location = "login.php";
				}
				setTimeout('Redirect()', 4000);
			</script>
					</section>
				</div>
			</div>
		</section>
	<?php endif; ?>
	<?php
	include "templates/footer.php";
	?>
</body>

</html>
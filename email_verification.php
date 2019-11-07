<?php
    session_start();
	include "templates/header.php";
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Madimgz</title>
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
			<div class="container">
				<figure class="image center">
					<img src="./imgs/welcome.png" alt="Welcome" style="max-height: 600px; max-width:600px;">
                </figure>
			</div>
		</div>
	</section>
</body>
<?php
include './config/database.php';

if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['token']) && !empty($_GET['token'])){
    // Verify data
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $email = ($_GET['email']); // Set email variable
    $token = ($_GET['token']); // Set token variable
}

$search = $dbh->prepare("SELECT `email`, `token`, `verified` FROM `user` WHERE (`email`=? AND `token`=? AND `verified`=0)"); 
if($search->execute([$email, $token]))
{
    // We have a match, activate the account
    $stmt = $dbh->prepare("UPDATE `user` SET `verified`=1 WHERE (`email`=? AND `token`=? AND `verified`=0)");
    $stmt->execute([$email, $token]);
    echo '<div class="statusmsg">Your account has been activated, you can now login</div>';
}else{
    // No match -> invalid url or account has already been activated.
    echo '<div class="statusmsg">The url is either invalid or you already have activated your account.</div>';
}
?>
</html>




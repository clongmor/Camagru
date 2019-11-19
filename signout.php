<?php
    session_start();
    include "templates/header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Out</title>
</head>
<body>
    <?php
        unset($_SESSION['username']);
        session_unset();
        session_destroy();
        header("Location: home_page.php");
        include "templates/footer.php";
    ?> 
</body>
</html>
<?php

    include "../config/database.php";
    include "../functions/likeFunctions.php";
    session_start();   
    like($_POST['userid'], $_POST['imageid']);

    if (isset($_POST['username']))
        header("Location: ../user.php?name=" . $_POST['username']);
    else
        header("Location: ../gallery.php");
?>
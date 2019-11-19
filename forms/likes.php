<?php

    include "../config/database.php";
    include "../functions/likeFunctions.php";
    session_start();   
    like($_POST['userid'], $_POST['imageid']);
?>
<?php
    include "getUserDetails.php";
    session_start();
    ini_set('display_errors',1);
    // echo $_POST['imageid'];
    deleteImage($_POST['imageid']);
?>
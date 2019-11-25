<?php
    include "getUserDetails.php";
    session_start();
    // ini_set('display_errors', 1);
    // echo $_POST['imageid'];
    // $_SESSION['URI'] = $_SERVER['REQUEST_URI'];
    // echo $_SESSION['URI'];
    deleteImage($_POST['imageid']);
?>
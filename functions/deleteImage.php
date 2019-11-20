<?php
    include "getUserDetails.php";
    session_start();
    // echo $_POST['imageid'];
    deleteImage($_POST['imageid']);
?>
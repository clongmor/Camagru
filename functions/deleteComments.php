<?php
    include "comments.php";
    session_start();
    deleteComment($_POST['id']);
?>
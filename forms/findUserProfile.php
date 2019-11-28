<?php
    session_start();
    header("Location: ../user.php?name=".$_POST['username']);
?>
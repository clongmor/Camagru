<?php
    session_start();
    if (isset($_GET['next']) && $_SESSION['pagesleft']) {
        $_GET['next']++;
        header("Location: ../gallery.php?page=".$_GET['next']);
    } else if (isset($_GET['previous']) && $_SESSION['pagesleft']) {
        if ($_GET['previous'] > 1)
            $_GET['previous']--;
        header("Location: ../gallery.php?page=".$_GET['previous']);
    } else
        header("Location: ../gallery.php?page=1");
?>
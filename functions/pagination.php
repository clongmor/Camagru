<?php

    if (isset($_GET['next'])) {
        $_GET['next']++;
        header("Location: ../gallery.php?page=".$_GET['next']);
    } else if (isset($_GET['previous'])) {
        if ($_GET['previous'] > 1)
            $_GET['previous']--;
        header("Location: ../gallery.php?page=".$_GET['previous']);
    }


?>
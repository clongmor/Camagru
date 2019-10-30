<?php
    function validateUsername($username) {
        unset($_SESSION['error']);
        if (!isset($username) || empty($username))
        {
            $_SESSION['error'] = "Please insert a username.";
        } else if (strlen($username) > 25) {
            $_SESSION['error'] = "Maximum length for a username is 25.";
        } else if (strlen($username) < 8) {
            $_SESSION['error'] = "Minimum length for a username is 8.";
        } else if (!ctype_alnum($username)) {
            $_SESSION['error'] = "Username may only contain alphabetic and numerical characters.";
        }
        if (isset($_SESSION['error'])) {
            return (0);
        }
        $_SESSION['signup_success'] = True;
        return (1);
    }
?>
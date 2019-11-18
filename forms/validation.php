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
        return (1);
    }

    function validatePassword($password, $repeatpassword) {
        unset($_SESSION['error']);
        if (!isset($password) || empty($password)) {
            $_SESSION['error'] = "Please insert a password.";
        } else if (strlen($password) > 255) {
            $_SESSION['error'] = "Maximum length for a password is 255.";
        } else if (strlen($password) < 8) {
            $_SESSION['error'] = "Minimum length for a password is 8.";
        } else if ($password !== $repeatpassword) {
            $_SESSION['error'] = "Passwords did not match.";
        } else if (ctype_lower($password)) {
            $_SESSION['error'] = "Password has to contain atleast one non-lowercase character.";
        }
        if (isset($_SESSION['error'])) {
            return (0);
        }
        return (1);
    }

    function validateEmail($email) {
        unset($_SESSION['error']);
        if (!isset($email) || empty($email)) {
            $_SESSION['error'] = "Please insert a email.";
        } else if (strlen($email) > 100) {
            $_SESSION['error'] = "Maximum length for a email is 100.";
        } else if (strlen($email) < 8) {
            $_SESSION['error'] = "Minimum length for a email is 8.";
        } else if (strpos($email, '@') == FALSE) {
            $_SESSION['error'] = "Please enter a valid email.";
        } else if (strpos($email, '.') == FALSE) {
            $_SESSION['error'] = "Please enter a valid email.";
        }
        if (isset($_SESSION['error'])) {
            return (0);
        }
        return (1);
    }
?>
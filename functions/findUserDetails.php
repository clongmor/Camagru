
<?php
    
    function selectUsername($username) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`username`=?);");
        if ($stmt->execute([$username])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error finding username in database.";
            return (0);
        }
    }

    function selectPassword($username, $password) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`password`=?);");
        if ($stmt->execute([$password])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error finding password in database.";
            return (0);
        }  
    }
    
    function selectEmail($email) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`email`=?);");
        if ($stmt->execute([$email])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error finding email in database.";
            return (0);
        }
    }
    
    function selectPictureSource($picturesource) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`picturesource`=?);");
        if ($stmt->execute([$picturesource])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error finding picturesource in database.";
            return (0);
        }
    }

    function selectVerified($verified) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`verified`=?);");
        if ($stmt->execute([$verified])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error finding verified in database.";
            return (0);
        }
    }

    function selectToken($token) {
        include "../config/database.php";
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $dbh->prepare("SELECT * FROM `user` WHERE (`token`=?);");
        if ($stmt->execute([$token])) {
            $stmt = null;
            return (1);
        } else {
            $_SESSION['error'] = "Error finding token in database.";
            return (0);
        }
    }

?>
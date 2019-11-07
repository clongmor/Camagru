<?php
    include 'database.php';

    // DROP DATABASE
    try {
        // Connect to Mysql server
        $dbh = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DROP DATABASE `".$DB_NAME."`";
        $dbh->exec($sql);
        echo "Database dropped successfully\n";
    } catch (PDOException $e) {
        echo "ERROR DROPPING DB: \n".$e->getMessage()."\nAborting process\n";
        exit(-1);
    }
?>
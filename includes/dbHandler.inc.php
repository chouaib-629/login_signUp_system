<?php

// Define the Data Source Name (DSN) for the MySQL database connection
$dsn = "mysql:host=localhost;dbname=tutorial_phpYoutube";

// Set the database username and password
$dbusername = "root";
$dbpassword = "";

// Attempt to establish a connection to the database
try {
    $pdo = new PDO($dsn, $dbusername, $dbpassword);

    // Set the error mode to exception, which will throw an exception if an error occurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// If a PDO exception is thrown, catch it and display an error message
} catch (PDOException $err) {
    echo "Connection Failed: ". $err->getMessage();
}
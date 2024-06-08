<?php
// Start the session to store and retrieve session data
session_start();

// Unset all session variables to clear the session data
session_unset();

// Destroy the session to completely remove it
session_destroy();

// Redirect the user to the index.php page using the HTTP Location header
header("Location: ../index.php");

// Exit the script to prevent any further execution
die();
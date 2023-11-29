<?php
session_start(); // Start the session

// Check if the user is logged in
if (isset($_SESSION['nowUser'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
}

// Redirect to the login page
header("Location: login.php");
exit();
?>

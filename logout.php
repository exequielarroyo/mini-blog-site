<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Destroy the session data
    session_destroy();

    // Redirect the user back to the login page or any other desired page
    header('Location: index.php');
    exit;
} else {
    // If the user is not logged in, redirect to the login page to prevent direct access
    header('Location: index.php');
    exit;
}
?>

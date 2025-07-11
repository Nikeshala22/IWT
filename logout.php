<?php
session_start(); // Start the session

// Check if the user is logged in
if(isset($_SESSION['user_id'])) {
    // Unset all of the session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();
    
    // Redirect to login page to prevent displaying content to logged out user
    header('Location: login.php');
    exit;
}
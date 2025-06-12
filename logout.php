<?php
session_start();             // Start the session
session_unset();             // Clear all session variables
session_destroy();           // Destroy the session

// Redirect to login page with a logout message
header("Location: login.php?message=loggedout");
exit;
?>

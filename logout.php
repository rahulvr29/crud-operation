<?php
// Start the session
session_start();
$_SESSION = [];
// Destroy the session
session_destroy();
// Redirect to the login page
header("Location: index.php");
exit();
?>
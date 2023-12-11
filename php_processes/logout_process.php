<?php
session_start();

// Unset user's session variable
unset($_SESSION['user_id']);

// Clear cookies
setcookie('user_id', '', time() - 3600, '/'); 
// Expire the cookie immediately

// Redirect to the home page after logout
header("Location: ../index.php");
exit();
?>
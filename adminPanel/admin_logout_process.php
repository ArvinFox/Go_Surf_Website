<?php
session_start();

// Unset admin's session variable
unset($_SESSION['admin_id']);

header("Location: ./admin_login.php");
exit();
?>
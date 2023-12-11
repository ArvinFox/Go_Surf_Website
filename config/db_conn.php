<?php
$servername = "localhost";
$username = "root";
$password = "" ; 
$dbName="go_surf_sri_lanka";

// Create a connection between php & mysql file
$conn = new mysqli($servername, $username, $password, $dbName);

if($conn->connect_error)
{
    die("Connection Failed : ". $conn->connect_error);
}
?>

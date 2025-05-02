<?php
$servername = "localhost"; // Change as per your configuration
$username = "root"; // Change as per your configuration
$password = ""; // Change as per your configuration
$dbname = "pnpweb_beta"; // Change as per your configuration

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
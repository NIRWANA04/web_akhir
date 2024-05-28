<?php
$servername = "localhost"; // or your server name
$username = "root"; // or your database username
$password = ""; // or your database password
$dbname = "akhirweb"; // replace with your database name

// Create connection
$koneksi = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$koneksi) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

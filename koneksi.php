<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "posyandu_pahri";

// Create connection
$koneksi = new mysqli($hostname, $username, $password, $database);

// Check connection
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
} 
echo "Connected successfully";

?>

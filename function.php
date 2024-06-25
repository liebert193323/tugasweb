<?php
session_start();

// Establish a connection to the database
$conn = mysqli_connect("localhost", "root", "", "stockbarang");

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

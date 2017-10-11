<?php 

$dbServerName = "DESKTOP-R2N2BOC";
$dbUserName = "dbAdmin";
$dbPassword = "speedwagon";
$dbName = "MangaDB";

$conn = new mysqli_connect()($dbServerName, $dbUserName, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";



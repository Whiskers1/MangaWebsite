<?php 

$dbServerName = "localhost";
$dbUserName = "root";
$dbPassword = "";
$dbName = "mangadb";

$conn = mysqli_connect($dbServerName, $dbUserName, $dbPassword, $dbName);

/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
*/


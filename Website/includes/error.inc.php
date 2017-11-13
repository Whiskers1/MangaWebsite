<?php
include "dbh.php";

$type = $_POST['type'];
$text = $_POST['text'];
$date = date("Y-m-d H:i:s");

$sql = "INSERT INTO errorlist (ErrorDate, ErrorType, ErrorDescription) VALUES ('$date', '$type', '$text');";
$conn->query($sql);

header("Location: ../index.php");
exit();

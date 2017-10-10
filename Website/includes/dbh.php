<?php 

$dbServerName = "DESKTOP-R2N2BOC";
$dbUserName = "dbAdmin";
$dbPassword = "speedwagon";
$dbName = "MangaDB";

$server = mssql_connect($dbServerName, $dbUserName, $dbPassword);

if (!$server) {
    die('Something went wrong while connecting to MSSQL Server');
}

$conn =  mssql_select_db($dbName, $server);

if (!$conn) {
    die('Something went wrong while connecting to MSSQL DataBase');
}
<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "data_management_ecup";

$objCon = mysqli_connect($serverName,$username,$password,$dbName);
mysqli_set_charset($objCon,"utf8");

?>
<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName = "ecup_data_management";

$objCon = mysqli_connect($serverName,$username,$password,$dbName);
mysqli_set_charset($objCon,"utf8");
//mysqli_set_charset($objCon,"tis620");

?>
<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$id = $_POST["id"];

if(isset($id)){
    $sql = "DELETE FROM `staff` WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
}
header('Location: staff.php');

?>

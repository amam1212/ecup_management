<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$id = $_POST["id"];

if(isset($id)){
    $sql = "DELETE FROM `faculty_members` WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
}
header('Location: faculty_members.php');

?>

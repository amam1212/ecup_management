<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$id = $_POST["id"];

if(isset($id)){
    $sql = "DELETE FROM `news_events` WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
}
header('Location: news_events.php');

?>

<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}

include '../connect-mysql.php';


$project = $_POST["project"];
$detail = $_POST["detail"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];

$sql = "SELECT * FROM `project` WHERE `project_name` =  \"$project\"";
$objQuery = mysqli_query($objCon,$sql);
$result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
var_dump($result["project_name"]);
if($result["project_name"]==NULL) {


    $sql = "INSERT INTO `project`(`project_name`, `detail`, `start_date`, `end_date`)
VALUES ('" . $project . "','" . $detail . "','" . $start_date . "','" . $end_date . "')";
    $objQuery = mysqli_query($objCon, $sql);

    $flgCreate = mkdir("../project_data/$project");


}






header('Location: project.php');
?>

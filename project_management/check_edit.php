<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../connect-mysql.php';

$id = $_POST["id"];
$project = $_POST["project"];
$detail = $_POST["detail"];
$start_date = $_POST["start_date"];
$end_date = $_POST["end_date"];


$sql = "SELECT * FROM `project` WHERE `id` =  \"$id\"";
$objQuery = mysqli_query($objCon,$sql);
while ($result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
{
    $oldname = $result["project_name"];
}

$sql = "SELECT * FROM `project` WHERE `project_name` =  \"$project\"";
$objQuery = mysqli_query($objCon,$sql);
$result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
var_dump($result["project_name"]);
if($result["project_name"]==NULL || $oldname == $project ) {

    $sql = "UPDATE `project` SET `project_name`='".$project."', `detail`='".$detail."',
     `start_date`='".$start_date."', `end_date`='".$end_date."' WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
    rename("../project_data/$oldname","../project_data/$project");



}


header('Location: project.php');


?>

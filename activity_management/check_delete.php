<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../connect-mysql.php';

$id = $_POST["id"];


echo $id;

if(isset($id)){
    $sql = "SELECT project_id FROM `project_activity_manager` WHERE `activity_id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    $project_id = $result["project_id"];

    $sql = "DELETE FROM `activity_file` WHERE `activity_id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);

    $sql = "DELETE FROM `project_activity_manager` WHERE `activity_id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);

    $sql = "DELETE FROM `activity` WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);


}
header('Location: ../project_management/view_project.php?id='.$project_id);

?>

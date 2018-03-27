<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}

include '../connect-mysql.php';

$project_id = $_POST["project_id"];
$activity_name = $_POST["activity_name"];
$date = $_POST["date"];






if($_FILES['files']['tmp_name'] !=="") {
    //$file = addslashes(file_get_contents($_FILES['files']['name']));
    $sql = "INSERT INTO `activity`(`activity_name`, `date`)
VALUES ('" . $activity_name . "','" . $date ."')";
    if (mysqli_query($objCon, $sql)) {
        $activity_id = mysqli_insert_id($objCon);



        for($i=0;$i<count($_FILES["files"]["name"]);$i++){
            $z = $i;
            $z++;
            $name = $_FILES['files']['name'][$i];
            $filenewcon = strstr($_FILES["files"]["name"][$i],'.');
            //$name = $activity_name."-".$z."$filenewcon";
            echo $name;
            $mime = $_FILES['files']['type'][$i];
            $data = addslashes(file_get_contents($_FILES  ['files']['tmp_name'][$i]));
            $size = intval($_FILES['files']['size'][$i]);

            //$file = addslashes(file_get_contents($_FILES['files']['tmp_name'][$i]));
        $sql = "INSERT INTO `activity_file`(`activity_id`, `f_name`, `f_mime`, `f_size`, `f_data`)
VALUES ('" . $activity_id . "','" . $name ."','" . $mime ."','" . $size ."','" . $data ."')";
        $objQuery = mysqli_query($objCon, $sql);

        }





        $sql = "INSERT INTO `project_activity_manager`(`project_id`, `activity_id`, `manager_id`)
VALUES ('" . $project_id . "','" . $activity_id . "','" . 1 ."')";
        $objQuery = mysqli_query($objCon, $sql);
    }
}



header('Location: ../project_management/view_project.php?id='.$project_id);

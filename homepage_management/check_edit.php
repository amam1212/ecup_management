<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$rank = $_POST["rank"];
$topic = $_POST["topic"];
$info = $_POST["info"];
$btn_name = $_POST["btn_name"];
$link = $_POST["link"];
$picture = $_FILES['pic']['name'];


if($picture !=="") {


    $sql = "UPDATE `header_homepage` SET `topic`='".$topic."',
    `info`='".$info."',
`btn_name`='".$btn_name."',
`link`='".$link."',
 WHERE `rank` = ".$rank;
    $objQuery = mysqli_query($objCon, $sql);

    $path="../../img";
$filenewcon = strstr($_FILES["pic"]["name"],'.');
    echo $filenewcon;

if(copy($_FILES["pic"]["tmp_name"] ,$path . "/" . "header$rank" . ".jpg" ))
{

//    echo "../../img/header1.jpg";



}



}
else{
    $sql = "UPDATE `header_homepage` SET `topic`='".$topic."',
    `info`='".$info."',
`btn_name`='".$btn_name."',
`link`='".$link."'
 WHERE `rank` = ".$rank;
    $objQuery = mysqli_query($objCon, $sql);
}

header('Location: header_homepage.php');


?>

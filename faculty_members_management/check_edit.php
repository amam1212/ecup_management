<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$id = $_POST["id"];
$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$position = $_POST["position"];


if($_FILES['pic']['tmp_name'] !=="") {
    $picture = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
    $sql = "UPDATE `faculty_members` SET `firstname`='".$firstname."',
    `lastname`='".$lastname."',
`position`='".$position."',
`pic`='".$picture."'
 WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
}
else{
    $sql = "UPDATE `faculty_members` SET `firstname`='".$firstname."',
    `lastname`='".$lastname."',
`position`='".$position."'
 WHERE `id` = ".$id;

    $objQuery = mysqli_query($objCon, $sql);
}

header('Location: faculty_members.php');


?>

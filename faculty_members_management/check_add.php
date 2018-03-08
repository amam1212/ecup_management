<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}

include '../../connect-mysql.php';


$firstname = $_POST["firstname"];
$lastname = $_POST["lastname"];
$position = $_POST["position"];



if($_FILES['pic']['tmp_name'] !=="") {
    $picture = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
    $sql = "INSERT INTO `faculty_members`(`firstname`, `lastname`, `position`,`pic`)
VALUES ('" . $firstname . "','" . $lastname . "','" . $position . "','" . $picture . "')";
    $objQuery = mysqli_query($objCon, $sql);
    header('Location: faculty_members.php');
}

?>

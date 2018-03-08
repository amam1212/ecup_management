<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}

include '../../connect-mysql.php';


$topic = $_POST["topic"];
$summary = $_POST["summary"];
$content = $_POST["content"];
$type = $_POST["type"];
$start_date = $_POST["date"];


if($_FILES['pic']['tmp_name'] !=="") {
    $picture = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
    $sql = "INSERT INTO `news_events`(`topic`, `summary`, `content`, `type`, `pic`, `start_date`)
VALUES (\"" . $topic . "\",\"" . $summary . "\",\"" . $content . "\",'" . $type . "','" . $picture . "','" . $start_date . "')";
    $objQuery = mysqli_query($objCon, $sql);
}


header('Location: news_events.php');
?>

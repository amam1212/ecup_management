<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$highlight1 = $_POST["highlight1"];
$highlight2 = $_POST["highlight2"];
$highlight3 = $_POST["highlight3"];
$highlight4 = $_POST["highlight4"];


if($highlight1 !=="") {

    $sql1 = "UPDATE `highlight_news` SET `news_events_id`='".$highlight1."' WHERE `id` = 1";
    $sql2 = "UPDATE `highlight_news` SET `news_events_id`='".$highlight2."' WHERE `id` = 2";
    $sql3 = "UPDATE `highlight_news` SET `news_events_id`='".$highlight3."' WHERE `id` = 3";
    $sql4 = "UPDATE `highlight_news` SET `news_events_id`='".$highlight4."' WHERE `id` = 4";
    $objQuery = mysqli_query($objCon, $sql1);
    $objQuery = mysqli_query($objCon, $sql2);
    $objQuery = mysqli_query($objCon, $sql3);
    $objQuery = mysqli_query($objCon, $sql4);


}


header('Location: highlight_news_events.php');


?>

<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

$id = $_POST["id"];
$topic = $_POST["topic"];
$summary = $_POST["summary"];
$content = $_POST["content"];
$type = $_POST["type"];
$start_date = $_POST["date"];

if($_FILES['pic']['tmp_name'] !=="") {
    $picture = addslashes(file_get_contents($_FILES['pic']['tmp_name']));
    $sql = "UPDATE `news_events` SET `topic`=\"".$topic."\",
    `summary`=\"".$summary."\",
`content`=\"".$content."\",
`type`='".$type."',
`pic`='".$picture."',
`start_date`='".$start_date."'
 WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
}
else{
        $sql = "UPDATE `news_events` SET `topic`=\"".$topic."\",
    `summary`=\"".$summary."\",
`content`=\"".$content."\",
`type`='".$type."',
`start_date`='".$start_date."'
 WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);
}


echo $sql;
//header('Location: news_events.php');


?>

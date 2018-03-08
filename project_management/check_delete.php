<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../connect-mysql.php';

function delete_directory($dirname) {
    if (is_dir($dirname))
        $dir_handle = opendir($dirname);
    if (!$dir_handle)
        return false;
    while($file = readdir($dir_handle)) {
        if ($file != "." && $file != "..") {
            if (!is_dir($dirname."/".$file))
                unlink($dirname."/".$file);
            else
                delete_directory($dirname.'/'.$file);
        }
    }
    closedir($dir_handle);
    rmdir($dirname);
    return true;
}

$id = $_POST["id"];

$sql = "SELECT * FROM `project` WHERE `id` =  \"$id\"";
$objQuery = mysqli_query($objCon,$sql);
while ($result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
{
    $oldname = $result["project_name"];
}

if(isset($id)){
    $sql = "DELETE FROM `project` WHERE `id` = ".$id;
    $objQuery = mysqli_query($objCon, $sql);


}
echo $oldname;
delete_directory("../project_data/$oldname");

header('Location: project.php');

?>

<?php
/**
 * Created by PhpStorm.
 * User: E5-573G
 * Date: 8/1/2561
 * Time: 12:29
 */
include 'connect-mysql.php';

$username = $_POST["txtUsername"];
$password = $_POST["txtPassword"];

if(isset($username)&&isset($password)) {
    $sql = "SELECT * FROM `admin` WHERE `username` = '".$username. "'";
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    if($result["username"]==$username&&$result["password"]==md5($password)){

        session_start();
        $_SESSION["Admin"] = $username;
        session_write_close();

        echo $_SESSION["Admin"];
        header('Location: home.php');
    }
    else{
        header('Location: home.php');
    }
}
else{
    header('Location: home.php');
}
?>

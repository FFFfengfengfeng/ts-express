<?php
header('Content-type: application/json; charset=utf-8');

$host     = "localhost";     //连接名
$user     = "root";          //连接用户名
$password = "";              //连接密码
$dbname   = "netsalesystem"; //数据库名

$conn = mysqli_connect( $host, $user, $password, $dbname );
mysqli_set_charset($conn , "utf8");

if (!$conn) {
    $success = "0";
    $message = "连接失败";
}

$sql = "";

//echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
?>
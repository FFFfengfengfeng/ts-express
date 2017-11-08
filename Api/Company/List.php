<?php
header('Content-type: application/json; charset=utf-8');

$host     = "localhost";     //连接名
$user     = "root";          //连接用户名
$password = "";              //连接密码
$dbname   = "netsalesystem"; //数据库名
$success  = "";              //请求状态 0.失败 1.成功
$message  = "";              //请求打印信息
$data     = [];              //返回数据

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    $success = "0";
    $message = "连接失败";
}

$key = $_POST["key"];

$sql = "SELECT * FROM Company";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

}

echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>

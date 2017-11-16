<?php
header('Content-type: application/json; charset=utf-8');

$host     = "localhost";     //连接名
$user     = "root";          //连接用户名
$password = "";              //连接密码
$dbname   = "netsalesystem"; //数据库名

$conn = mysqli_connect( $host, $user, $password, $dbname );
mysqli_set_charset($conn , "utf8");

$sql = "INSERT INTO Company (name, type, logo, place) VALUES ('" . $_POST["name"] . "', '" . $_POST["type"] . "', '" . $_POST["logo"] . "', '" . $_POST["place"] . "')";

$result = mysqli_query($conn, $sql);

if ($result) {
    $success = "1";
    $message = "添加成功";
} else {
    $success = "0";
    $message = "添加失败";
}

$json = array("success" => $success, "message" => $message);

echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>
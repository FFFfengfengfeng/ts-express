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

$data = [];
$success = "0";
$message = "";

if (isset($_POST["id"])) {
    $sql = "SELECT * FROM Company WHERE Id = '" . $_POST["id"] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($data, $row);
        }
    }
    $message = "获取成功";
    $success = "1";
} else {
    $message = "缺少参数id";
}

$json = array("success" => $success, "data" => $data, "message" => $message);
echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>
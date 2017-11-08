<?php
header('Content-type: application/json; charset=utf-8');

$servername = "localhost";
$username   = "root";
$password   = "";
$success = "1";
$message = "连接成功";
$data = [1, 2, 3, 4];

$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    $success = '0';
    $message = '连接失败';
}

$json = array(
    "success" => $success,
    "message" => $message,
    "data"    => $data
    );
echo json_encode($json, JSON_UNESCAPED_UNICODE);

?>
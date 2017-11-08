<?php
header('Content-type: application/json; charset=utf-8');

$username = $_POST["username"];
$password = $_POST["password"];
$success = '';
$message = '';
if ($username == "admin" && $password == "123456") {
    $success = '1';
    $message = '登录成功';
} else {
    $success = '0';
    $message = '登录失败';
}
$json = array('success' => $success, 'message' => $message);
echo json_encode($json,JSON_UNESCAPED_UNICODE);
?>
<?php
header('Content-type: application/json; charset=utf-8');

$host     = "localhost";     //连接名
$user     = "root";          //连接用户名
$password = "";              //连接密码
$dbname   = "netsalesystem"; //数据库名
$success  = "";              //请求状态 0.失败 1.成功
$message  = "";              //请求打印信息
$data     = "";              //返回数据

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    $success = '0';
    $message = '连接失败';
}

$user_name = $_POST["username"];
$pass_word = $_POST["password"];

$sql = "SELECT * FROM user WHERE username = '" . $user_name . "'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row["password"] == $pass_word) {
            $success = "1";
            $message = "登录成功";
        } else {
            $success = "0";
            $message = "用户或者密码错误";
        }
    }
} else {
    $success = "0";
    $message = "找不到该用户";
}

$json = array('success' => $success, 'message' => $message);
echo json_encode($json,JSON_UNESCAPED_UNICODE);
?>
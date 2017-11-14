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

$sql = "DELETE FROM Company WHERE id = " . $_POST["id"];
//$sql = "DELETE FROM Company WHERE id = 1";

$result = mysqli_query($conn, $sql);
$data     = "";
$success  = "0";
$message  = "删除失败";
if ($result) {
    $success  = "1";
    $message  = "删除成功";
    $data     = $result;
}



$json = array("success" => $success, "data" => $data, "message" => $message);
echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>
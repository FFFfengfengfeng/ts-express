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

function query_list($keyword, $page, $size) {
    $success  = "";              //请求状态 0.失败 1.成功
    $message  = "";              //请求打印信息
    $data     = [];              //返回数据
    if (isset($keyword)) {
        $sql = "SELECT * FROM Place WHERE NAME LIKE '%" . $keyword . "%'or NUMBER LIKE '%" . $keyword . "%'";
        $total = mysqli_num_rows(mysqli_query($GLOBALS["conn"], $sql));
    } else if (isset($page) && isset($size)){
        $sql = "SELECT * FROM Place limit " . (($page - 1) * $size) . "," . $size;
        $total = mysqli_num_rows(mysqli_query($GLOBALS["conn"], "SELECT * FROM Place"));
    } else {
        $sql = "SELECT * FROM Place";
    }
    $result = mysqli_query($GLOBALS["conn"], $sql);

    if ($total > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $order = explode(",", $row["orders"]);
            $row["orders"] = count($order);
            array_push($data, $row);
        }
        $success = 1;
        $message = "获取成功";
    }

    $json = array("success" => $success, "message" => $message, "data" => $data, "total" => $total);

    return $json;
}

if (!empty($_POST["keyword"])) {
    $keyword = $_POST["keyword"];
} else {
    $keyword = null;
}
if (!empty($_POST["page"])) {
    $page = $_POST["page"];
} else {
    $page = 1;
}
if (!empty($_POST["size"])) {
    $size = $_POST["size"];
} else {
    $size = 10;
}

$json = query_list($keyword, $page, $size);

echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>
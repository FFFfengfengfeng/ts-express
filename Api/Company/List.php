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

function query_list($keyword = null, $page = 1, $size = 10) {
    $success  = "";              //请求状态 0.失败 1.成功
    $message  = "";              //请求打印信息
    $data     = [];              //返回数据
    if ($keyword) {
        $sql = "SELECT * FROM Company WHERE NAME LIKE '%" . $keyword . "%'";
        $total    = mysqli_num_rows(mysqli_query($GLOBALS["conn"], $sql));
    } else {
        $sql = "SELECT * FROM Company limit " . (($page - 1) * $size) . "," . $size;
        $total    = mysqli_num_rows(mysqli_query($GLOBALS["conn"], "SELECT * FROM Company"));
    }
    $result = mysqli_query($GLOBALS["conn"], $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            switch ($row["type"]) {//保险公司的种类: 1.人寿保险,2.养老保险,3.汽车保险,4.财产保险
                case "1":
                    $row["type"] = "人寿保险";
                    break;
                case "2":
                    $row["type"] = "养老保险";
                    break;
                case "3":
                    $row["type"] = "汽车保险";
                    break;
                case "4":
                    $row["type"] = "财产保险";
                    break;
            }
            array_push($data, $row);
        }
        $success = "1";
        $message = "获取成功";

    }
    $json = array("success" => $success, "data" => $data, "message" => $message, "total" => $total);

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

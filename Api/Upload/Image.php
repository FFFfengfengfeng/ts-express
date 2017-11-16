<?php
header('Content-type: application/json; charset=utf-8');

$path = "../../upload/";

if (isset($_POST)) {
    $name = $_FILES["file"]["name"];
    $size = $_FILES["file"]["size"];
    $name_tmp = $_FILES["file"]["tmp_name"];

    $type = strtolower(substr(strrchr($name, '.'), 1)); //获取文件类型

    $pic_name = time() . rand(10000, 99999) . "." . $type;//图片名称
    $pic_url = $path . $pic_name;//上传后图片路径+名称
    $json = "";

    if (move_uploaded_file($name_tmp, $pic_url)) { //临时文件转移到目标文件夹
        $json = array("success" => "1", "src" => $pic_url, "name" => $pic_name, "message" => "上传成功");
    } else {
        $json = array("success" => "0", "message" => "上传失败");
    }

}

echo json_encode($json, JSON_UNESCAPED_UNICODE);
?>
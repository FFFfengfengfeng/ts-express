<?php
header('Content-type: application/json; charset=utf-8');
function save_image($image, $dir, $filename='') {
    $dir = realpath($dir);

    $filename = (empty($filename) ? '/'.time().'/'.$filename);
    $filename = $dir . $filename;

    ob_start();
    readfile($image);
    $img = ob_get_contents();
    ob_end_clean();
    $fp2 = fopen($filename , "a");
    fwrite($fp2, $img);
    return $filename;
}

$image = $_FILES;

if ($image) {
    $path = save_image($image, '../../upload');
    $json = array("success" => "1", "message" => "保存成功", "path" => $path);
    echo json_encode($json, JSON_UNESCAPED_UNICODE);
}
?>
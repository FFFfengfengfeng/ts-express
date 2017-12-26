<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-11-24
 * Time: 9:39
 */

namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Db;

class Login extends Controller
{
    public function index()
    {
        $this->view->engine->layout(false);
        return $this -> fetch('index');
    }
    public function login()
    {
        $map['name'] = $_POST["user_name"];
        $result = Db::table("user") -> where($map) -> select();
        $success = "0";
        $message = "获取失败";
        $data = null;
        if (empty($result)) {
            $message = "没有该用户";
        } else if ($_POST["user_password"] != $result[0]["password"]) {
            $message = "密码错误";
        } else {
            $data = $result[0]["id"];
            $success = "1";
            $message = "获取成功";
            Cookie::set('uid', $result[0]["id"], 7200);
        }
        $json = array("success" => $success, "message" => $message, "data" => $data);

        return json($json);

    }
    public function out()
    {
        Cookie::delete("uid");

        $this -> redirect('index');
    }
    public function register()
    {
        $success = "0";
        $message = "注册失败";

        $name     = $_POST["user_name"];
        $password = $_POST["user_password"];
        $resultName = Db::table("user") -> where("name", "=", $name) -> select();

        if (!empty($resultName)) {
            $message = "改用户名已存在!";
        } else {
            $result = Db::table("user") -> insert([
                "name"     => $name,
                "password" => $password,
                "wealth"   => '100000'
            ]);
            if ($result) {
                $message = "注册成功,请登录";
                $success = "1";
            }
        }

        $json = array("success" => $success, "message" => $message);

        return json($json);
    }
}
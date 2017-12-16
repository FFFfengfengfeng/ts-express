<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/15 0015
 * Time: 上午 2:45
 */

namespace app\index\controller;


use think\Db;

class Mine extends Base
{
    public function index()
    {
        $info = Db::table("user") -> where("id", "=", $_COOKIE["uid"]) -> select()[0];

        $this -> assign([
           "info" => $info
        ]);
        return $this -> fetch();
    }
    public function order()
    {
        $order = Db::table("order") -> where("user_id", "=", $_COOKIE["uid"]) -> paginate(5);
        $page  = $order -> render();

        $this -> assign([
            "order" => $order,
            "page"  => $page
        ]);

        return $this -> fetch();
    }
}
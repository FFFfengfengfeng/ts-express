<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-05
 * Time: 13:10
 */

namespace app\index\controller;


use think\Db;

class Check extends Base
{
    public function index()
    {
        $map =
        $check = Db::table("order") -> where("apply_state", "=", "1") -> paginate();

        $page = $check -> render();

        $this -> assign([
            "check" => $check,
            "page" => $page
        ]);

        return $this -> fetch();
    }
    public function check()
    {
        $id = $_REQUEST["order_id"];

        $order = Db::table("order") -> where("id", "=", $id) -> select()[0];

        $order["apply_state"] = 3;

        $result = Db::table("order") -> where("id", "=", $id) -> update($order);

        if ($result == 1) {
            $this -> redirect("grant/index");
        }
    }
}
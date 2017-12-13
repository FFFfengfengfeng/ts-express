<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-05
 * Time: 9:34
 */

namespace app\index\controller;


use think\Db;

class apply extends Base
{
    public function index()
    {
        $apply = Db::table("order") -> where("send_state", "=", "3") -> paginate("10");

        $page = $apply -> render();

        $this -> assign([
            "apply" => $apply,
            "page"  => $page
        ]);

        return $this -> fetch();
    }
    public function apply()
    {
        $id = $_REQUEST["order_id"];

        $order = Db::table("order") -> where("id", "=", $id) -> select()[0];

        $order["apply_state"] = 1;

        $result = Db::table("order") -> where("id", "=", $id) -> update($order);

        if ($result == 1) {
            $this -> redirect("check/index");
        }
    }
}
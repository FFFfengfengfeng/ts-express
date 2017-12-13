<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-05
 * Time: 15:14
 */

namespace app\index\controller;


use think\Db;

class Receive extends Base
{
    function index()
    {
        $receive = Db::table("order") -> where("apply_state", "=", "4") -> paginate();

        $page = $receive -> render();

        $this -> assign([
            "receive" => $receive,
            "page"    => $page
        ]);

        return $this -> fetch();
    }
    public function receive()
    {
        $id = $_REQUEST["order_id"];

        $order = Db::table("order") -> where("id", "=", $id) -> select()[0];

        $order["apply_state"] = 5;

        $result = Db::table("order") -> where("id", "=", $id) -> update($order);

        if ($result == 1) {
            $this -> redirect("index/index");
        }
    }
}
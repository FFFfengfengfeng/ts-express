<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-05
 * Time: 14:14
 */

namespace app\index\controller;


use think\Db;

class Grant extends Base
{
    public function index()
    {
        $grant = Db::table("order") -> where("apply_state", "=", "3") -> paginate();

        $page = $grant -> render();

        $this -> assign([
            "grant" => $grant,
            "page"  => $page
        ]);

        return $this -> fetch();
    }
    public function grant()
    {
        $id = $_REQUEST["order_id"];

        $order = Db::table("order") -> where("id", "=", $id) -> select()[0];

        $order["apply_state"] = 4;

        $result = Db::table("order") -> where("id", "=", $id) -> update($order);

        if ($result == 1) {
            $this -> redirect("receive/index");
        }
    }
}
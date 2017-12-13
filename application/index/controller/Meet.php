<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/5 0005
 * Time: 上午 12:42
 */

namespace app\index\controller;


use think\Db;

class Meet extends Base
{
    public function index()
    {
        $map['send_state'] = array(array('=',1),array('=',3), "or");

        $meet = Db::table("order") -> where($map) -> paginate("10");

        $page = $meet -> render();

        $this -> assign([
            "meet" => $meet,
            "page" => $page
        ]);

        return $this -> fetch();
    }
    public function meet()
    {
        $id = $_REQUEST["order_id"];

        $data = Db::table("order") -> where("id", "=", $id) -> select()[0];

        $data["send_state"] = "3";

        Db::table("order") -> where("id", "=", $id) -> update($data);

        return $this -> redirect("index");
    }
}
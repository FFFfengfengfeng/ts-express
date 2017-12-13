<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-02
 * Time: 9:54
 */

namespace app\index\controller;


use think\Db;

class Examine extends Base
{
    public function index()
    {
        $order = Db::table('order') -> paginate(10);

        $page  = $order -> render();

        $this -> assign([
            "order" => $order,
            "page"  => $page
        ]);

        return $this -> fetch();
    }
    public function examine() {

        $bank       = Db::table('bank')->select();
        $shop       = Db::table('shop')->select();
        $regulatory = Db::table('regulatory')->select();

        $data = Db::table("order") -> where("id", "=", $_REQUEST["order_id"]) -> select()[0];

        $this -> assign([
            "bank"       => $bank,
            "shop"       => $shop,
            "data"       => $data,
            "regulatory" => $regulatory
        ]);

        return $this -> fetch();
    }
    public function fail()
    {
        $id = $_REQUEST['id'];

        $data = Db::table('order') -> where('id', '=', $id) -> select()[0];

        $data["state"] = "2";

        $result = Db::table('order') -> where('id', '=', $id) -> update($data);

        $success = "0";
        $message = "修改失败";
        if ($result == 1) {
            $success = "1";
            $message = "修改成功";
        }

        return json(array("success" => $success, "message" => $message));
    }
    public function pass() {
        $id = $_REQUEST['id'];

        $data = Db::table('order') -> where('id', '=', $id) -> select()[0];

        $data["state"] = "1";

        $result = Db::table('order') -> where('id', '=', $id) -> update($data);

        $car = [
            "modal"           => $data["modal"],
            "car_code"        => $data["car_code"],
            "car_num"         => $data["car_num"],
            "car_price"       => $data["car_price"],
            "create_time"     => $data["create_time"],
            "shop_name"       => $data["shop_name"],
            "shop_id"         => $data["shop_id"],
            "regulatory_name" => $data["regulatory_name"],
            "regulatory_id"   => $data["regulatory_id"],
            "bank_id"         => $data["bank_id"],
            "bank_name"       => $data["bank_name"],
        ];

        $add_car = Db::table('car') -> insert($car);

        $success = "0";
        $message = "修改失败";
        if ($result == 1 and $add_car == 1) {
            $success = "1";
            $message = "修改成功";
        }

        return json(array("success" => $success, "message" => $message));
    }
}
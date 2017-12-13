<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-02
 * Time: 9:38
 */

namespace app\index\controller;


use think\Db;

class Order extends Base
{
    public function index()
    {
        $bank       = Db::table('bank')->select();
        $shop       = Db::table('shop')->select();
        $regulatory = Db::table('regulatory')->select();

        $this -> assign([
            "bank"       => $bank,
            "shop"       => $shop,
            "regulatory" => $regulatory
        ]);

        return $this -> fetch();
    }
    public function add() {
        $success = "0";
        $message = "添加失败";

        $shop_name = Db::table("shop") -> where("id", "=", $_REQUEST["shop_id"]) -> select()[0]["shop_name"];
        $bank_name = Db::table("bank") -> where("id", "=", $_REQUEST["bank_id"]) -> select()[0]["name"];
        $regulatory_name = Db::table("regulatory") -> where("id", "=", $_REQUEST["regulatory_id"]) -> select()[0]["name"];

        $data = $_REQUEST;

        $data["shop_name"] = $shop_name;
        $data["bank_name"] = $bank_name;
        $data["regulatory_name"] = $regulatory_name;

        $data = Db::table('order') -> insert($data);
        if ($data == 1) {
            $success = "1";
            $message = "添加成功";
        }
        $json = array("success" => $success, "message" => $message, "data" => $data);

        return json($json);
    }
}
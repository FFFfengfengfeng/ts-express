<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 13:42
 */

namespace app\index\controller;


use think\Db;

class Car extends Base
{
    public function index()
    {
//        $cate_id    = 0;
//        $type       = isset($_REQUEST["type"]) ? $_REQUEST["type"] : "";
//        $company_id = isset($_REQUEST["company_id"]) ? $_REQUEST["company_id"] : "";


        $company  = Db::table("company") -> select();
        $carousel = Db::table("goods") -> where("cate_id", "=", "0") -> limit(3) -> select();
        $car      = Db::table("goods") -> where("cate_id", "=", "0") -> paginate(5);
        $page     = $car ->render();

        foreach ($carousel as &$item) {
            $company_id = $item["company_id"];
            $item["company_name"] = $company[$company_id - 1]["name"];
        }

//        return json($carousel);
        $this -> assign([
            "carousel" => $carousel,
            "car"      => $car,
            "page"     => $page,
        ]);

        return $this -> fetch();
    }
    public function detail()
    {
        $goods_id = $_REQUEST["goods_id"];

        $goods         = Db::table("goods") -> where("id", "=", $goods_id) -> select()[0];
        $company_id    = $goods["company_id"];
        $company_intro = Db::table("company") -> where("id", "=", $company_id) -> select()[0]["intro"];
        $this -> assign([
            "goods"         => $goods,
            "company_intro" => $company_intro,
        ]);

        return $this -> fetch();
    }
    public function buy()
    {
        $goods_id = $_REQUEST["goods_id"];
        $goods    = Db::table("goods") -> where("id", "=", $goods_id) -> select()[0];
        $company  = Db::table("company") -> where("id", "=", $goods["company_id"]) -> select()[0];
        $cate     = Db::table("cate") -> where("id", "=", $goods["cate_id"]) -> select()[0];

        $success = "0";
        $message = "购买失败";

        $map = array(
            "order_num"    => "AE" . time(),
            "goods_name"   => $goods["name"],
            "cate_name"    => $cate["name"],
            "company_name" => $company["name"],
            "limit"        => $goods["limit"],
            "user_id"      => $_COOKIE["uid"]
        );

        $resultOrder = Db::table("order") -> insert($map);
        $resultUser  = Db::table("user") -> where("id", "=", $_COOKIE["uid"]) -> setDec("wealth", $goods["amount"]);

        if ($resultOrder == 1 && $resultUser == 1) {
            $success = "1";
            $message = "购买成功";
        }

        return json(array(
            "success" => $success,
            "message" => $message,
        ));
    }
}
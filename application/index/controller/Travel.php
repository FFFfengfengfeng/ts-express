<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 16:10
 */

namespace app\index\controller;


use think\Db;

class Travel extends Base
{
    /**
     * @param $type 0:境内 1:境外
     */
    public function index()
    {
        $cate_id = 2;
        $type = isset($_REQUEST["type"]) ? $_REQUEST["type"] : "";
        $company_id = isset($_REQUEST["company_id"]) ? $_REQUEST["company_id"] : "";

//        $accident = $this -> getGoods($cate_id, $company_id, $type);

        $map = [];

        if (!($cate_id == "")) {
            $map["cate_id"] = $cate_id;
        }
        if (!($company_id == "")) {
            $map["company_id"] = $company_id;
        }
        if (!($type == "")) {
            $map["type"] = $type;
        }

        $company  = Db::table("company")->select();
        $carousel = Db::table("goods")->where("cate_id", "=", "2")->limit(3)->select();
        $travel   = Db::table("goods")->where($map)->paginate(5);
        $page     = $travel->render();

        foreach ($carousel as &$item) {
            $company_id = $item["company_id"] - 1;
            $item["company_name"] = $company[$company_id]["name"];
        }

        $this->assign([
            "carousel" => $carousel,
            "travel" => $travel,
            "page" => $page,
        ]);

        return $this->fetch();
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

        $resultOrder = Db::table("orders") -> insert($map);
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
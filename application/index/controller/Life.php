<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 16:22
 */

namespace app\index\controller;

use think\Db;

class Life extends Base
{
    public function index()
    {
        $cate_id    = 5;
        $type       = isset($_REQUEST["type"]) ? $_REQUEST["type"] : "";
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

        $company  = Db::table("company") -> select();
        $carousel = Db::table("goods") -> where("cate_id", "=", "5") -> limit(3) -> select();
        $life   = Db::table("goods") -> where($map) -> paginate(5);
        $page     = $life -> render();

        foreach ($carousel as &$item) {
            $company_id = $item["company_id"] - 1;
            $item["company_name"] = $company[$company_id]["name"];
        }

        $this -> assign([
            "carousel" => $carousel,
            "life"     => $life,
            "page"     => $page,
        ]);

        return $this -> fetch();
    }
    public function detail()
    {
        $goods_id = $_REQUEST["goods_id"];



        return $this -> fetch();
    }
}
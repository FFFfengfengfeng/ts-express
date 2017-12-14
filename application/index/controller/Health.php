<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 16:19
 */

namespace app\index\controller;

use think\Db;

class Health extends Base
{
    public function index()
    {
        $cate_id    = 3;
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
        $carousel = Db::table("goods") -> where("cate_id", "=", "3") -> limit(3) -> select();
        $health   = Db::table("goods") -> where($map) -> paginate(5);
        $page     = $health -> render();

        foreach ($carousel as &$item) {
            $company_id = $item["company_id"] - 1;
            $item["company_name"] = $company[$company_id]["name"];
        }

        $this -> assign([
            "carousel" => $carousel,
            "health"   => $health,
            "page"     => $page,
        ]);

        return $this -> fetch();
    }
}
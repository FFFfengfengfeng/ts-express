<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 15:22
 */

namespace app\index\controller;


use think\Db;

class Accident extends Base
{
    /**
     * @param $type 0:交通 1:综合 2:运动
     */
    public function index()
    {
        $cate_id    = 1;
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
        $carousel = Db::table("goods") -> where("cate_id", "=", "1") -> limit(3) -> select();
        $accident = Db::table("goods") -> where($map) -> paginate(5);
        $page     = $accident -> render();

        foreach ($carousel as &$item) {
            $company_id = $item["company_id"] - 1;
            $item["company_name"] = $company[$company_id]["name"];
        }

        $this -> assign([
            "carousel" => $carousel,
            "accident" => $accident,
            "page"     => $page,
        ]);

        return $this -> fetch();
    }
}
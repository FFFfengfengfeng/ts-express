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
}
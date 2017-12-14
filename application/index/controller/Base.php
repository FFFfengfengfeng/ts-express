<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-11-24
 * Time: 9:44
 */

namespace app\index\controller;
use think\Controller;
use think\Cookie;
use think\Db;

class Base extends Controller
{
    public function _initialize()
    {
        $uid = Cookie::get("uid");

        if (!isset($uid)) {
            $this -> error('请登录', url('Login/index'), 3);
        }
        return json($_COOKIE);
    }
    /**
     * @param {$$cate_id}   分类id  0:车险 1:意外 2:旅行 3:健康 4:财产 5:人寿
     * @param {$company_id} 公司id
     * @param {$$type}      保险类型
     * */
    public function getGoods($cate_id = "", $company_id = "", $type = "")
    {
        $map = [
            "cate_id" => $cate_id,
            "company_id" => $company_id,
            "type" => $type,
        ];
        $ = Db::table("goods") -> where($map) -> paginate();
        $page   = $result -> render();

        $

        return $result;
    }
}
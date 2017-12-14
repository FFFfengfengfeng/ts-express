<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 15:22
 */

namespace app\index\controller;


class Accident extends Base
{
    /**
     * @param $type 0:交通 1:综合 2:运动
     */
    public function index()
    {
        $accident = $this -> getGoods(1);
        $this -> assign([
            "accident" => $accident
        ]);

        return $this -> fetch();
    }
}
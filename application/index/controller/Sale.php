<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-11-29
 * Time: 17:50
 */

namespace app\index\controller;


class Sale extends Base
{
    public function index()
    {
        return $this -> fetch();
    }
}
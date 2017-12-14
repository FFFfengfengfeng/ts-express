<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 13:42
 */

namespace app\index\controller;


class Car extends Base
{
    public function index()
    {
        return $this -> fetch();
    }
}
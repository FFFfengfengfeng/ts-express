<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 16:19
 */

namespace app\index\controller;


class Health extends Base
{
    public function index()
    {
        return $this -> fetch();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 16:22
 */

namespace app\index\controller;


class Life extends Base
{
    public function index()
    {
        return $this -> fetch();
    }
}
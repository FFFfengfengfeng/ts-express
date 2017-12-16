<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-12-14
 * Time: 16:21
 */

namespace app\index\controller;


class Assets extends Base
{
    public function index()
    {
        return $this -> fetch();
    }

}
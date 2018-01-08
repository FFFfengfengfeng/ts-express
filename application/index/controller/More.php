<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\1\7 0007
 * Time: 22:30
 */

namespace app\index\controller;


class More extends Base
{
    public function location()
    {
        return $this -> fetch();
    }
    public function notice()
    {
        return $this -> fetch();
    }
}
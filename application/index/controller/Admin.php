<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018\1\7 0007
 * Time: 16:25
 */

namespace app\index\controller;


use think\Db;

class Admin extends Base
{
    public function index()
    {
        $this->view->engine->layout(false);

        $goods = Db::table('goods') -> where('cate_id', 'neq', '0') -> paginate(5);
        $page = $goods -> render();

        $this -> assign([
            "goods" => $goods,
            "page"  => $page
        ]);

        return $this -> fetch();
    }

    public function claims()
    {
        $this->view->engine->layout(false);

        return $this -> fetch();
    }

    public function compete()
    {
        $this->view->engine->layout(false);
        return $this -> fetch();
    }

    public function staff()
    {
        $this->view->engine->layout(false);
        return $this -> fetch();
    }

    public function target()
    {
        $this->view->engine->layout(false);

        $order = Db::name('orders')
            -> alias('o')
            -> join('user u', 'u.id = o.user_id', 'left')
            -> field('o.*, u.name')
            -> paginate(5);

        $page = $order -> render();

        $this -> assign([
            "order" => $order,
            "page"  => $page
        ]);

        return $this -> fetch();
    }
}
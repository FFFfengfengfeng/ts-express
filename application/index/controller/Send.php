<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/12/4 0004
 * Time: 上午 1:12
 */

namespace app\index\controller;


use think\Db;

class Send extends Base
{
    public function index()
    {
        $send = Db::table("order") -> where("state", "=", "1") -> where("send_state", "<>", "4") -> paginate(10);

        $page = $send -> render();

        $this -> assign([
           "send" => $send,
           "page" => $page
        ]);

        return $this -> fetch();
    }

    public function send()
    {
        $data = Db::table('order') -> where("id", "=", $_REQUEST["order_id"]) -> select()[0];

        $shop = Db::table('shop') -> select();
        $bank = Db::table('bank') -> select();
        $regulatory = Db::table('regulatory') -> select();
        $this -> assign([
            "data"       => $data,
            "shop"       => $shop,
            "bank"       => $bank,
            "regulatory" => $regulatory
        ]);

        return $this -> fetch();
    }
    public function fail()
    {
        $id = $_REQUEST['id'];

        $data = Db::table('order') -> where('id', '=', $id) -> select()[0];

        $data["send_state"] = "2";

        $result = Db::table('order') -> where('id', '=', $id) -> update($data);

        $success = "0";
        $message = "修改失败";
        if ($result == 1) {
            $success = "1";
            $message = "修改成功";
        }

        return json(array("success" => $success, "message" => $message));
    }
    public function pass() {
        $id = $_REQUEST['id'];

        $data = Db::table('order') -> where('id', '=', $id) -> select()[0];

        $data["send_state"] = "1";

        $result = Db::table('order') -> where('id', '=', $id) -> update($data);

        $success = "0";
        $message = "修改失败";
        if ($result == 1) {
            $success = "1";
            $message = "修改成功";
        }

        return json(array("success" => $success, "message" => $message));
    }
}
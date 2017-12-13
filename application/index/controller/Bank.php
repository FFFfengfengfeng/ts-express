<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-11-29
 * Time: 17:44
 */

namespace app\index\controller;


use think\Db;

class Bank extends Base
{
    public function index()
    {
        $bank = Db::table('bank') -> paginate(10);

        $page = $bank -> render();

        $this -> assign([
            "bank" => $bank,
            "page" => $page
        ]);

        return $this -> fetch();
    }
    public function add() {
        if (empty($_REQUEST)) {

            $admin = Db::table('user') -> where('type', '=', '1') -> select();

            $this -> assign([
                "admin" => $admin
            ]);

            return $this -> fetch('add');
        } else {

            $success = "0";
            $message = "添加失败";

            $data = Db::table('bank') -> insert($_REQUEST);
            if ($data == 1) {
                $success = "1";
                $message = "添加成功";
            }
            $json = array("success" => $success, "message" => $message);

            return json($json);
        }
    }
    public function edit()
    {
        $id = $_REQUEST["id"];
        $data = Db::table('bank') -> where('id','=',$id) -> select()[0];

        $admin = Db::table('user') -> where('type', '=', '1') -> select();

        $this -> assign([
            "admin" => $admin,
            "data"  => $data
        ]);

        return $this -> fetch('edit');
    }
    public function delete()
    {
        $id = $_REQUEST["id"];

        $message = "删除失败";
        $success = "0";

        if (!empty($id)) {
            $result = Db::table('bank') -> delete($id);

            if ($result == 1) {
                $success = "1";
                $message = "删除成功";
            }
        } else {
            $message = "缺少id";
        }

        return json(array(
            "message" => $message,
            "success" => $success,
            "id"      => $id
        ));
    }
    public function update()
    {
        $success = "0";
        $message = "修改失败";

        $data = Db::table('bank') -> where("id", "=", $_REQUEST["id"]) -> update([
            'name'       => $_REQUEST["name"],
            'phone'      => $_REQUEST["phone"],
            'address'    => $_REQUEST["address"],
            'admin_name' => $_REQUEST["admin_name"],
            'admin_id'   => $_REQUEST["admin_id"],
        ]);
        if ($data == 1) {
            $success = "1";
            $message = "添加成功";
        }
        $json = array("success" => $success, "message" => $message);

        return json($json);
    }
}
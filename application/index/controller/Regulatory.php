<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-11-29
 * Time: 17:48
 */

namespace app\index\controller;


use think\Db;

class Regulatory extends Base
{
    public function index()
    {
        $regulatory = Db::table('regulatory') -> select();

        $this -> assign([
            "regulatory" => $regulatory
        ]);

        return $this -> fetch();
    }
    public function add()
    {
        if (empty($_REQUEST)) {

            return $this -> fetch('add');

        } else {

            $success = "0";
            $message = "添加失败";

            $data = Db::table('regulatory') -> insert($_REQUEST);
            if ($data == 1) {
                $success = "1";
                $message = "添加成功";
            }
            $json = array("success" => $success, "message" => $message);

            return json($json);
        }
    }
    public function delete()
    {
        $id = $_REQUEST["id"];

        $message = "删除失败";
        $success = "0";

        if (!empty($id)) {
            $result = Db::table('regulatory') -> delete($id);

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
    public function edit() {

        $id = $_REQUEST["id"];
        $data = Db::table('regulatory') -> where('id','=',$id) -> select()[0];

        $this -> assign([
            "data"  => $data
        ]);

        return $this -> fetch('edit');
    }
    public function update()
    {
        $success = "0";
        $message = "修改失败";

        $data = Db::table('regulatory') -> where("id", "=", $_REQUEST["id"]) -> update([
            'name'       => $_REQUEST["name"],
            'phone'      => $_REQUEST["phone"],
            'address'    => $_REQUEST["address"]
        ]);
        if ($data == 1) {
            $success = "1";
            $message = "添加成功";
        }
        $json = array("success" => $success, "message" => $message);

        return json($json);
    }
}
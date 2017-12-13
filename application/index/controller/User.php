<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/24 0024
 * Time: 上午 1:31
 */

namespace app\index\controller;

use think\Db;
use think\Paginator;

class User extends Base
{
    public function index()
    {
        $user = Db::table('user')->paginate(10);

        $page = $user->render();

        $this->assign([
            "user" => $user,
            "page" => $page
        ]);

        return $this -> fetch();
    }
    public function delete()
    {
        $id = $_GET['id'];
        $success = "0";
        $message = "删除失败";
        if (!empty($id)) {
            $data = Db::table('user') -> delete($id);

            if ($data == 1) {
                $success = "1";
                $message = "删除成功";
            }

        } else {
            $success = "0";
            $message = "缺少";
        }

        return json(array("success" => $success, "message" => $message, "id" => $id));
    }
    public function add()
    {

        if (empty($_REQUEST)) {
//            return json(array("data" => empty($_REQUEST)));
            return $this -> fetch('add');
        } else {

            $success = "0";
            $message = "添加失败";

            $data = Db::table('user') -> insert($_REQUEST);
            if ($data == 1) {
                $success = "1";
                $message = "添加成功";
            }
            $json = array("success" => $success, "message" => $message);

            return json($json);
        }

    }
    public function edit($id)
    {
        $data = Db::table('user') -> where('id','=',$id) -> select()[0];
        $this -> assign("data", $data);

        return $this -> fetch('edit');
    }
    public function update()
    {
        $success = "0";
        $message = "修改失败";

        $data = Db::table('user') -> where("id", "=", $_REQUEST["id"]) -> update([
            'login_name' => $_REQUEST["login_name"],
            'user_name'  => $_REQUEST["user_name"],
            'type'       => $_REQUEST["type"],
            'phone'      => $_REQUEST["phone"],
        ]);
        if ($data == 1) {
            $success = "1";
            $message = "添加成功";
        }
        $json = array("success" => $success, "message" => $message);

        return json($json);
    }
}
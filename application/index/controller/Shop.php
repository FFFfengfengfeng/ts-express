<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017-11-28
 * Time: 14:52
 */

namespace app\index\controller;


use think\Db;

class Shop extends Base
{
    public function index()
    {
        $shop = Db::table('shop') -> paginate(10);

        $page = $shop->render();

        $this->assign([
            "shop" => $shop,
            "page" => $page
        ]);

        return $this->fetch();
    }
    public function add()
    {
        if (empty($_REQUEST)) {
            return $this -> fetch('add');
        } else {

            $success = "0";
            $message = "添加失败";

            $data = Db::table('shop') -> insert($_REQUEST);
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
        $data = Db::table('shop') -> where('id','=',$id) -> select()[0];
        $this -> assign("data", $data);

        return $this -> fetch('edit');
    }
    public function update()
    {
        $success = "0";
        $message = "修改失败";

        $data = Db::table('shop') -> where("id", "=", $_REQUEST["id"]) -> update([
            'shop_name'    => $_REQUEST["shop_name"],
            'shop_phone'   => $_REQUEST["shop_phone"],
            'shop_address' => $_REQUEST["shop_address"],
            'charge'       => $_REQUEST["charge"],
        ]);
        if ($data == 1) {
            $success = "1";
            $message = "添加成功";
        }
        $json = array("success" => $success, "message" => $message);

        return json($json);
    }
    public function car_index()
    {

        $shop_id = $_REQUEST["shop_id"];
        $car = Db::table('car') -> where("shop_id", "=", $shop_id) -> paginate(10);

//        return json(array("data" => $car, "shop_id" => $shop_id));
        $page = $car -> render();

        $this -> assign([
            "car"  => $car,
            "page" => $page,
        ]);

        return $this -> fetch();
    }
    public function car_add()
    {
        if (empty($_REQUEST["modal"])) {
            return $this -> fetch('car_add');
        } else {

            $success = "0";
            $message = "添加失败";

            $data = Db::table('car') -> insert($_REQUEST);
            if ($data == 1) {
                $success = "1";
                $message = "添加成功";
            }
            $json = array("success" => $success, "message" => $message);

            return json($json);
        }
    }
    public function car_delete()
    {
        $id = $_REQUEST["id"];

        $message = "删除失败";
        $success = "0";

        if (!empty($id)) {
            $result = Db::table('car') -> delete($id);

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
    public function car_edit()
    {
        $shop_id = $_REQUEST["shop_id"];

        $result = Db::table('car') -> where("shop_id", "=", $shop_id) -> select()[0];

        $this -> assign("data", $result);

        return $this -> fetch();
    }
    public function car_update()
    {
        $success = "0";
        $message = "修改失败";

        $data = Db::table('car') -> where("id", "=", $_REQUEST["id"]) -> update([
            'modal'           => $_REQUEST["modal"],
            'car_code'        => $_REQUEST["car_code"],
            'car_num'         => $_REQUEST["car_num"],
            'car_price'       => $_REQUEST["car_price"],
            'create_time'     => $_REQUEST["create_time"],
            'shop_name'       => $_REQUEST["shop_name"],
            'shop_id'         => $_REQUEST["shop_id"],
            'regulatory_id'   => $_REQUEST["regulatory_id"],
            'bank_id'         => $_REQUEST["bank_id"],
        ]);
        if ($data == 1) {
            $success = "1";
            $message = "添加成功";
        }
        $json = array("success" => $success, "message" => $message);

        return json($json);
    }
}
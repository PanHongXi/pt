<?php
namespace app\index\model;

use think\Model;

class Product extends Model
{
    public function getProduct($id, $enable)
    {
        $list = db('product')->where(array('nid' => $id, 'enable' => $enable))->order('orders asc')->select();

        return $list;
    }

    //获取一条数据
    public function getProductOne($id)
    {
        $info = db('product')->where(array('nid' => $id, 'enable' => 1))->find();

        return $info;
    }

}
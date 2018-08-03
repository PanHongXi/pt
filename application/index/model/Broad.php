<?php
namespace app\index\model;

use think\Model;

class Broad extends Model
{
    //获取首页轮播
    public function getBroadList()
    {
        $broadList = $this->where(array('show_nav' => 1))->order('orders asc')->select();

        $list = array();
        foreach ($broadList as $k => $v) {
            $list['name'] = $v['name'];
            $list['thumb'] = 'http://'.$_SERVER['SERVER_NAME'].UPLOADS.'/'.$v['thumb'];
        }

        return $broadList;
    }
}
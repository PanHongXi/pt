<?php
namespace app\index\model;

use think\Model;

class Nav extends Model
{
    //获取产品导航
    public function getNavProduct($id ,$show_nav)
    {
        $navProduct = db('nav')->where(array('pid' => $id, 'show_nav' => $show_nav))->select();

        //获取对应的产品分类产品
        $producrList = array();
        foreach ($navProduct as $k => $v) {
            $producrNid['id'] = $v['id'];
            foreach ($producrNid as $k1 => $v1) {
                $producrList['list'][] = db('product')->where(array('nid' => $v1))->select();
                $producrList['navName'][$v['id']] = $v['nav_name'];
            }
        }

        return $producrList;
    }
}
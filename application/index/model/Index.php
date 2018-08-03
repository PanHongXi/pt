<?php
namespace app\index\model;

use think\Model;
class Index extends Model
{
    //获取首页导航栏
    public function getNavList()
    {
        $navList = db('nav')->where(array('position' => 1, 'show_nav' => 1, 'pid' => 0))->order('orders asc')->select();

        return $navList;
    }
}
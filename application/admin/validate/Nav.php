<?php
namespace app\admin\validate;

use think\Validate;

class Nav extends Validate
{
    protected $rule =   [
        'nav_name'  => 'require|max:35|unique:nav',
        'position'  => 'require',
        'orders'  => 'number',
    ];

    protected $message  =   [
        'nav_name.require' => '名称不能为空！',
        'nav_name.max'     => '名称最多不能超过35个字符',
        'nav_name.unique'     => '名称不能重复',
        'position.require' => '显示位置不能为空',
        'orders.number' => '排序只能是数字！',
    ];

}
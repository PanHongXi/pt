<?php
namespace app\admin\validate;

use think\Validate;

class Broad extends Validate
{
    protected $rule =   [
        'name'    => 'require|max:35|unique:broad',
        'orders'  => 'number',
    ];

    protected $message  =   [
        'name.require'  => '名称不能为空！',
        'name.max'      => '名称最多不能超过35个字符',
        'name.unique'   => '名称不能重复',
        'orders.number' => '排序只能是数字！',
    ];

}
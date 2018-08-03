<?php
namespace app\admin\validate;

use think\Validate;

class Product extends Validate
{
    protected $rule =   [
        'pname'  => 'require',
        'pdesc'  => 'require',
        'orders'  => 'number',
    ];

    protected $message  =   [
        'pname.require' => '名称不能为空！',
        'pdesc.require' => '详情不能为空！',
        'orders.number' => '排序只能是数字！',
    ];
}
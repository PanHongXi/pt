<?php
namespace app\admin\validate;

use think\Validate;

class System extends Validate
{
    protected $rule =   [
        'sname'  => 'require|max:35|unique:system',
        'orders'  => 'number',
    ];

    protected $message  =   [
        'sname.require' => '名称不能为空！',
        'sname.max'     => '名称最多不能超过35个字符',
        'sname.unique'     => '名称不能重复',
        'orders.number' => '排序只能是数字！',
    ];

}
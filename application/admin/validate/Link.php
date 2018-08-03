<?php
namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{
    protected $rule =   [
        'name'  => 'require|unique:link',
        'url'  => 'require',

    ];

    protected $message  =   [
        'name.require' => '名称不能为空！',
        'name.unique' => '该名称已存在！',
        'url.require' => '链接不能为空！',
    ];
}
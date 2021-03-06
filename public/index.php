<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
define('GOODS_THUMB',__DIR__.'/public/static/uploads/product');//
define('GOODS_PHOTOS',__DIR__.'/public/static/uploads/product/photos/');//
define( 'UPLOADS','/pt/public/static/uploads');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
$build = include APP_PATH.'build.php';
\think\Build::run($build);

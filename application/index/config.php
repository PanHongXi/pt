<?php
//配置文件
return [
// 视图输出字符串内容替换
    'view_replace_str'       => [
        '__INDEX__'=>'/pt/public/static/index',
        '__UED__'=>'/pt/public/static/ueditor',
        '__UPLOADS__'=>'/pt/public/static/uploads',
//        '__UPLOADS__'=>'http://'.$_SERVER['SERVER_NAME'].UPLOADS,
        '__LOGO__'=>'/pt/public/static/logo.jpg',
        '__URL__' => $_SERVER['SERVER_NAME'].'index/',
    ],
];
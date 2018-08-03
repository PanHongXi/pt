<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
function alert($msg='',$url='',$icon='',$time=3)
{
    $str = '<script type="text/javascript" src="' . config('admin_static') . 'https://code.jquery.com/jquery-3.3.1.min.js"></script><script type="text/javascript" src="' . config('admin_static') . '/pt/public/static/layer/layer.js"></script>';//加载jquery和layer
    $str .= '<script>$(function(){layer.msg("' . $msg . '",{icon:' . $icon . ',time:' . ($time * 500) . '});setTimeout(function(){self.location.href="' . $url . '"},1000)});</script>';//主要方法
    return $str;
}

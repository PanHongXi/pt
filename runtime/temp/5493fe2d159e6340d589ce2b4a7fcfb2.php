<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"E:\wamp64\www\pt\public/../application/admin\view\nav\navEdit.html";i:1533021073;s:56:"E:\wamp64\www\pt\application\admin\view\common\head.html";i:1533108114;s:56:"E:\wamp64\www\pt\application\admin\view\common\left.html";i:1533104370;}*/ ?>
<!DOCTYPE html>
<html><head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="">
    <meta name="copyright" content="">
    <title>添加导航--云琰</title>
    <link href="/favicon.ico" rel="icon">
    <link href="/pt/public/static/admin/css/bootstrap.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/iconfont.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/font-awesome.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/bootstrap-select.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/awesome-bootstrap-checkbox.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_2.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_3.css" rel="stylesheet">
    <script src="/pt/public/static/admin/js/jquery_1.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap_1.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap-growl_1.js"></script>
    <script src="/pt/public/static/admin/js/bootbox.js"></script>
    <script src="/pt/public/static/admin/js/jquery.nicescroll.js"></script>
    <script src="/pt/public/static/admin/js/jquery.cookie_1.js"></script>
    <script src="/pt/public/static/admin/js/underscore_1.js"></script>
    <script src="/pt/public/static/admin/js/url_1.js"></script>
    <script src="/pt/public/static/admin/js/velocity.js"></script>
    <script src="/pt/public/static/admin/js/velocity.ui.js"></script>
    <script src="/pt/public/static/admin/js/base_1.js"></script>
    <script src="/pt/public/static/admin/js/base_1.js"></script>
</head>
<body class="admin">
<header class="main-header">
    <div class="title hidden-xs">
        <a href="/admin/index">
            <img src="/pt/public/static/logo.jpg" style="width: 150px;height: 50px" alt="SHOP++商城">
        </a>
    </div>
    <button class="main-sidebar-toggle" type="button" data-toggle="mainSidebarCollapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <ul class="nav pull-right">
        <li>
            <a href="/admin/profile/edit">账号设置</a>
        </li>
        <li class="dropdown">
            <a class="dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                <i class="iconfont icon-sort"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-right">
                <li>
                    <a href="http://www.shopxx.net" target="_blank">官方网站</a>
                </li>
                <li>
                    <a href="http://www.shopxx.net/about.html" target="_blank">关于我们</a>
                </li>
            </ul>
        </li>
        <li>
            <a id="mainHeaderLogout" class="logout" href="/admin/logout">
                <i class="iconfont icon-exit"></i>
                注销
            </a>
        </li>
    </ul>
</header>
<aside id="mainSidebar" class="main-sidebar">
    <div class="search">
        <!--<form action="/admin/product/list" method="get">-->
            <!--<input name="searchProperty" type="hidden" value="name">-->
            <!--<div class="input-group">-->
                <!--<input name="searchValue" class="form-control" type="text" placeholder="商品搜索" x-webkit-speech="x-webkit-speech" x-webkit-grammar="builtin:search">-->
                <!--<div class="input-group-btn">-->
                    <!--<button class="btn btn-default" type="submit">-->
                        <!--<i class="iconfont icon-search"></i>-->
                    <!--</button>-->
                <!--</div>-->
            <!--</div>-->
        <!--</form>-->
    </div>
    <div id="mainSidebarPanelGroup" class="panel-group">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#contentGroupPanelCollapse" data-toggle="collapse" data-parent="#mainSidebarPanelGroup">
                        <i class="iconfont icon-text"></i>
                        <span>内容管理</span>
                        <i class="iconfont icon-unfold"></i>
                    </a>
                </h4>
            </div>
            <div id="contentGroupPanelCollapse" class="panel-collapse collapse in">
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/Nav/navList'); ?>">
                                <i class="iconfont icon-weixuanzhong"></i>
                                导航管理
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/Product/plist'); ?>">
                                <i class="iconfont icon-weixuanzhong"></i>
                                产品列表
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/System/sList'); ?>">
                                <i class="iconfont icon-weixuanzhong"></i>
                                系统设置
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo url('admin/Broad/bList'); ?>">
                                <i class="iconfont icon-weixuanzhong"></i>
                                轮播设置
                            </a>
                        </li>

                        <li class="list-group-item">
                            <a href="<?php echo url('admin/Link/lList'); ?>">
                                <i class="iconfont icon-weixuanzhong"></i>
                                友情链接
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</aside>
<main>
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li>
                <a href="<?php echo url('admin/index/index'); ?>">
                    <i class="iconfont icon-homefill"></i>
                    首页
                </a>
            </li>
            <li class="active">添加导航</li>
        </ol>
        <form class="form-horizontal">
            <div class="panel panel-default">
                <div class="panel-heading">添加导航</div>
                <input value="<?php echo $navList['id']; ?>" name="id" type="hidden"/>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label item-required" for="name">顶级分类:</label>
                        <div class="col-xs-9 col-sm-4">
                            <select name="pid" class=" form-control" data-live-search="true" data-size="10" tabindex="-98">
                                <option value="0">顶级分类</option>
                                <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo $nav['id']; ?>" title="<?php echo $nav['nav_name']; ?>" <?php if($nav['id'] == $navList['pid']): ?>selected="selected"<?php endif; ?>><?php echo str_repeat('&nbsp;',$nav['level'] * 2); ?><?php echo $nav['nav_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label item-required" for="name">名称:</label>
                        <div class="col-xs-9 col-sm-4">
                            <input id="name" name="nav_name" value="<?php echo $navList['nav_name']; ?>" class="form-control" maxlength="200" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label item-required" for="name">路径:</label>
                        <div class="col-xs-9 col-sm-4">
                            <input id="url" name="url" value="<?php echo $navList['url']; ?>" class="form-control" maxlength="200" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label item-required" for="name">是否隐藏:</label>
                        <div class="col-xs-9 col-sm-4">
                            <select name="show_nav" class=" form-control" data-live-search="true" data-size="10" tabindex="-98">
                                <option value="1" <?php if($navList['show_nav'] == 1): ?> selected="selected" <?php endif; ?>>显示</option>
                                <option value="0" <?php if($navList['show_nav'] == 0): ?> selected="selected" <?php endif; ?>>隐藏</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label item-required" for="name">是否可以添加子栏目:</label>
                        <div class="col-xs-9 col-sm-4">
                            <select name="allow_son" class=" form-control" data-live-search="true" data-size="10" tabindex="-98">
                                <option value="1" <?php if($navList['allow_son'] == 1): ?> selected="selected" <?php endif; ?>>是</option>
                                <option value="0" <?php if($navList['allow_son'] == 0): ?> selected="selected" <?php endif; ?>>否</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">显示位置:</label>
                        <div class="col-xs-9 col-sm-4">
                            <div class="checkbox checkbox-inline">
                                <input id="isPublication" name="position[]" <?php if(strstr($navList['position'],'1')){echo 'checked="checked"';}?>  type="checkbox" value="1">
                                <label for="isPublication">头部</label>
                            </div>
                            <div class="checkbox checkbox-inline">
                                <input id="isTop" name="position[]" <?php if(strstr($navList['position'],'2')){echo 'checked="checked"';}?> type="checkbox" value="2">
                                <label for="isTop">底部</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label" for="order">排序:</label>
                        <div class="col-xs-9 col-sm-4">
                            <input id="order" name="orders" class="form-control" value="<?php echo $navList['orders']; ?>" maxlength="9" type="text">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">内容:</label>
                        <div class="col-xs-9 col-sm-10">
                            <textarea class="form-control" style="width: 540px;height: 80px"  id="content" name="content" ><?php echo $navList['content']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-9 col-sm-10 col-xs-offset-3 col-sm-offset-2">
                            <!--<button class="btn btn-primary" id="tijiao" type="submit">确 定</button>-->
                            <span class="btn btn-primary" id="tijiao" >确 定</span>
                            <a href="<?php echo $urlList; ?>"><button class="btn btn-default" type="button" data-action="back">返 回</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>

<div id="ascrail2000" class="nicescroll-rails nicescroll-rails-vr" style="width: 4px; z-index: 100; position: fixed; cursor: default; top: 40px; left: 226px; height: 876px; display: block; opacity: 0;">
    <div style="position: relative; float: right; width: 4px; background-color: rgb(255, 255, 255); border: 0px none; background-clip: padding-box; border-radius: 5px; height: 807px; top: 0px;" class="nicescroll-cursors"></div>
</div>
<div id="ascrail2000-hr" class="nicescroll-rails nicescroll-rails-hr" style="height: 4px; z-index: 100; position: fixed; cursor: default; display: none; top: 912px; left: 0px; width: 226px; opacity: 0;">
    <div style="position: absolute; top: 0px; height: 4px; background-color: rgb(255, 255, 255); border: 0px none; background-clip: padding-box; border-radius: 5px; width: 230px;" class="nicescroll-cursors"></div></div>
</body>
</html>
<script src="/pt/public/static/admin/js/jquery.js"></script>
<script src="/pt/public/static/admin/js/tip.js"></script>
<script type="text/javascript">
    $('#tijiao').click(function () {
        var forData = $('form').serialize();
        $.ajax({
            type:"POST",
            url:"<?php echo url('admin/Nav/navEdit'); ?>",
            data:forData,
            dataType:"JSON",
            success:function(data){
                var t = JSON.parse(data);

                if (t.status == 1) {
                    tip(t.msg, t.status, t.url);
                } else {
                    tip(t.msg, t.status, '');
                }
            },
            error:function () {
                tip(data.msg, 2);
            }
        });
    });
</script>
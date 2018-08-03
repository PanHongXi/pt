<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:68:"E:\wamp64\www\pt\public/../application/admin\view\product\pEdit.html";i:1533004176;s:56:"E:\wamp64\www\pt\application\admin\view\common\head.html";i:1532568131;s:56:"E:\wamp64\www\pt\application\admin\view\common\left.html";i:1533007186;}*/ ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="SHOP++ Team">
    <meta name="copyright" content="SHOP++">
    <title>添加产品 - Powered By SHOP++</title>
    <link href="/favicon.ico" rel="icon">
    <link href="/pt/public/static/admin/css/bootstrap.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/iconfont.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/font-awesome.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/bootstrap-select.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/bootstrap-fileinput.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/summernote.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_3.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/resources/common/js/html5shiv.js"></script>
    <script src="/resources/common/js/respond.js"></script>
    <![endif]-->
    <script src="/pt/public/static/admin/js/jquery.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap-growl.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap-select.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap-fileinput.js"></script>
    <script src="/pt/public/static/admin/js/summernote.js"></script>
    <script src="/pt/public/static/admin/js/jquery.nicescroll.js"></script>
    <script src="/pt/public/static/admin/js/jquery.validate.js"></script>
    <script src="/pt/public/static/admin/js/jquery.validate.additional.js"></script>
    <script src="/pt/public/static/admin/js/jquery.form.js"></script>
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
    <script src="/pt/public/static/admin/js/base.js"></script>

    <script>
        $().ready(function() {

            var $brandForm = $("#brandForm");
            var $type = $("#type");
            var $logo = $("#logo");

            // 类型
            $type.change(function() {
                var isText = $(this).val() == "TEXT";

                $logo.prop("disabled", isText).closest(".form-group").velocity(isText ? "slideUp" : "slideDown");
            });

            // 表单验证
            $brandForm.validate({
                rules: {
                    name: "required",
                    logo: "required",
                    url: "url2",
                    order: "digits"
                }
            });

        });
    </script>
</head>
<body class="admin">
<header class="main-header">
    <div class="title hidden-xs">
        <a href="/admin/index">
            <img src="/pt/public/static/admin/img/main_header_logo.png" alt="SHOP++商城">
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
<script>
    $().ready(function() {

        var $document = $(document);
        var $mainHeaderLogout = $("#mainHeaderLogout");

        // 用户注销
        $mainHeaderLogout.click(function() {
            $document.trigger("loggedOut.shopxx.user", $.getCurrentUser());
        });

    });
</script>
<script>
    $().ready(function() {

        var $window = $(window);
        var $body = $("body");
        var $mainSidebarCollapseToggle = $("[data-toggle='mainSidebarCollapse']");
        var $mainSidebar = $("#mainSidebar");
        var $searchForm = $("#mainSidebar .search form");
        var $searchValue = $("#mainSidebar .search input[name='searchValue']");
        var $panelCollapse = $("#mainSidebar .panel-collapse");

        // 主侧边栏折叠
        $mainSidebarCollapseToggle.click(function() {
            var niceScroll = $mainSidebar.getNiceScroll();
            var interval = setInterval(function() {
                niceScroll.resize();
            }, 10);

            if ($window.width() > 767) {
                $body.removeClass("main-sidebar-expanded").toggleClass("main-sidebar-mini");
            } else {
                $body.removeClass("main-sidebar-mini").toggleClass("main-sidebar-expanded");
            }

            $body.one("bsTransitionEnd", function() {
                niceScroll.resize();
                window.clearInterval(interval);
            }).emulateTransitionEnd(500);
        });

        // 主侧边栏滚动条
        $mainSidebar.niceScroll({
            cursorwidth: "4px",
            cursorcolor: "#ffffff",
            cursorborder: "0px",
            cursoropacitymax: 0.4
        });

        // 搜索
        $searchForm.submit(function() {
            if ($.trim($searchValue.val()) == "") {
                return false;
            }
        });

        // 面板折叠
        $panelCollapse.on("shown.bs.collapse hidden.bs.collapse", function() {
            $mainSidebar.getNiceScroll().resize();
        });

    });
</script>
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
                            <a href="/admin/cache/clear">
                                <i class="iconfont icon-weixuanzhong"></i>
                                缓存管理
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a href="#systemGroupPanelCollapse" data-toggle="collapse" data-parent="#mainSidebarPanelGroup">
                        <i class="iconfont icon-settings"></i>
                        <span>系统设置</span>
                        <i class="iconfont icon-unfold"></i>
                    </a>
                </h4>
            </div>
            <div id="systemGroupPanelCollapse" class="panel-collapse collapse">
                <div class="panel-body">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="/admin/setting/edit">
                                <i class="iconfont icon-weixuanzhong"></i>
                                系统设置
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/area/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                地区管理
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/payment_method/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                支付方式
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/shipping_method/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                配送方式
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/delivery_corp/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                物流公司
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/payment_plugin/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                支付插件
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/storage_plugin/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                存储插件
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/login_plugin/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                登录插件
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/promotion_plugin/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                促销插件
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/admin/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                管理员
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/role/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                角色管理
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="/admin/audit_log/list">
                                <i class="iconfont icon-weixuanzhong"></i>
                                审计日志
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
                <a href="/admin/index">
                    <i class="iconfont icon-homefill"></i>
                    首页
                </a>
            </li>
            <li class="active">添加产品</li>
        </ol>
        <form class="form-horizontal" enctype="multipart/form-data" id="tf" action="" method="post">
            <!--<form class="form-horizontal" id="uploadForm" enctype="multipart/form-data">-->
            <input type="hidden" name="id" value="<?php echo $info['id']; ?>"/>
            <div class="panel panel-default">
                <div class="panel-heading">添加产品</div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label item-required" for="name">名称:</label>
                        <div class="col-xs-9 col-sm-4">
                            <input id="name" name="pname" value="<?php echo $info['pname']; ?>" class="form-control" type="text" maxlength="200">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">所属分类:</label>
                        <div class="col-xs-9 col-sm-4">
                            <select name="nid" class=" form-control" data-live-search="true" data-size="10" tabindex="-98">
                                <option value="0">顶级分类</option>
                                <?php if(is_array($navList) || $navList instanceof \think\Collection || $navList instanceof \think\Paginator): $i = 0; $__LIST__ = $navList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$nav): $mod = ($i % 2 );++$i;?>
                                    <option value="<?php echo $nav['id']; ?>" title="<?php echo $nav['nav_name']; ?>" <?php if($info['nid'] == $nav['id']): ?>selected="selected" <?php endif; ?>><?php echo str_repeat('&nbsp;',$nav['level'] * 2); ?><?php echo $nav['nav_name']; ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">图片:</label>
                        <div class="col-xs-9 col-sm-4">
                            <!--<a href="#" onclick="addphoto(this)">[+]</a>-->
                            <input class="" name="thumb"  type="file">
                            <?php if($info['thumb'] == ''): else: ?>
                            <img style="width: 30px;height: 30px;margin-top: 10px" src="/pt/public/static/uploads/<?php echo $info['thumb']; ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label" for="order">排序:</label>
                        <div class="col-xs-9 col-sm-4">
                            <input id="order" name="orders" value="<?php echo $info['orders']; ?>" class="form-control" type="text" maxlength="9">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">显示:</label>
                        <div class="col-xs-9 col-sm-4">
                            <div class="checkbox checkbox-inline">
                                <input id="isPublication" name="enable" <?php if($info['enable'] == 1): ?>checked="checked" <?php endif; ?> type="checkbox" value="1">
                                <label for="isPublication">是否显示</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">推荐:</label>
                        <div class="col-xs-9 col-sm-4">
                            <div class="checkbox checkbox-inline">
                                <input id="recom" name="recom" checked="checked" type="checkbox" <?php if($info['recom'] == 1): ?>checked="checked" <?php endif; ?> value="1">
                                <label for="recom">是否推荐</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-xs-3 col-sm-2 control-label">介绍:</label>
                        <div class="col-xs-9 col-sm-10">
                            <textarea  id="content" name="pdesc" ><?php echo $info['pdesc']; ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-9 col-sm-10 col-xs-offset-3 col-sm-offset-2">
                            <!--<input type="submit" id="tijiao" class="btn btn-primary" value="确 定"/>-->
                            <span class="btn btn-primary" id="tijiao" onclick="prot();" >确 定</span>
                            <a href="<?php echo $urlList; ?>"> <button class="btn btn-default" type="button" data-action="back">返 回</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
</body>
</html>
<script src="/pt/public/static/admin/js/tip.js"></script>
<script src="/pt/public/static/ueditor/ueditor.config.js"></script>
<script src="/pt/public/static/ueditor/ueditor.all.min.js"></script>
<script src="/pt/public/static/ueditor/lang/zh-cn/zh-cn.js"></script>
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    UE.getEditor('content',{initialFrameWidth:700,initialFrameHeight:400});
    //    toolbars: [['bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript',
    //        'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'forecolor', 'backcolor', 'insertorderedlist', 'insertunorderedlist', 'selectall', 'cleardoc','fullscreen','source','undo','redo']]

</script>
<script>
    function prot(){
        var form = new FormData(document.getElementById("tf"));
        $.ajax({
            url:"<?php echo url('admin/Product/pEdit'); ?>",
            type:"POST",
            data:form,
            processData:false,
            contentType:false,
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
    }

    //添加商品相册
    function addphoto(e) {
        var div = $(e).parent().parent();
        if ($(e).html() == '[+]') {
            var newdiv = div.clone();
            newdiv.find('a').html('[-]');
            div.after(newdiv);
        }else {
            div.remove();
        }
    }
</script>

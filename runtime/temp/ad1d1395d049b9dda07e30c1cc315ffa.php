<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"E:\wamp64\www\pt\public/../application/admin\view\link\lList.html";i:1533105533;s:56:"E:\wamp64\www\pt\application\admin\view\common\head.html";i:1532568131;s:56:"E:\wamp64\www\pt\application\admin\view\common\left.html";i:1533104370;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="SHOP++ Team">
    <meta name="copyright" content="SHOP++">
    <title>导航列表 - 云琰</title>
    <link href="/favicon.ico" rel="icon">
    <link href="/pt/public/static/admin/css/bootstrap_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/iconfont_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/font-awesome_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/awesome-bootstrap-checkbox_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_2.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_3.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/pt/public/static/admin/js/html5shiv_1.js"></script>
    <script src="/pt/public/static/admin/js/respond_1.js"></script>
    <![endif]-->
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
            <li class="active">导航列表</li>
        </ol>
        <form action="" method="get">
            <input name="pageSize" type="hidden" value="20">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12 col-sm-9">
                            <div class="btn-group">
                                <a class="btn btn-default" href="<?php echo url('admin/Link/lAdd'); ?>" data-redirect-url="/admin/navigation/list">
                                    <i class="iconfont icon-add"></i>
                                    添加
                                </a>

                                <button class="btn btn-default" type="button" data-action="delete" disabled>
                                    <i class="iconfont icon-close"></i>
                                    删除
                                </button>

                                <button class="btn btn-default" type="button" data-action="refresh">
                                    <i class="iconfont icon-refresh"></i>
                                    刷新
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>
                                    <div class="checkbox">
                                        <input type="checkbox" data-toggle="checkAll">
                                        <label></label>
                                    </div>
                                </th>
                                <th>
                                    <a href="javascript:;" data-order-property="name">
                                        名称
                                        <i class="iconfont icon-biaotou-kepaixu"></i>
                                    </a>
                                </th>
                                <th>
                                    <a href="javascript:;" data-order-property="order">
                                        地址
                                        <i class="iconfont icon-biaotou-kepaixu"></i>
                                    </a>
                                </th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <input name="ids" type="checkbox" value="<?php echo $list['id']; ?>">
                                            <label></label>
                                        </div>
                                    </td>
                                    <td><?php echo $list['name']; ?></td>
                                    <td><a href="<?php echo $list['url']; ?>" target="_blank"><?php echo $list['url']; ?></a></td>
                                    <td>
                                        <a class="btn btn-default btn-xs btn-icon" href="<?php echo url('Link/lEdit',array('id' => $list['id'])); ?>" title="编辑" data-toggle="tooltip" data-redirect-url>
                                            <i class="iconfont icon-write"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="panel-footer text-right">
                    <ul class="pagination">
                        <?php echo $page; ?>
                    </ul>
                </div>
            </div>
        </form>
    </div>
</main>
</body>
</html>

<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"E:\wamp64\www\pt\public/../application/admin\view\index\index.html";i:1532570575;s:56:"E:\wamp64\www\pt\application\admin\view\common\head.html";i:1532568131;s:56:"E:\wamp64\www\pt\application\admin\view\common\left.html";i:1533104370;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="author" content="SHOP++ Team">
    <meta name="copyright" content="SHOP++">
    <title>管理中心--琰</title>
    <link href="/favicon.ico" rel="icon">
    <link href="/pt/public/static/admin/css/bootstrap_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/iconfont_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/font-awesome_1.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_2.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/base_3.css" rel="stylesheet">
    <link href="/pt/public/static/admin/css/index.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="/pt/public/static/admin/js/html5shiv_1.js"></script>
    <script src="/pt/public/static/admin/js/respond_1.js"></script>
    <![endif]-->
    <script src="/pt/public/static/admin/js/jquery_1.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap_1.js"></script>
    <script src="/pt/public/static/admin/js/bootstrap-growl_1.js"></script>
    <script src="/pt/public/static/admin/js/bootbox.js"></script>
    <script src="/pt/public/static/admin/js/moment.js"></script>
    <script src="/pt/public/static/admin/js/jquery.nicescroll.js"></script>
    <script src="/pt/public/static/admin/js/jquery.validate_1.js"></script>
    <script src="/pt/public/static/admin/js/jquery.validate.additional_1.js"></script>
    <script src="/pt/public/static/admin/js/jquery.form_1.js"></script>
    <script src="/pt/public/static/admin/js/jquery.cookie_1.js"></script>
    <script src="/pt/public/static/admin/js/underscore_1.js"></script>
    <script src="/pt/public/static/admin/js/url_1.js"></script>
    <script src="/pt/public/static/admin/js/jquery.animatenumber.js"></script>
    <script src="/pt/public/static/admin/js/g2.js"></script>
    <script src="/pt/public/static/admin/js/base_1.js"></script>
    <script src="/pt/public/static/admin/js/base_1.js"></script>
    <script>
        $().ready(function() {

            var $todayAddedMemberCount = $("#todayAddedMemberCount");
            var $todayAddedBusinessCount = $("#todayAddedBusinessCount");
            var $todayAddedPlatformCommission = $("#todayAddedPlatformCommission");
            var $todayAddedDistributionCommission = $("#todayAddedDistributionCommission");
            var $todayAddedMember = $("#todayAddedMember");
            var $yesterdayAddedCount = $("#yesterdayAddedMemberCount");
            var $currentMonthAddedCount = $("#currentMonthAddedMemberCount");
            var $todayAddedBusiness = $("#todayAddedBusiness");
            var $yesterdayAddedBusinessCount = $("#yesterdayAddedBusinessCount");
            var $currentMonthAddedBusinessCount = $("#currentMonthAddedBusinessCount");

            bootbox.alert({
                title: "提示信息",
                message: "为了确保站点的完整性，您的修改性操作将受到限制!"
            });

            // 今日新增会员数
            $todayAddedMemberCount.animateNumber({
                number: 0,
                numberStep: function(now, tween) {
                    $(tween.elem).add($todayAddedMember).text(Math.floor(now));
                }
            }, 1000);

            // 今日新增商家数
            $todayAddedBusinessCount.animateNumber({
                number: 1,
                numberStep: function(now, tween) {
                    $(tween.elem).add($todayAddedBusiness).text(Math.floor(now));
                }
            }, 1000);

            // 今日新增平台佣金
            $todayAddedPlatformCommission.animateNumber({
                number: 0,
                numberStep: function(now, tween) {
                    $(tween.elem).text($.currency(now, true, true));
                }
            }, 1000);

            // 今日新增分销佣金
            $todayAddedDistributionCommission.animateNumber({
                number: 0,
                numberStep: function(now, tween) {
                    $(tween.elem).text($.currency(now, true, true));
                }
            }, 1000);

            // 昨日新增会员数
            $yesterdayAddedCount.animateNumber({
                number: 0
            }, 1000);

            // 本月新增会员数
            $currentMonthAddedCount.animateNumber({
                number: 12
            }, 1000);

            // 昨日新增商家数
            $yesterdayAddedBusinessCount.animateNumber({
                number: 0
            }, 1000);

            // 本月新增商家数
            $currentMonthAddedBusinessCount.animateNumber({
                number: 12
            }, 1000);

            // 订单统计图表
            var orderStatisticChart = new G2.Chart({
                id: "orderStatisticChart",
                height: 200,
                forceFit: true,
                plotCfg: {
                    margin: [20, 20, 30, 80]
                }
            });

            orderStatisticChart.source([], {
                date: {
                    type: "time",
                    tickCount: 10,
                    formatter: function(value) {
                        return moment(value).format("YYYY-MM-DD");
                    }
                },
                value: {
                    alias: "订单创建数"
                }
            });
            orderStatisticChart.axis("date", {
                title: null,
                formatter: function(value) {
                    return moment(value).format("MM-DD");
                }
            });
            orderStatisticChart.axis("value", {
                title: null
            });
            orderStatisticChart.line().position("date*value").color("#66baff");
            orderStatisticChart.render();

            $.ajax({
                url: "/admin/order_statistic/data",
                type: "get",
                data: {
                    type: "CREATE_ORDER_COUNT"
                },
                dataType: "json",
                success: function(data) {
                    orderStatisticChart.changeData(data);
                }
            });

            // 资金统计图表
            var amountStatisticChart = new G2.Chart({
                id: "amountStatisticChart",
                height: 200,
                forceFit: true,
                plotCfg: {
                    margin: [20, 20, 30, 80]
                }
            });

            amountStatisticChart.source([], {
                date: {
                    type: "time",
                    tickCount: 10,
                    formatter: function(value) {
                        return moment(value).format("YYYY-MM-DD");
                    }
                },
                value: {
                    alias: "平台佣金"
                }
            });
            amountStatisticChart.axis("date", {
                title: null,
                formatter: function(value) {
                    return moment(value).format("MM-DD");
                }
            });
            amountStatisticChart.axis("value", {
                title: null
            });
            amountStatisticChart.line().position("date*value").color("#66baff");
            amountStatisticChart.render();

            $.ajax({
                url: "/admin/fund_statistic/data",
                type: "get",
                data: {
                    type: "PLATFORM_COMMISSION"
                },
                dataType: "json",
                success: function(data) {
                    amountStatisticChart.changeData(data);
                }
            });

        });
    </script>
</head>
<body class="admin index">
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
            <li class="active">管理中心</li>
        </ol>
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <div class="section-info bg-blue-light">
                    <i class="iconfont icon-people"></i>
                    <h1 id="todayAddedMemberCount"></h1>
                    <p>今日新增会员</p>
                    <a href="/admin/member/list">
                        查看所有会员
                        <i class="iconfont icon-pullright"></i>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="section-info bg-red-light">
                    <i class="iconfont icon-crown"></i>
                    <h1 id="todayAddedBusinessCount"></h1>
                    <p>今日新增商家</p>
                    <a href="/admin/business/list">
                        查看所有商家
                        <i class="iconfont icon-pullright"></i>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="section-info bg-green-light">
                    <i class="iconfont icon-cart"></i>
                    <h1 id="todayAddedPlatformCommission"></h1>
                    <p>今日新增平台佣金</p>
                    <a href="/admin/order/list">
                        查看所有订单
                        <i class="iconfont icon-pullright"></i>
                    </a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
                <div class="section-info bg-purple-light">
                    <i class="iconfont icon-global"></i>
                    <h1 id="todayAddedDistributionCommission"></h1>
                    <p>今日新增分销佣金</p>
                    <a href="/admin/distributor/list">
                        查看所有分销员
                        <i class="iconfont icon-pullright"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="review-info panel panel-default">
                    <div class="panel-heading">
                        <h5>审核信息</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <a href="/admin/store/list?status=PENDING">
                                    <div class="media">
                                        <div class="media-left hidden-xs hidden-sm hidden-md">
                                            <i class="bg-blue-light iconfont icon-shop"></i>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h2 class="text-blue-light media-heading">
                                                0
                                                <small>个</small>
                                            </h2>
                                            <p>店铺审核</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="/admin/business_cash/list?status=PENDING">
                                    <div class="media">
                                        <div class="media-left hidden-xs hidden-sm hidden-md">
                                            <i class="bg-orange-light iconfont icon-moneybag"></i>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h2 class="text-orange-light media-heading">
                                                0
                                                <small>个</small>
                                            </h2>
                                            <p>商家提现审核</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="/admin/category_application/list?status=PENDING">
                                    <div class="media">
                                        <div class="media-left hidden-xs hidden-sm hidden-md">
                                            <i class="bg-yellow-light iconfont icon-cascades"></i>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h2 class="text-yellow-light media-heading">
                                                0
                                                <small>个</small>
                                            </h2>
                                            <p>经营分类审核</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-xs-3">
                                <a href="/admin/distribution_cash/list?status=PENDING">
                                    <div class="media">
                                        <div class="media-left hidden-xs hidden-sm hidden-md">
                                            <i class="bg-purple-light iconfont icon-sponsor"></i>
                                        </div>
                                        <div class="media-body media-middle">
                                            <h2 class="text-purple-light media-heading">
                                                0
                                                <small>个</small>
                                            </h2>
                                            <p>分销提现审核</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="sales-chart panel panel-default">
                    <div class="panel-heading">
                        <h5>销量排行榜</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <h3>周销量</h3>
                                <div class="pull-left">
                                    <h2 class="text-orange-light">1</h2>
                                    <a href="/product/detail/1" target="_blank">KOOLIFE 畅玩5C钢化膜</a>
                                    <span>0</span>
                                </div>
                                <div class="pull-left">
                                    <h2 class="text-yellow-light">2</h2>
                                    <a href="/product/detail/2" target="_blank">KOLA 红米Note4全屏钢化膜</a>
                                    <span>0</span>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <h3>月销量</h3>
                                <div class="pull-left">
                                    <h2 class="text-orange-light">1</h2>
                                    <a href="/product/detail/1" target="_blank">KOOLIFE 畅玩5C钢化膜</a>
                                    <span>0</span>
                                </div>
                                <div class="pull-left">
                                    <h2 class="text-yellow-light">2</h2>
                                    <a href="/product/detail/2" target="_blank">KOLA 红米Note4全屏钢化膜</a>
                                    <span>0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="member-info panel panel-default">
                    <div class="panel-heading">
                        <h5>会员信息</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <h2 class="text-blue-light">
                                    <span id="todayAddedMember"></span>
                                    <small>个</small>
                                </h2>
                                <p>今日新增</p>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="text-red-light">
                                    <span id="yesterdayAddedMemberCount"></span>
                                    <small>个</small>
                                </h2>
                                <p>昨日新增</p>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="text-green-light">
                                    <span id="currentMonthAddedMemberCount"></span>
                                    <small>个</small>
                                </h2>
                                <p>本月新增</p>
                            </div>
                            <div class="last col-xs-3">
                                <h2 class="text-purple-light">
                                    406
                                    <small>个</small>
                                </h2>
                                <p>会员总数</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="business-info panel panel-default">
                    <div class="panel-heading">
                        <h5>商家信息</h5>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-3">
                                <h2 class="text-blue-light">
                                    <span id="todayAddedBusiness"></span>
                                    <small>个</small>
                                </h2>
                                <p>今日新增</p>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="text-red-light">
                                    <span id="yesterdayAddedBusinessCount"></span>
                                    <small>个</small>
                                </h2>
                                <p>昨日新增</p>
                            </div>
                            <div class="col-xs-3">
                                <h2 class="text-green-light">
                                    <span id="currentMonthAddedBusinessCount"></span>
                                    <small>个</small>
                                </h2>
                                <p>本月新增</p>
                            </div>
                            <div class="last col-xs-3">
                                <h2 class="text-purple-light">
                                    315
                                    <small>个</small>
                                </h2>
                                <p>商家总数</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>系统名称</th>
                    <td>
                        SHOP++ B2B2C网上商城系统
                        <a class="text-gray" href="http://www.shopxx.net" target="_blank">[授权查询]</a>
                    </td>
                    <th>系统版本</th>
                    <td>6.0 RELEASE</td>
                </tr>
                <tr>
                    <th>JAVA版本</th>
                    <td>1.7.0_80</td>
                    <th>JAVA路径</th>
                    <td>/shopxx/jdk1.7/jre</td>
                </tr>
                <tr>
                    <th>操作系统构架</th>
                    <td>amd64</td>
                    <th>操作系统名称</th>
                    <td>Linux</td>
                </tr>
                <tr>
                    <th>Server信息</th>
                    <td>
                        <span title="Apache Tomcat/7.0.84" data-toggle="tooltip">Apache Tomcat/7.0.84</span>
                    </td>
                    <th>Servlet版本</th>
                    <td>3.0</td>
                </tr>
            </table>
        </div>
    </div>
</main>
</body>
</html>
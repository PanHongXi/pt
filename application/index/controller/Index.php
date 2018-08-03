<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        //获取首页导航栏
        $navList = model('index')->getNavList();

        //获取首页轮播
        $broadList = model('Broad')->getBroadList();

        //获取合作客户
        $cooperList = model('Product')->getProduct(75, 1);

        //获取产品导航
        $navProductList = model('Nav')->getNavProduct(72, 1);

//        dump($navProductList);die;

        //获取应用案例
        $applyList = model('Product')->getProduct(73, 1);

        //获取应用案例内容
        $applyDesc = db('nav')->where(array('id' => 73))->find();

        //获取平特精五金模具
        $ptList = model('Product')->getProduct(89, 1);

        //获取首页公司简介
        $briefInfo = model('product')->getProductOne(85);

        //获取精密模具定制流程
        $processList = model('product')->getProduct(90, 1);

        //获取首页新闻资讯
        $newList = model('product')->getProduct(78, 1);
        //获取首页常见问题
        $problemList = model('product')->getProduct(79, 1);

        //获取友情链接
        $linkList = db('link')->select();

        //获取基本信息
        $infoPhone = model('system')->sys(7);
        $infoAddress = model('system')->sys(8);
        $infoCopy = model('system')->sys(9);
        $infoRecord  = model('system')->sys(10);
        $infoQq = model('system')->sys(11);
        $infoApp = model('system')->sys(12);
        $infoWechat = model('system')->sys(13);
        $infoSmall= model('system')->sys(14);

        $this->assign([
            'navList'   => $navList,
            'broadList' => $broadList,
            'cooperList' => $cooperList,
            'navProductList' => $navProductList,
            'applyList' => $applyList,
            'applyDesc' => $applyDesc,
            'ptList' => $ptList,
            'briefInfo' => $briefInfo,
            'processList' => $processList,
            'newList' => $newList,
            'problemList' => $problemList,
            'linkList' => $linkList,

            'infoPhone' => $infoPhone,
            'infoAddress' => $infoAddress,
            'infoCopy' => $infoCopy,
            'infoRecord' => $infoRecord,
            'infoQq' => $infoQq,
            'infoApp' => $infoApp,
            'infoWechat' => $infoWechat,
            'infoSmall' => $infoSmall,
            'show' => 1,//首页与其他页面轮播显示样式
        ]);
        return view();
    }
}

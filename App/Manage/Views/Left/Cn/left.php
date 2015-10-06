<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>left</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo APP_JS_PUBLIC_PATH?>jquery-1.8.3.min.js"></script>
<script src="<?php echo APP_JS_PUBLIC_PATH?>left.js"></script>
</head>
<body>
<div class="sidebar-wrap">
        <div class="sidebar-title"><h1>菜单</h1></div>
        <div class="sidebar-content">
            <ul class="sidebar-list">
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>管理设置</a>
                    <ul class="sub-menu" style="display:none;">
                        <li><a href="../manager/manager" target="blank"><i class="icon-font">&#xe005;</i>管理员列表</a></li>
                        <li><a href="../manager/add" target="main"><i class="icon-font">&#xe005;</i>新增管理员</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>类目管理</a>
                    <ul class="sub-menu" style="display:none;">
                        <li><a href="../category/category1" target="main"><i class="icon-font">&#xe005;</i>一级类目列表</a></li>
                        <li><a href="../category/category2" target="main"><i class="icon-font">&#xe005;</i>二级类目列表</a></li>
                        <li><a href="../category/category3" target="main"><i class="icon-font">&#xe005;</i>三级类目列表</a></li>
                        <li><a href="../category/addCategory1" target="main"><i class="icon-font">&#xe005;</i>新增一级类目</a></li>
                        <li><a href="../category/addCategory2" target="main"><i class="icon-font">&#xe005;</i>新增二级类目</a></li>
                        <li><a href="../category/addCategory3" target="main"><i class="icon-font">&#xe005;</i>新增三级类目</a></li>
                       
                       
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>商品管理</a>
                   <ul class="sub-menu" style="display:none;">
                        <li><a href="../products/productslist" target="main"><i class="icon-font">&#xe005;</i>商品列表</a></li>
                        <li><a href="../products/addproduct" target="main"><i class="icon-font">&#xe005;</i>新增商品</a></li>
                        <li><a href="../products/productsku" target="main"><i class="icon-font">&#xe005;</i>商品属性</a></li>
                        <li><a href="../products/addproductsku" target="main"><i class="icon-font">&#xe005;</i>新增商品属性</a></li>
                       
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="icon-font">&#xe003;</i>页面设置</a>
                    <ul class="sub-menu" style="display:none;">
                        <li><a href="../banner/index" target="main"><i class="icon-font">&#xe005;</i>首页横幅设置</a></li>
                        <li><a href="../banner/ads" target="main"><i class="icon-font">&#xe005;</i>首页广告设置</a></li>
                        <li><a href="../website/website" target="main"><i class="icon-font">&#xe005;</i>首页站点设置</a></li>
                        <li><a href="../hotproduct/hotproduct" target="main"><i class="icon-font">&#xe005;</i>首页人气单品设置</a></li>
                        <li><a href="../teambuy/teambuy" target="main"><i class="icon-font">&#xe005;</i>首页超值团购设置</a></li>
                        <li><a href="../hotshop/hotshop" target="main"><i class="icon-font">&#xe005;</i>首页店铺推荐设置</a></li>
                        <li><a href="../activity/activity" target="blank"><i class="icon-font">&#xe005;</i>首页活动设置</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>




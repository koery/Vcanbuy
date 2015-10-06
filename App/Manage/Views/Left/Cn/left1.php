<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>左边</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>skinLeft.css" rel="stylesheet" type="text/css" />
<script src="<?php echo APP_JS_PUBLIC_PATH?>prototype.lite.js" type="text/javascript"></script>
<script src="<?php echo APP_JS_PUBLIC_PATH?>moo.fx.js" type="text/javascript"></script>
<script src="<?php echo APP_JS_PUBLIC_PATH?>moo.fx.pack.js" type="text/javascript"></script>
</head>

<body>
<table width="100%" cellpadding="0" cellspacing="0">
  <tr>
    <td width="182" valign="top">
    	<div id="container">
      		<h1 class="type"><a href="javascript:void(0)">管理设置</a></h1>
      		<div class="content">
                <div class="gradient"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>menu_topline.gif"/></div>
                <ul class="MM">
                      <li><a href="../manager/manager" target="main">管理员列表</a></li>
                      <li><a href="../manager/add" target="main">新增管理员</a></li>                     
                      
                </ul>
      		</div>
      		<h1 class="type"><a href="javascript:void(0)">类目管理</a></h1>
      		<div class="content">
                <div class="gradient"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>menu_topline.gif"/></div>
                <ul class="MM">
                  <li><a href="../category/category1" target="main">一级类目列表</a></li>
                  <li><a href="../category/category2" target="main">二级类目列表</a></li>
                  <li><a href="../category/category3" target="main">三级类目列表</a></li>
                  <li><a href="../category/addCategory1" target="main">新增一级类目</a></li>
                  <li><a href="../category/addCategory2" target="_blank">新增二级类目</a></li>
                  <li><a href="../category/addCategory3" target="main">新增三级类目</a></li>
                  
                </ul>
      		</div>
      		<h1 class="type"><a href="javascript:void(0)">商品管理</a></h1>
      		<div class="content">
                <div class="gradient"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>menu_topline.gif"/></div>
                <ul class="MM">
                  <li><a href="../products/productslist" target="main">商品列表</a></li>
                  <li><a href="../products/addproduct" target="_blank">新增商品</a></li>
                   <li><a href="../products/productsku" target="blank">商品属性</a></li>
                  <li><a href="../products/addproductsku" target="_blank">新增商品属性</a></li>
                  
                </ul>
      		</div>
	
      		<h1 class="type"><a href="javascript:void(0)">页面设置</a></h1>
      		<div class="content">
                <div class="gradient"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>menu_topline.gif"/></div>
                <ul class="MM">
                  <li><a href="../banner/index" target="main">首页横幅设置</a></li>
                  <li><a href="../banner/ads" target="main">首页广告设置</a></li>
                  <li><a href="../website/website" target="_blank">首页站点设置</a></li>
                  <li><a href="../hotproduct/hotproduct" target="main">首页人气单品设置</a></li>
                  <li><a href="../teambuy/teambuy" target="main">首页超值团购设置</a></li>
                  <li><a href="../hotshop/hotshop" target="main">首页店铺推荐设置</a></li>
                  <li><a href="../activity/activity" target="main">首页活动设置</a></li>
                 
                </ul>
      		</div>
    	</div>
        <script type="text/javascript">
	       
			var contents = document.getElementsByClassName('content');
			var toggles = document.getElementsByClassName('type');
		
			var myAccordion = new fx.Accordion(
				toggles, contents, {opacity: true, duration: 400}
			);
			myAccordion.showThisHideOpen(contents[0]);
			//myAccordion.showThisHideOpen(contents[1]);
			//myAccordion.showThisHideOpen(contents[2]);
			//myAccordion.showThisHideOpen(contents[3]);
		</script>
      </td>
  </tr>
</table>
</body>
</html>

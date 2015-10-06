
<!---------con----------->
<!--  
<div class="top_bnr">
	<ul class="banner" ><!--这里img的大小是2000x370的大小；总共是5张,效果是轮流显示仿美丽说的显示效果 
    	<li class = "banner_show" style="display:block"><a href="javascript:void(0);" ><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic1_500.jpg"/></a></li>
    	<li class = '' style="display:none"><a href="javascript:void(0);" ><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic2_500.jpg"/></a></li>
    	<li class = '' style="display:none"><a href="javascript:void(0);" ><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic3_500.jpg"/></a></li>
    	<li class = '' style="display:none"><a href="javascript:void(0);" ><img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic4_500.jpg"/></a></li>	
    </ul>
</div>
  -->
<div class="top_bnr">
	<ul class="banner"><!--这里img的大小是2000x370的大小；总共是5张,效果是轮流显示仿美丽说的显示效果 -->
                <?php 
                    
                    $num = count($banner1);
                    $i = 1;
                	foreach ($banner1 as $dataOfBanner1) {
						
						if($i == $num){
					?>
						<li class="banner_show"><a href="javascript:void(0);" style="background:url(<?php echo $dataOfBanner1['img_path']?>) repeat center top;"></a></li>
					
					<?php 		

						}else{
				?>
                		<li><a href="javascript:void(0);" style="background:url(<?php echo $dataOfBanner1['img_path']?>) repeat center top;"></a></li>
                <?php }
                	$i++;
                	}
                ?>
        <!--  
    	<li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic1_500.jpg) repeat center top;"></a></li>
    	<li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic2_500.jpg) repeat center top;"></a></li>
    	<li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic3_500.jpg) repeat center top;"></a></li>
    	<li class="banner_show"><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/pic4_500.jpg) repeat center top;"></a></li>
    	-->
    </ul>
</div>

<!---------展开列表页----------->
<div class="top_wrap">
	<div class="top_box">
    	<div class="attr_box">
            <ul class="sec_attr">
                <li class="list_unit "><!--mouseover到每个li上面，每个li加上unit_selected-->
                	<h3><i class="cloth"></i><a href="#">女装</a><span>/</span><a href="#">男装</a><span>/</span><a href="#">内衣</a></h3>
                    <div class="subnav_content_wrap cloth" style="display:none;">
                        <div class="subnav_content " style="display:none;">
                                <h2 class=""><a href="#">女装市场</a></h2>
                                <ul class="">
                                    <li><a href="../productlist/productlist">女装潮风尚市场</a></li>
                                    <li><a href="#">女装真丝春夏上新</a></li>
                                    <li><a href="#">连衣裙</a></li>
                                    <li><a href="#">针织衫</a></li>
                                    <li><a href="#">T恤</a></li>
                                    <li><a href="#">打底裤</a></li>
                                    <li><a href="#">牛仔裤</a></li>
                                    <li><a href="#">休闲裤</a></li>
                                    <li><a href="#">卫衣</a></li>
                                    <li><a href="#">休闲套装</a></li>
                                    <li><a href="#">一体裤</a></li>
                                    <li><a href="#">真丝</a></li>
                                    <li><a href="#">半身裙</a></li>
                                    <li><a href="#">蕾丝衫</a></li>
                                    <li><a href="#">吊带衫</a></li>
                                    <li><a href="#">品牌</a></li>
                                    <li><a href="#">精品</a></li>
                                </ul>
                                <h2 class=""><a href="#">男装市场</a></h2>
                                <ul class="">
                                    <li><a href="#">T恤</a></li>
                                    <li><a href="#">衬衫</a></li>
                                    <li><a href="#">休闲裤</a></li>
                                    <li><a href="#">牛仔裤</a></li>
                                    <li><a href="#">夹克</a></li>
                                    <li><a href="#">休闲西装</a></li>
                                    <li><a href="#">卫衣</a></li>
                                    <li><a href="#">棒球衫</a></li>
                                    <li><a href="#">男装春款上新季</a></li>
                                    <li><a href="#">长袖T恤</a></li>
                                    <li><a href="#">polo衫</a></li>
                                    <li><a href="#">薄外套</a></li>
                                    <li><a href="#">皮衣</a></li>
                                    <li><a href="#">风衣</a></li>
                                </ul>
                                <h2 class=""><a href="#">内衣市场</a></h2>
                                <ul class="">
                                    <li><a href="#">内裤</a></li>
                                    <li><a href="#">袜子</a></li>
                                    <li><a href="#">连裤袜</a></li>
                                    <li><a href="#">文胸</a></li>
                                    <li><a href="#">女士内裤</a></li>
                                    <li><a href="#">睡衣</a></li>
                                    <li><a href="#">无缝内衣</a></li>
                                    <li><a href="#">聚拢文胸</a></li>
                                    <li><a href="#">睡袍</a></li>
                                    <li><a href="#">韩版睡衣</a></li>
                                    <li><a href="#">情趣内衣</a></li>
                                    <li><a href="#">丝袜</a></li>
                                    <li><a href="#">塑身衣</a></li>
                                    <li><a href="#">男士内裤</a></li>
                                    <li><a href="#">美体内衣</a></li>
                                </ul>
                          </div>
                     </div><!--服饰列表-->
                </li>
                <li class="list_unit  ">
                	<h3>
                        <i class="shoe"></i>
                        <a href="#">鞋靴</a>
                        <span>/</span>
                        <a href="#">箱包</a>
                        <span>/</span>
                        <a href="#">配饰</a>
                     </h3>
                     	<div class="subnav_content_wrap shoe" style="display:none;">
                           <div class="subnav_content" style="display:none;">
                                <div class="item_ctn">
                                <div class="lt_item">
                                    <h2 class=""><a href="#">鞋靴市场</a></h2>
                                    <ul class="">
                                        <li><a href="#">女鞋</a></li>
                                        <li><a href="#">男鞋</a></li>
                                        <li><a href="#">童鞋</a></li>
                                        <li><a href="#">拖鞋</a></li>
                                        <li><a href="#">板鞋</a></li>
                                        <li><a href="#">凉鞋</a></li>
                                        <li><a href="#">皮鞋</a></li>
                                        <li><a href="#">婚鞋</a></li>
                                        <li><a href="#">乐福鞋</a></li>
                                        <li><a href="#">板鞋</a></li>
                                    </ul>
                                </div>
                                <div class="rt_item">
                                    <h2 class=""><a href="#">女鞋市场</a></h2>
                                    <ul class="">
                                        <li><a href="#">单鞋</a></li>
                                        <li><a href="#">坡跟</a></li>
                                        <li><a href="#">尖头</a></li>
                                        <li><a href="#">平底</a></li>
                                        <li><a href="#">高跟</a></li>
                                        <li><a href="#">内增高</a></li>
                                        <li><a href="#">鱼嘴</a></li>
                                        <li><a href="#">帆布鞋</a></li>
                                        <li><a href="#">妈妈鞋</a></li>
                                        <li><a href="#">豆豆鞋</a></li>
                                    </ul>
                                </div>
                            </div>
                                <div class="item_ctn">
                                <div class="lt_item">
                                    <h2 class=""><a href="#">鞋靴市场</a></h2>
                                    <ul class="">
                                        <li><a href="#">女鞋</a></li>
                                        <li><a href="#">男鞋</a></li>
                                        <li><a href="#">童鞋</a></li>
                                        <li><a href="#">拖鞋</a></li>
                                        <li><a href="#">板鞋</a></li>
                                        <li><a href="#">凉鞋</a></li>
                                        <li><a href="#">皮鞋</a></li>
                                        <li><a href="#">婚鞋</a></li>
                                        <li><a href="#">乐福鞋</a></li>
                                        <li><a href="#">板鞋</a></li>
                                    </ul>
                                </div>
                                <div class="rt_item">
                                    <h2 class=""><a href="#">女鞋市场</a></h2>
                                    <ul class="">
                                        <li><a href="#">单鞋</a></li>
                                        <li><a href="#">坡跟</a></li>
                                        <li><a href="#">尖头</a></li>
                                        <li><a href="#">平底</a></li>
                                        <li><a href="#">高跟</a></li>
                                        <li><a href="#">内增高</a></li>
                                        <li><a href="#">鱼嘴</a></li>
                                        <li><a href="#">帆布鞋</a></li>
                                        <li><a href="#">妈妈鞋</a></li>
                                        <li><a href="#">豆豆鞋</a></li>
                                    </ul>
                                </div>
                            </div>
                                <div class="item_ctn">
                                <div class="lt_item">
                                    <h2 class=""><a href="#">鞋靴市场</a></h2>
                                    <ul class="">
                                        <li><a href="#">女鞋</a></li>
                                        <li><a href="#">男鞋</a></li>
                                        <li><a href="#">童鞋</a></li>
                                        <li><a href="#">拖鞋</a></li>
                                        <li><a href="#">板鞋</a></li>
                                        <li><a href="#">凉鞋</a></li>
                                        <li><a href="#">皮鞋</a></li>
                                        <li><a href="#">婚鞋</a></li>
                                        <li><a href="#">乐福鞋</a></li>
                                        <li><a href="#">板鞋</a></li>
                                    </ul>
                                </div>
                                <div class="rt_item">
                                    <h2 class=""><a href="#">女鞋市场</a></h2>
                                    <ul class="">
                                        <li><a href="#">单鞋</a></li>
                                        <li><a href="#">坡跟</a></li>
                                        <li><a href="#">尖头</a></li>
                                        <li><a href="#">平底</a></li>
                                        <li><a href="#">高跟</a></li>
                                        <li><a href="#">内增高</a></li>
                                        <li><a href="#">鱼嘴</a></li>
                                        <li><a href="#">帆布鞋</a></li>
                                        <li><a href="#">妈妈鞋</a></li>
                                        <li><a href="#">豆豆鞋</a></li>
                                    </ul>
                                </div>
                            </div>                  
                            </div>
                       </div><!--鞋子箱包-->
                </li>
                <li class="list_unit ">
                	<h3>
                        <i class="outdoor"></i>
                        <a href="#">运动户外</a>
                     </h3> 
                </li>
                <li class="list_unit ">
                	<h3>
                        <i class="maternal"></i>
                        <a href="#">母婴用品</a>
                        <span>/</span>
                        <a href="#">童装</a>
                        <span>/</span>
                        <a href="#">玩具</a>
                      </h3>
                </li>
                <li class="list_unit ">
                	<h3>
                        <i class="crafts"></i>
                        <a href="#">工艺品</a>
                        <span>/</span>
                        <a href="#">百货</a>
                        <span>/</span>
                        <a href="#">宠物</a>
                     </h3>   
                </li>
                <li class="list_unit ">
                	<h3>
                        <i class="car"></i>
                        <a href="#">汽车用品</a>
                     </h3>    
                </li>
                <li class="list_unit ">
                	<h3>
                        <i class="food"></i>
                        <a href="#">食品</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="furnish"></i>
                        <a href="#">家纺家饰</a>
                        <span>/</span>
                        <a href="#">家装建材</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="makeup"></i>
                        <a href="#">美妆日化</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="digital"></i>
                        <a href="#">数码家电</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="electrical"></i>
                        <a href="#">电工电气</a>
                        <span>/</span>
                        <a href="#">安防</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="packaging"></i>
                        <a href="#">包装</a>
                        <span>/</span>
                        <a href="#">行政办公</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="lighting"></i>
                        <a href="#">照明</a>
                        <span>/</span>
                        <a href="#">电子</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="mechanics"></i>
                        <a href="#">机械</a>
                        <span>/</span>
                        <a href="#">五金</a>
                        <span>/</span>
                        <a href="#">仪表</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="rubber"></i>
                        <a href="#">橡塑</a>
                        <span>/</span>
                        <a href="#">化工</a>
                        <span>/</span>
                        <a href="#">钢材</a>
                    </h3> 
                </li>
                <li class="list_unit">
                	<h3>
                        <i class="leather"></i>
                        <a href="#">纺织皮革</a>
                    </h3> 
                </li>
            </ul>
        </div>
    </div>
</div>


<!---------展开列表页----------->

<!---------con----------->

<div class="container">
	<div class="w1200 clearfix">
    	<div class="other_list clearfix"><!--平台推荐 -->
        		<div class="platform_name">平台<br/>推荐</div>
            	<div class="platform_list">
                <ul class=""><!--每个大标志是114x54的大小 -->
                <?php 
                
                	foreach ($websites as $dataOfWebsites) {
				?>
                		<li><a href="<?php echo $dataOfWebsites['img_url'] ?>" target="_blank" style="background:url(<?php echo $dataOfWebsites['img_path']?>) no-repeat;"></a></li>
                <?php 
                	}
                ?>
                
                   <!--   <li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/alibaba.png) no-repeat;"></a></li>
                    <li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/taobao.png) no-repeat;"></a></li>
                    <li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/dd.png) no-repeat;"></a></li>
                    <li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/jd.png) no-repeat;"></a></li>
                    <li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/firststore.png) no-repeat;"></a></li>
                    <li><a href="javascript:void(0);" style="background:url(<?php //echo APP_MODULE_IMAGE_PATH?>ImgIndex/alibaba.png) no-repeat;"></a></li>
                -->
                </ul>               
            </div>
          </div><!--平台推荐 -->
          <div class="auto_wrap clearfix"><!--人气单品 -->
          		<div class="title">
                	<h2>人气单品</h2>
                </div>
                <div class="recommend">
                		<div class="rec_first"><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec01.jpg"/></a></div><!--左边的大图375x525-->
                        <ul class="rec_right"><!--左边的6个小图250x250,彼此之间的距离25px-->
                            <li><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec02.jpg"/></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec03.jpg"/></a></li>
                            <li><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec04.jpg"/></a></li>
                            <li class="down"><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec05.jpg"/></a></li>
                            <li class="down"><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec02.jpg"/></a></li>
                            <li class="down"><a href="javascript:void(0);"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/rec03.jpg"/></a></li>
                        </ul>
       		</div>
          </div><!--人气单品 -->
          <div class="ads clearfix"><!--广告栏 -->
          		<a href="javascript:void(0);" class="" target="_blank"><img src="<?php echo $banner2[0]['img_path']?>"/></a><!--广告栏的要求是1200x90得大小； -->
          </div><!--广告栏 -->
          <div class="auto_wrap clearfix"><!--团购 -->
          		<div class="title">
                	<h2>超值团购</h2>
                    <div class="topbar_link">
                    	<a href="javascript:void(0);">新款优惠购！</a><a href="javascript:void(0);">超值低价</a><a href="javascript:void(0);">爆鞋39元起!</a><a href="javascript:void(0);">最新包包</a><a href="javascript:void(0);">更多</a>
                    </div>
                </div>
                <div class="recommend">
                        <ul class="tuangou_list"><!--每个img的大小是220x330px；一排5个；-->
                            <li>
                            	<a href="javascript:void(0);" class="tuangou_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/dsfbebgv22x330.jpg"/></a>   	<!--每个img的大小是220x330px；一排5个；-->
								<p class="tuangou_title"><a href="javascript:void(0);">私家兔毛装饰喇毛装饰喇毛装...</a></p><!--团购的标题共13个字，超过13就是省略号代替； -->
								<p class="tuangou_info"><span>抢购价：</span><span class="price">￥125.30</span></p>
                            </li>
                            <li>
                            	<a href="javascript:void(0);" class="tuangou_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/dsfbebgv22x330.jpg"/></a>   	<!--每个img的大小是220x330px；一排5个；-->
								<p class="tuangou_title"><a href="javascript:void(0);">私家兔毛装饰喇毛装饰喇毛装...</a></p><!--团购的标题共13个字，超过13就是省略号代替； -->
							  <p class="tuangou_info"><span>抢购价：</span><span class="price">￥125.30</span></p>
                            </li>
                            <li>
                            	<a href="javascript:void(0);" class="tuangou_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/bgv22x330.jpg"/></a>   	<!--每个img的大小是220x330px；一排5个；-->
								<p class="tuangou_title"><a href="javascript:void(0);">私家兔毛装饰喇毛装饰喇毛装...</a></p><!--团购的标题共13个字，超过13就是省略号代替； -->
							  <p class="tuangou_info"><span>抢购价：</span><span class="price">￥125.30</span></p>
                            </li>
                            <li>
                            	<a href="javascript:void(0);" class="tuangou_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/dsfbebgv22x330.jpg"/></a>   	<!--每个img的大小是220x330px；一排5个；-->
								<p class="tuangou_title"><a href="javascript:void(0);">私家兔毛装饰喇毛装饰喇毛装...</a></p><!--团购的标题共13个字，超过13就是省略号代替； -->
							  <p class="tuangou_info"><span>抢购价：</span><span class="price">￥125.30</span></p>
                            </li>
                            <li>
                            	<a href="javascript:void(0);" class="tuangou_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/bgv22x330.jpg"/></a>   	<!--每个img的大小是220x330px；一排5个；-->
								<p class="tuangou_title"><a href="javascript:void(0);">私家兔毛装饰喇毛装饰喇毛装...</a></p><!--团购的标题共13个字，超过13就是省略号代替； -->
							  <p class="tuangou_info"><span>抢购价：</span><span class="price">￥125.30</span></p>
                            </li>
                        </ul>
       		</div>
   	  		</div><!--团购 -->
          <div class="ads clearfix"><!--广告栏 -->
          		<a href="javascript:void(0);" class="" target="_blank"><img src="<?php echo $banner2[1]['img_path']?>"/></a><!--广告栏的要求是1200x90得大小； -->
          </div><!--广告栏 -->
          <div class="auto_wrap clearfix"><!--店铺推荐 -->
          		<div class="title">
                	<h2>店铺推荐</h2>
                </div>
                <div class="recommend">
                        <ul class="shop_list"><!--每个img的大小282x265px；一排4个；-->
                            <li>
                            	<a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vbwejgwefew.jpg"/></a> <!--每个img的大小是282x265px；一排4个；-->
                                <div class="shop_info">
                                	<a href="javascript:void(0);" class="ava"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/cbwfgregrt.jpg"/></a><!--店铺的标志大小50x50; -->
                                	<div class="more_info">
                                    	<p class="shop_title"><a href="javascript:void(0);">金金韩国美包馆</a></p>
                                        <p class="shop_more">好评度：<span>97.63%</span>好评</p>
                                        <p class="shop_more">收藏人气：<span>7196</span></p>
                                     </div>
                                </div>
                          </li>
                            <li>
                            	<a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vbwejgwefew.jpg"/></a> <!--每个img的大小是282x265px；一排4个；-->
                                <div class="shop_info">
                                	<a href="javascript:void(0);" class="ava"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/cbwfgregrt.jpg"/></a><!--店铺的标志大小50x50; -->
                                	<div class="more_info">
                                    	<p class="shop_title"><a href="javascript:void(0);">金金韩国美包馆</a></p>
                                        <p class="shop_more">好评度：<span>97.63%</span>好评</p>
                                        <p class="shop_more">收藏人气：<span>7196</span></p>
                                     </div>
                                </div>
                          </li>
                            <li>
                            	<a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vbwejgwefew.jpg"/></a> <!--每个img的大小是282x265px；一排4个；-->
                                <div class="shop_info">
                                	<a href="javascript:void(0);" class="ava"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/cbwfgregrt.jpg"/></a><!--店铺的标志大小50x50; -->
                                	<div class="more_info">
                                    	<p class="shop_title"><a href="javascript:void(0);">金金韩国美包馆</a></p>
                                        <p class="shop_more">好评度：<span>97.63%</span>好评</p>
                                        <p class="shop_more">收藏人气：<span>7196</span></p>
                                     </div>
                                </div>
                          </li>
                            <li>
                            	<a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vbwejgwefew.jpg"/></a> <!--每个img的大小是282x265px；一排4个；-->
                                <div class="shop_info">
                                	<a href="javascript:void(0);" class="ava"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/cbwfgregrt.jpg"/></a><!--店铺的标志大小50x50; -->
                                	<div class="more_info">
                                    	<p class="shop_title"><a href="javascript:void(0);">金金韩国美包馆</a></p>
                                        <p class="shop_more">好评度：<span>97.63%</span>好评</p>
                                        <p class="shop_more">收藏人气：<span>7196</span></p>
                                     </div>
                                </div>
                          </li>
                        </ul>
       			</div>
   	  	</div><!-- 店铺推荐-->
        <div class="auto_wrap clearfix"><!--活动 -->
            <div class="title">
                <h2>活动</h2>
            </div>
            <div class="activity">
                <ul class=""> <!--每个img的大小是236x146px;左右滚动的效果;总共是8张-->
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vberjgrgtrh.jpg"/></a></li>
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/cnruegtr.jpg"/></a></li>
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vberjgrgtrh.jpg"/></a></li>
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/xerngtr.jpg"/></a></li>
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vberjgrgtrh.jpg"/></a></li>
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/xerngtr.jpg"/></a></li>
                    <li><a href="javascript:void(0);" class="shop_pic"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgIndex/vberjgrgtrh.jpg"/></a></li>
                </ul>
                <a href="javascript:void(0);" class="scroll scrollLeft"></a>
                <a href="javascript:void(0);" class="scroll scrollRight"></a>
            </div>
        </div><!-- 活动-->
    </div>
</div>




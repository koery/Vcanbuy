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
<!------top_bnr   end------------------------>
<!-------展开列表页------------------------->
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
                                    <li><a href="#">女装潮风尚市场</a></li>
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
<!---------展开列表  end----------->
<!---------con----------->
<div class="content_warp clearfix">
  <div class="w1200 clearfix">
  		<div class="con_filter clearfix">
        	<div class="filter">
                <h3>毛衣</h3>
                <ul class="key_filter">
                    <li class="on_keyword"><a href="">全部</a></li>
                    <li><a href="">最新</a></li>
                    <li class="noborder"><a href="">销量</a></li>
                </ul>
                
             </div>
  		
          <div class="img_container">
              	<div class="list_info">
                	<a href="../proinfo/proinfo?productId=1" class="imgshow"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgProductList/141480459416280x280.jpg"/></a><!--产品的大小是280x280的尺寸-->
                	<p class="pro_name"><a href="#">美人鱼衣家秋冬实拍实拍甜美美领蝴蝶结麻花短款毛衣套款毛衣款毛衣短款毛短款...</a></p><!--产品名称只有两行，37个字，超过对就是省略号,最少20个字-->
                	<p class="pro_price">￥169.50</p>
            	</div>
          
              	<div class="list_info">
                	<a href="#" class="imgshow"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgProductList/4rbmreo290x290.jpg"/></a><!--产品的大小是280x280的尺寸-->
                	<p class="pro_name"><a href="#">美人鱼衣家秋冬实拍实拍甜美美领蝴蝶结麻花短款毛衣套款毛衣款毛衣短款毛短款...</a></p><!--产品名称只有两行，37个字，超过对就是省略号,最少20个字-->
                	<p class="pro_price">￥169.50</p>
            	</div>
            	
              	
              	<div class="list_info">
                	<a href="#" class="imgshow"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgProductList/4rbmreo290x290.jpg"/></a>
                	<p class="pro_name"><a href="#">美人鱼衣家 秋冬实拍 甜美V领蝴蝶结麻花短款毛衣2件套</a></p>
                	<p class="pro_price">￥169.50</p>
            	</div>
            	
              	<div class="list_info">
                	<a href="#" class="imgshow"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgProductList/4rbmreo290x290.jpg"/></a>
                	<p class="pro_name"><a href="#">美人鱼衣家 秋冬实拍 甜美V领蝴蝶结麻花短款毛衣2件套</a></p>
                	<p class="pro_price">￥169.50</p>
            	</div>
            	
              	<div class="list_info">
                	<a href="#" class="imgshow"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgProductList/4rbmreo290x290.jpg"/></a>
                	<p class="pro_name"><a href="#">美人鱼衣家 秋冬实拍 甜美V领蝴蝶结麻花短款毛衣2件套</a></p>
                	<p class="pro_price">￥169.50</p>
            	</div>
            	
              	<div class="list_info">
                	<a href="#" class="imgshow"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgProductList/4rbmreo290x290.jpg"/></a>
                	<p class="pro_name"><a href="#">美人鱼衣家 秋冬实拍 甜美V领蝴蝶结麻花短款毛衣2件套</a></p>
                	<p class="pro_price">￥169.50</p>
            	</div>
          </div>
        </div>
    </div>
</div>



<!--侧边栏 -->
<div class="ibar">
	<div class="ibar_main_panel">
        <ul class="ibar_center">
            <li class="ibar_login sideBarItem">
            	<a href="#" class="changeBg"><i class="ibarItem"></i></a>
                <div class="hover_tip " style="visibility:hidden;opacity:;">我的特权<b></b></div>
                <div class="ibar_login_box" style="display:none;"><!--login框 -->
    				<s class="ibar_rightarrow"></s>
    				<a href="#" class="ibar_closebtn"></a>
       				<div class="ibar_loginform" >
        				<div class="ibar_unit">
            				<p class="unit_title">登录名：</p>
                			<input type="text" class="ibar_username" value=" "/>
            			</div>
        				<div class="ibar_unit">
            				<p class="unit_title">密码：</p>
                			<input type="password" class="ibar_psw" value=""/>
            				<p class="unit_tip">忘记密码?</p>
           				</div>
        				<a href="#" class="ibar_surebtn">登录</a>
        			</div>
   			  </div><!--login框 -->                
            </li>
            <li class="ibar_cart sideBarItem">
            	<a href="#" class="changeBg">
                	<i></i><span class="cart_text">购物车</span><span class="cart_num">0</span>
                </a>
                <div class="ibar_login_box" style="top:18px;display:none;"><!--login框 -->
    				<s class="ibar_rightarrow"></s>
    				<a href="#" class="ibar_closebtn"></a>
       				<div class="ibar_loginform" >
        				<div class="ibar_unit">
            				<p class="unit_title">登录名：</p>
                			<input type="text" class="ibar_username" value=" "/>
            			</div>
        				<div class="ibar_unit">
            				<p class="unit_title">密码：</p>
                			<input type="password" class="ibar_psw" value=""/>
            				<p class="unit_tip">忘记密码?</p>
           				</div>
        				<a href="#" class="ibar_surebtn">登录</a>
        			</div>
   			  </div><!--login框 -->                
            </li>
            <li class="ibar_asset sideBarItem">
            	<a href="#" class="changeBg"><i class="ibarItem"></i></a>
                <div class="hover_tip" style="visibility:hidden;opacity:;">我的资产<b></b></div>
                <div class="ibar_login_box" style="display:none;"><!--login框 -->
    				<s class="ibar_rightarrow"></s>
    				<a href="#" class="ibar_closebtn"></a>
       				<div class="ibar_loginform">
        				<div class="ibar_unit">
            				<p class="unit_title">登录名：</p>
                			<input type="text" class="ibar_username" value=" "/>
            			</div>
        				<div class="ibar_unit">
            				<p class="unit_title">密码：</p>
                			<input type="password" class="ibar_psw" value=""/>
            				<p class="unit_tip">忘记密码?</p>
           				</div>
        				<a href="#" class="ibar_surebtn">登录</a>
        			</div>
   			  </div><!--login框 -->                
            </li>            
        </ul>
        <ul class="ibar_bottom">
            <li class="ibar_client sideBarItem">
            	<a href="#" class="changeBg"><i class="ibarItem"></i></a>
                <div class="hover_tip" style="visibility:hidden;opacity:;">手机客户端<b></b></div>
            </li>
            <li class="ibar_toTop sideBarItem" >
            	<a href="#" class="changeBg returnToTop" style="display:none"><i></i></a>                
            </li>
        </ul>
    </div>     
</div>
<!--侧边栏 -->
 			 


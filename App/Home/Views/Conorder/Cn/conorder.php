
<!---------search------------------>
<div class="shop_header">    	
        <h1 class="con_logo"><a href="index.html"><img src="<?php echo APP_IMAGE_PUBLIC_PATH ?>VCB LOGO.png"/></a></h1>
        <div class="status">
            <ul class="process clearfix">
            	<li class="step1">
                	<span>1</span>
                	<div></div>
                </li>
            	<li class="step2">
                	<span>2</span>
                	<div></div>
                </li>
            	<li class="step3">
                	<span>3</span>
                	<div></div>
                </li>
            	<li class="step4">
                	<span>4</span>
                </li>
            </ul>
            <div class="status_text">
            	<span class="status_text_one">购物车</span>
            	<span class="status_text_two">确认订单</span>
            	<span class="status_text_three">支付</span>
            	<span class="nomargin">完成</span>
            </div>
        </div>
</div>
<!-------------------->
<?php 
//print_r($myAddress);
?>
<div class="container">
	<p class="label">确认收货地址</p>
    <div class="addr">
    
<?php 
   $defaultAddressId = "null";
	foreach ($myAddress as $addressItem){
	
		   if($addressItem['status']==100000){

              $defaultAddressId=$addressItem['id'];             
             
?>		   	

			<div class="unit clearfix addressItemSeleted" addressId=<?php echo $addressItem['id']?>>
			<div class="add1_input myaddressSeleted" >
			<input type="radio" class="radio" checked/>
			<p>
			<span class="addressItem"><span class="province"><?php echo $addressItem['province']?></span><span class="city"><?php echo $addressItem['city']?></span><span class="district"><?php echo $addressItem['district']?></span><span class="address"><?php echo $addressItem['address']?></span><span class="postcode" style="display: none"><?php echo $addressItem['postcode']?></span></span>
			<span class="username"><?php echo $addressItem['username']?></span>
			<span class="telphone"><?php echo $addressItem['tel']?></span>
			</p>
			</div>
			
			<p class="set_defaultAddr"  addressId=<?php echo $addressItem['id']?> style="display:none;">设为默认地址</p>
			<p class="defaultAddr" addressId=<?php echo $addressItem['id']?> style="display:;">默认地址</p>
			<p class="add1_edit" addressId=<?php echo $addressItem['id']?> style="display:;">[修改]</p>
			
			</div>

<?php 
		   }else{
					
?>	

			<div class="unit clearfix " addressId=<?php echo $addressItem['id']?>>
			<div class="add1_input" >
			<input type="radio" class="radio" />
			<p>
			<span class="addressItem"><span class="province"><?php echo $addressItem['province']?></span><span class="city"><?php echo $addressItem['city']?></span><span class="district"><?php echo $addressItem['district']?></span><span class="address"><?php echo $addressItem['address']?></span><span class="postcode" style="display: none"><?php echo $addressItem['postcode']?></span></span>
			<span class="username"><?php echo $addressItem['username']?></span>
			<span class="telphone"><?php echo $addressItem['tel']?></span>
			</p>
			</div>
			
			<p class="set_defaultAddr"  addressId=<?php echo $addressItem['id']?> style="display:none;">设为默认地址</p>
			<p class="defaultAddr" addressId=<?php echo $addressItem['id']?> style="display:none;">默认地址</p>
			<p class="add1_edit" addressId=<?php echo $addressItem['id']?> style="display:none;">[修改]</p>
			
			</div>

<?php 
		}
		
		
	}
	echo
	"<script>
	defaultAddressId = $defaultAddressId;
	</script>";
?>
    
    
    
    
    <!--  
    	<div class="unit clearfix ">
        	<div class="add1_input">
                    <input type="radio" class="" checked="checked"/>
                    <p>                
                         <span class="">广东广州市白云区三元里大道909至911号粤海商务中心806房号粤海商务中心806房号粤海商务中心806房号粤海商务中心806房号粤海商务中心806房号粤海商务中心806房</span>
                          <span class="">lilidh</span>
                         <span class="">联系方式15830125403</span>
                    </p>
             </div>
            <p class="set_defaultAddr" style="display:none;">设为默认地址</p>
            <p class="defaultAddr" >默认地址</p>
            <p class="add1_edit">[修改]</p>
        </div>
    	<div class="unit clearfix ">
        	<div class="add1_input">
                    <input type="radio" class=""/>
                    <p>                
                         <span class="">广东省广州市越秀区解放北路517-2 距离市中心约6215米广东省广州市越秀区解放北路517-2 距离市中心约6215米广东省广州市越秀区解放北路517-2 距离市中心约6215米 </span>
                          <span class="">lilidh</span>
                         <span class="">联系方式1358021036</span>
                    </p>           
             </div>
            <p class="set_defaultAddr">设为默认地址</p>
            <p class="defaultAddr" style="display:none;">默认地址</p>
            <p class="add1_edit">[修改]</p>
        </div>
    	<div class="unit clearfix">
        	<div class="add1_input">
                    <input type="radio" class="" />
                    <p>                
                         <span class="">上海市闵行区绿地科技岛广场A座2606室</span>
                          <span class="">lilidh</span>
                         <span class="">联系方式059123820</span>
                    </p>           
             </div>
            <p class="set_defaultAddr">设为默认地址</p>
            <p class="defaultAddr" style="display:none;">默认地址</p>
            <p class="add1_edit">[修改]</p>
        </div>
    	<div class="unit clearfix">
        	<div class="add1_input">
                    <input type="radio" class="" />
                    <p>                
                         <span class="">广东广州市白云区三元里大道909至911号粤海商务中心806房</span>
                          <span class="">lilidh</span>
                         <span class="">联系方式15830125403</span>
                    </p>           
             </div>
            <p class="set_defaultAddr">设为默认地址</p>
            <p class="defaultAddr" style="display:none;">默认地址</p>
            <p class="add1_edit">[修改]</p>
        </div>
        
        -->
        
        
        
        <div class="new_addr add_addr" style="display:">
                <div class="unit clearfix">
                    <div class="add1_input add">
                            <a href="javascript:void(0);" class="addNewAddress"></a>                                  
                     </div>
                </div>
                <div class="new_form" style="display:none;">
                	<div class="info" >
                    	<p check=true>
                        	<b class="red_f">*</b>
                            <label for="addressPid">所在地：</label>
                            <select id="addressPid">
                            	<option value="0">请选择省份</option>
                            	<option value="1">北京</option>
                            	<option value="2">天津</option>
                            	<option value="3">河北</option>
                            	<option value="4">山西</option>
                            	<option value="5">内蒙古自治区</option>
                            
                            </select>
                            <select id="addressCid">
                            	<option value="0">请选择城市</option>
                            	<option value="6">辽宁</option>
                            	<option value="2">天津</option>
                            	<option value="3">河北</option>
                            	<option value="4">山西</option>
                            	<option value="5">内蒙古自治区</option>
                            </select>
                            <select id="addressDid">
                            	<option value="0">请选择区县</option>
                            		
                            	<option value="6">辽宁</option>
                            	<option value="2">天津</option>
                            	<option value="3">河北</option>
                            	<option value="4">山西</option>
                            	<option value="5">内蒙古自治区</option>
                            	<option value="6">辽宁</option>
                            </select>
                            
                        </p>
                    	<p check=false>
                        	<b class="red_f">*</b>
                            <label for="addressStreet">街道地址：</label>
                            <input id="addressStreet" type="text" class="s_ipt" value="">
                            <span style="display: none"></span>
                        </p>
                    	<p check=false>
                        	<b class="red_f">*</b>
                            <label for="addressPost">邮政编码：</label>
                            <input id="addressPost" type="text" class="s_ipt post" value="">
                            <span style="display: none"></span>
                        </p>
                    	<p check=false>
                        	<b class="red_f">*</b>
                            <label for="addressUser">收件人：</label>
                            <input id="addressUser" type="text" class="s_ipt receiver" value="">
                            <span style="display: none"></span>
                        </p>
                    	<p check=false>
                        	<b class="red_f">*</b>
                            <label for="addressTel">联系电话：</label>
                            <input id="addressTel" type="text" class="s_ipt telphone" value="">
                            <span style="display: none"></span>
                        </p>
                    </div>
                	<div class="btns">
                    	<div class="left_f">
                        	<a href="javascript:void(0);" class="addressBtn yBtn">保存</a><a class="addressBtn nBtn" href="javascript:void(0);">取消</a>
                        </div>
                        <!--  
                    	<div class="set_default">
                            <input id="" type="checkbox" class="">
                            <label for="">设为默认</label>
                        </div>
                        -->
                    </div>
                </div>               
         </div>
         
         <!-- 修改 -->
         
         
          <div class="new_addr modify_addr" style="display:none">
                <div class="unit clearfix">
                    <div class="add1_input add">
                            <a href="javascript:void(0);" class="addNewAddress"></a>                                  
                     </div>
                </div>
                <div class="new_form" style="display:none;">
                	<div class="info modifyinfo" >
                    	<p check=true>
                        	<b class="red_f">*</b>
                            <label for="addressPid">所在地：</label>
                            <select id="modifyaddressPid">
                            	<option value="0">请选择省份</option>
                            	<option value="1">北京</option>
                            	<option value="2">天津</option>
                            	<option value="3">河北</option>
                            	<option value="4">山西</option>
                            	<option value="5">内蒙古自治区</option>
                            
                            </select>
                            <select id="modifyaddressCid">
                            	<option value="0">请选择城市</option>
                            	<option value="6">辽宁</option>
                            	<option value="2">天津</option>
                            	<option value="3">河北</option>
                            	<option value="4">山西</option>
                            	<option value="5">内蒙古自治区</option>
                            </select>
                            <select id="modifyaddressDid">
                            	<option value="0">请选择区县</option>
                            		
                            	<option value="6">辽宁</option>
                            	<option value="2">天津</option>
                            	<option value="3">河北</option>
                            	<option value="4">山西</option>
                            	<option value="5">内蒙古自治区</option>
                            	<option value="6">辽宁</option>
                            </select>
                            
                        </p>
                    	<p check=true>
                        	<b class="red_f">*</b>
                            <label for="addressStreet">街道地址：</label>
                            <input id="modifyaddressStreet" type="text" class="s_ipt" value="">
                            <span style="display: none"></span>
                        </p>
                    	<p check=true>
                        	<b class="red_f">*</b>
                            <label for="addressPost">邮政编码：</label>
                            <input id="modifyaddressPost" type="text" class="s_ipt post" value="">
                            <span style="display: none"></span>
                        </p>
                    	<p check=true>
                        	<b class="red_f">*</b>
                            <label for="addressUser">收件人：</label>
                            <input id="modifyaddressUser" type="text" class="s_ipt receiver" value="">
                            <span style="display: none"></span>
                        </p>
                    	<p check=true>
                        	<b class="red_f">*</b>
                            <label for="addressTel">联系电话：</label>
                            <input id="modifyaddressTel" type="text" class="s_ipt telphone" value="">
                            <span style="display: none"></span>
                        </p>
                    </div>
                	<div class="btns">
                    	<div class="left_f">
                        	<a href="javascript:void(0);" class="addressBtn modifyyBtn">保存</a><a class="addressBtn nBtn" href="javascript:void(0);">取消</a>
                        </div>
                        <!--  
                    	<div class="set_default">
                            <input id="" type="checkbox" class="">
                            <label for="">设为默认</label>
                        </div>
                        -->
                    </div>
                </div>               
         </div>
         
         
         
         
         
         
         
         
         
         
    </div>
<!--确认订单信息--> 
<?php
    // echo print_r($myConorderBaseInfo);
    // echo count($myConorderBaseInfo);
?>
	<p class="label_info">确认订单信息</p>
    <div class="order clearfix">
           <table cellpadding="0" cellspacing="0">
           		<thead>
                	<tr>
                    	<th width="380px">商品</th>
                    	<th width="200px">商品信息</th>
                    	<th width="134px">数量</th>
                    	<th width="150px">单价（元）</th>
                    	<th class="">小计</th>
                    </tr>
                </thead>
 <?php 
 
      foreach ($myConorderBaseInfo as $key=>$productItem){
      	
  ?>               
  				<tbody>
					<tr class="goods" cartId=<?php echo $productItem['cart_id']?>>
                        <td class="content">
                        	<a href=../proinfo/proinfo?productId=<?php echo $productItem['product_id']?> target="_blank">
                       	    	<img src="<?php              	
                    						$img_name=explode('.', $productItem['img_path']);
                    						echo $img_name[0].'80x80.'.$img_name[1];                  	
                    	?> "/>
                                <span><?php echo $productItem['product_title_cn']; ?></span> 
                            </a>
                        </td>

 						<td class="attribute">
 						<?php 
                        	$sku_name1=$productItem['sku_name'];                        	
                        	$sku_name2=explode('|', $sku_name1);
                       
	                        	foreach ($sku_name2 as $key2=>$sku_name3){
                                   
		                        		$sku_name=explode(':', $sku_name3);                      		
		                                echo "<span>$sku_name[0]：$sku_name[1]</span>";
		                                    
	                               
	                        	}
                        	
                        	?>							
                        </td>
                        <td class="qty" cartId=<?php echo $productItem['cart_id']?>><?php echo $productItem['qtynum']; ?></td>
                        <td class="price" cartId=<?php echo $productItem['cart_id']?>><?php echo $productItem['sales_price']; ?></td>
                        <td class="cart_alcenter" cartId=<?php echo $productItem['cart_id']?>>1194.36</td>
                      </tr>
                  </tbody>
<?php 
      }

 ?>              
                
                
                
                <!--  
                <tbody>
             		 <tr class="goods">
                        <td class="content">
                        	<a href="javascript:void(0);" target="_blank">
                       	    	<img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgConorder/TB1xX_!!0-item_pic.jpg_80x80.jpg"/>
                                <span>【沐玄】2014冬新款女装韩版圆领长袖针织拼接几何卫衣连衣裙 G4780-1216</span> 
                            </a>
                        </td>
                        <td class="attribute">
								<span>颜色：卡其色</span>
								<span>尺码：M(适合80-110斤)</span>
                        </td>
                        <td class="">12</td>
                        <td class="">99.53</td>
                        <td class="cart_alcenter">1194.36</td>
                      </tr>
                  </tbody>
                <tbody>
             		 <tr class="goods">
                        <td class="content">
                        	<a href="javascript:void(0);" target="_blank">
                       	    	<img src="<?php //echo APP_MODULE_IMAGE_PATH?>ImgConorder/TB1xX_!!0-item_pic.jpg_80x80.jpg"/>
                                <span>【沐玄】2014冬新款女装韩版圆领长袖针织拼接几何卫衣连衣裙 G4780-1216</span> 
                            </a>
                        </td>
                        <td class="attribute">
								<span>颜色：卡其色</span>
								<span>尺码：M(适合80-110斤)</span>
                        </td>
                        <td class="">12</td>
                        <td class="">99.53</td>
                        <td class="cart_alcenter">1194.36</td>
                      </tr>
                  </tbody>
                  -->
                <tbody>
                
             		 <tr class="postage">
                        <td class="note" colspan="3">
                        	<label for="seller_mes">给卖家留言：</label>                    	
                        	<textarea id="seller_mes">选填：对本次交易的说明（建议填写已经和卖家达成一致的说明）</textarea>
                        	
                        	</label>
                        </td>
                        <td class="fare_list" colspan="2">
                        	<span class="fare">普通配送</span>
                            <select class="delivery_method">
                            	<option>快递免邮</option>
                            	<option>顺丰10.00</option>
                            	<option>EMS30.00</option>
                            	<option>申通15.00</option>
                            	<option>顺丰10.00</option>
                            </select>
                        	<span class="delivery_charge">10.00</span>
                         </td>
                      </tr>
             		 <tr class="discount_way">
                        <td class="" colspan="7">
                        		<span class="point_charge">-0.00</span>
                                <div class="point_way">
                                	<div class="point_box clearfix">
                                    	<input type="checkbox" class="toggle_point" id="use_point"/>
                                        <label for="use_point" class=""> 使用优惠券：</label>
                                        <input type="text" class="point_input" value=""/>
                                    </div>
                                	<div class="point_tip">(您有1张，可用 1张)</div>
                                </div>
                                <div class="point_way">
                                	<div class="point_box clearfix">
                                    	<input type="checkbox" class="toggle_point" id="use_point"/>
                                        <label for="use_point" class="">使用积分：</label>
                                        <input type="text" class="point_input" value=""/>
                                    </div>
                                	<div class="point_tip">(您有1000积分，可用 1000分)</div>
                                </div>
                         </td>
                      </tr>
                  </tbody>
                  <tbody>
             		 <tr class="total_fare">
                     	<td class="" colspan="7">
                        	<span class="userFare">合计：</span>
                        	<span class="userPrice">￥2398.72</span>
                        </td>
                      </tr>
                  </tbody>
 <?php 
 
	 foreach ($myAddress as $addressItem){
 
 			if($addressItem['status']==100000){
?>
                <tbody class="havaAddress">
             		 <tr class="footer_address">
                     	<td class="" colspan="7">
                        	<div class="clearfix">
                        		<dl class="footer_addr_box clearfix">
                        			<dt class="addr_title">寄送至：</dt>
                        			<dd class="addr_detail"><?php echo $addressItem['province']." ".$addressItem['city']." ".$addressItem['district']." ".$addressItem['address']?></dd>
                            	</dl>
                        		<dl class="footer_addr_box clearfix">
                        			<dt class="addr_title">收货人：</dt>
                        			<dd class="addr_detail"><span class="username"><?php echo $addressItem['username'];?></span>&nbsp<span class="telphone"><?php echo $addressItem['tel'];?></span></dd>
                            	</dl>                           	
                             </div>
                             
                        </td>
                      </tr>
                  </tbody>
<?php 
			 }
	}
 ?>              <tbody class="newAddress" style="display: none">
             		 <tr class="footer_address">
                     	<td class="" colspan="7">
                        	<div class="clearfix">
                        		<dl class="footer_addr_box clearfix">
                        			<dt class="addr_title">寄送至：</dt>
                        			<dd class="addr_detail newaddr_detail"><span class="province"></span><span class="city"></span><span class="district"></span><span class="address"></span></dd>
                            	</dl>
                        		<dl class="footer_addr_box clearfix">
                        			<dt class="addr_title">收货人：</dt>
                        			<dd class="addr_detail"> <span class="newusername"></span>&nbsp<span class="newtelphone"></span></dd>
                            	</dl>                       
                             </div>
                        </td>
                      </tr>
                  </tbody>   
                  
                  
                  <tfoot>
             		 <tr class="">
                     	<td class="" colspan="7">
                        	<a href="javascript:void(0);" class="cart_surebtn"></a>
                        	<span class="goodsSum">￥2398.72</span>
                            <div class="art_pregray"><span class="conor_lastinfo">共有</span><span class="total_qty"><?php echo count($myConorderBaseInfo); ?></span></><span class="conor_lastinfo">件商品，总计(免运费)：</span></div>
                            <a href="javascript:void(0);" class="cart_back"><<返回购物车</a>
                        </td>
                      <tr>
                  </tfoot>
          </table>
	</div>
</div>
</div>





















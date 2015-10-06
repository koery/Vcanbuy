
<!---------con----------->
<div class="content_warp clearfix">
 <div class="w980 clearfix" style="background:#fff;margin-bottom:40px;">
    	<div class="nav_left">
        	<dl class="notice">
            	<dt><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgMyorders/yonghu.png"/></dt>
            	<dd class="username">oshidi123</dd>
            	<dd class="level"><img src="<?php echo APP_MODULE_IMAGE_PATH?>ImgMyorders/vip2.png"/></dd>
            </dl>
              <div class="mu_nav">
                    <div class="mu_nav_title">我的订单</div>
                    <ul class="mu_nav_con">
                      <li  id="myorders">全部订单</li>
                      <li id="waitingcheckout">待审核</li>
                      <li id="waitingpayment">待付款</li>
                      <li id="sending">待收货</li>
                      <li id="succeed">交易成功</li>
                      <li class="active" id="closed" >交易关闭</li>
                      
                  </ul>
              </div>
              <div class="mu_nav">
                    <div class="mu_nav_title">我的钱包</div>
                    <ul class="mu_nav_con" style="display: none">
                      <li>全部订单</li>
                      <li>代付款</li>
                      <li>待发货</li>
                      <li>待收货</li>
                      <li>交易关闭</li>
                      <li>退货退款</li>
                  </ul>
              </div>
              <div class="mu_nav">
                    <div class="mu_nav_title">优惠特权</div>
                    <ul class="mu_nav_con" style="display: none">
                      <li>全部订单</li>
                      <li>代付款</li>
                      <li>待发货</li>
                      <li>待收货</li>
                      <li>交易关闭</li>
                      <li>退货退款</li>
                  </ul>
              </div>
              <div class="mu_nav">
                    <div class="mu_nav_title">地址管理</div>
                    <ul class="mu_nav_con" style="display: none">
                      <li>全部订单</li>
                      <li>代付款</li>
                      <li>待发货</li>
                      <li>待收货</li>
                      <li>交易关闭</li>
                      <li>退货退款</li>
                  </ul>
              </div>
              <div class="mu_nav">
                    <div class="mu_nav_title">账户设置</div>
                    <ul class="mu_nav_con" style="display: none">
                      <li>全部订单</li>
                      <li>代付款</li>
                      <li>待发货</li>
                      <li>待收货</li>
                      <li>交易关闭</li>
                      <li>退货退款</li>
                  </ul>
              </div>
      </div>
      
      
      
    	<div class="nav_right">
<!--         	<h2 class="">我的订单</h2> -->
            <div class="order_title">
                <ul class="">
                  <li class="first">商品</li>
                  <li class="old_price">单价(元)</li>
                  <li class="num">数量</li>
                  <li class="aftersale">售后</li>
                  <li class="total">实付款(元)</li>
                  <li class="order_status">交易状态</li>
                  <li class="last">操作</li>
              </ul>
            </div>        
			<div class="order_con clearfix"> 
            
               <?php 
	              //print_r($MyorderBaseInfo);
	               foreach($MyorderBaseInfo as $key=>$MyorderBaseInfoItem){
	               	
	                      
						$numOfCartId =  count($MyorderBaseInfoItem['cart_id']);						
						if($numOfCartId == 1){
							?>

						<div class="order_list">
                 		<table>
                    	 <tbody>
                          <tr  class="table_header">
                            <td colspan="7">
                                <div class="order_info">
                                    <span class="no">订单编号：<?php echo $MyorderBaseInfoItem['order_no']?></span>
                                    <span class="deal_time">成交时间：<?php echo $MyorderBaseInfoItem['created']?></span>
                                </div>
                            </td>
                          </tr>
                       <tr class="order_item">
                            <td class="first">
                                <a href="javascript:void(0);" class="pic"><img src=" <?php			                    	
			                    	$img_name=explode('.', $MyorderBaseInfoItem['cart_id'][0]['img_path']);
			                    	echo $img_name[0].'60x60.'.$img_name[1];                  	
			                    	?>"/></a>
                                <div class="des">
                                  <p class="item_name"><a href=../proinfo/proinfo?productId=<?php echo $MyorderBaseInfoItem['cart_id'][0]['product_id']?> target="_blank"> <?php echo $MyorderBaseInfoItem['cart_id'][0]['product_title_cn']?></a></p>
                                 <?php 
                                 
		                        	$sku_name1=$MyorderBaseInfoItem['cart_id'][0]['sku_name'];                        	
		                        	$sku_name2=explode('|', $sku_name1);
		                       
			                        	foreach ($sku_name2 as $key2=>$sku_name3){
		                                   
				                        		$sku_name=explode(':', $sku_name3);                      		
				                               
				                                echo "<p class='item_attr'>$sku_name[0]：$sku_name[1]</p>" ;   
			                               
			                        	}
                        	
                        		?>		
                                  
                              </div>
                         </td>
                            <td class="old_price"><?php echo $MyorderBaseInfoItem['cart_id'][0]['sales_price']?></td>
                            <td class="number"><?php echo $MyorderBaseInfoItem['cart_id'][0]['qtynum']?></td>
                            <td class="aftersale">&nbsp;</td>
                            <td class="total"><?php echo $MyorderBaseInfoItem['order_total_price']?></td>
                            <td class="order_status">
                                <p class="s_success tradingStatus" orderId=<?php echo $MyorderBaseInfoItem['order_id']?>><?php echo $MyorderBaseInfoItem['status_cn']?></p>
                                <p><a href="javascript:void(0);" class="red_f" orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>订单详情</a></p>
                            </td>
                            <td class="last">
                             <?php 
                            	
                            	if($MyorderBaseInfoItem['status']==10000){                            
                            ?>		                            
		                            <a href="javascript:void(0);" class="cancelMyOrder"  orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>取消订单</a>
		                    <?php 
                            	}else if($MyorderBaseInfoItem['status']==20000){                            
                            ?>
		                            <a href="javascript:void(0);" class="payment"  orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>付款</a>
		                            <a href="javascript:void(0);" class="cancelMyOrder"  orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>取消订单</a>
		                    <?php 
                            	}
                            ?>
                            </td>
                          </tr>
                      </tbody>
              		 </table>
               </div>


						<?php 
						}else{
							
							
						?>
							<div class="order_list">
		                 		<table>
		                    	 <tbody>
		                    	 
		                    	 
		                          <tr  class="table_header">
		                            <td colspan="7">
		                                <div class="order_info">
		                                    <span class="no">订单编号：<?php echo $MyorderBaseInfoItem['order_no']?></span>
		                                    <span class="deal_time">成交时间：<?php echo $MyorderBaseInfoItem['created']?></span>
		                                </div>
		                            </td>
		                          </tr>
		                          
		                         <?php 
		                         
                                    
			                         for($i=0;$i<$numOfCartId;$i++){
			                         		
			                         	if($i == 0){
			                       ?>  		
												<tr class="order_item segment">
					                            <td class="first">
					                                <a href="javascript:void(0);" class="pic"><img src="		                                
					                                <?php
								                    	
								                    	$img_name=explode('.', $MyorderBaseInfoItem['cart_id'][0]['img_path']);
								                    	echo $img_name[0].'60x60.'.$img_name[1];                  	
								                    	?>"/></a>
					                                <div class="des">
					                                  <p class="item_name"><a href=../proinfo/proinfo?productId=<?php echo $MyorderBaseInfoItem['cart_id'][0]['product_id']?> target="_blank"> <?php echo $MyorderBaseInfoItem['cart_id'][0]['product_title_cn']?></a></p>
					                                  <?php 
                                 
							                        	$sku_name1=$MyorderBaseInfoItem['cart_id'][0]['sku_name'];                        	
							                        	$sku_name2=explode('|', $sku_name1);
							                       
								                        	foreach ($sku_name2 as $key2=>$sku_name3){
							                                   
									                        		$sku_name=explode(':', $sku_name3);                      		
									                               
									                                echo "<p class='item_attr'>$sku_name[0]：$sku_name[1]</p>" ;   
								                               
								                        	}
					                        	
					                        		?>	
					                              </div>
					                            </td>
					                            <td class="old_price"><?php echo $MyorderBaseInfoItem['cart_id'][0]['sales_price']?></td>
					                            <td class="number"><?php echo $MyorderBaseInfoItem['cart_id'][0]['qtynum']?></td>
					                            <td class="aftersale">&nbsp;</td>
					                            <td class="total" rowspan=<?php echo $numOfCartId?>><?php echo $MyorderBaseInfoItem['order_total_price']?></td>
					                            <td class="order_status" rowspan=<?php echo $numOfCartId?>>
					                                <p class="s_success tradingStatus" orderId=<?php echo $MyorderBaseInfoItem['order_id']?>><?php echo $MyorderBaseInfoItem['status_cn']?></p>
					                                <p><a href="javascript:void(0);" class="red_f" orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>订单详情</a></p>
					                            </td>
					                            <td class="last" rowspan=<?php echo $numOfCartId?>>
					                             <?php 
						                            	
						                            	if($MyorderBaseInfoItem['status']==10000){                            
						                            ?>		                            
								                            <a href="javascript:void(0);" class="cancelMyOrder"  orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>取消订单</a>
								                    <?php 
						                            	}else if($MyorderBaseInfoItem['status']==20000){                            
						                            ?>
								                            <a href="javascript:void(0);" class="payment"  orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>付款</a>
								                            <a href="javascript:void(0);" class="cancelMyOrder"  orderId=<?php echo $MyorderBaseInfoItem['order_id']?>>取消订单</a>
								                    <?php 
						                            	}
						                            ?>
					                            </td>
					                         </tr>

									<?php 
			                         	}else{
			                         		
									?>
											 <tr class="order_item">
					                            <td class="first">
					                                <a href="javascript:void(0);" class="pic"><img src=" <?php
								                    	
								                    	$img_name=explode('.', $MyorderBaseInfoItem['cart_id'][0]['img_path']);
								                    	echo $img_name[0].'60x60.'.$img_name[1];                  	
								                    	?>"/></a>
					                                <div class="des">
					                                  <p class="item_name"><a href=../proinfo/proinfo?productId=<?php echo $MyorderBaseInfoItem['cart_id'][$i]['product_id']?> target="_blank"> <?php echo $MyorderBaseInfoItem['cart_id'][$i]['product_title_cn']?></a></p>
					                                  <?php 
                                 
							                        	$sku_name1=$MyorderBaseInfoItem['cart_id'][$i]['sku_name'];                        	
							                        	$sku_name2=explode('|', $sku_name1);
							                       
								                        	foreach ($sku_name2 as $key2=>$sku_name3){
							                                   
									                        		$sku_name=explode(':', $sku_name3);                      		
									                               
									                                echo "<p class='item_attr'>$sku_name[0]：$sku_name[1]</p>" ;   
								                               
								                        	}
					                        	
					                        		?>	
					                              </div>
					                            </td>
					                            <td class="old_price"><?php echo $MyorderBaseInfoItem['cart_id'][$i]['sales_price']?></td>
					                            <td class="number"><?php echo $MyorderBaseInfoItem['cart_id'][$i]['qtynum']?></td>
					                            <td class="aftersale">&nbsp;</td>
					                         </tr>



									<?php 
			                         	}
		                         	}
		                         ?> 
		                          
		                         
		                      </tbody>                                                              
		              		 </table>
		               </div>
               

						<?php 
							
						} 
	
	
	               }
               ?>
    	
           </div>
        </div>
    </div>
</div>
     

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VCANBUY后台管理系统</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />
</head>


<body>


<div class="container clearfix">   
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">产品属性列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="../products/addproductsku"><i class="icon-font"></i>新增产品属性</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                
                <?php 
//print_r($proImgDetail);
?>
    <p>详情--显示图片对照表</p>
    
    
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>detail_id</th>
                            <th>产品ID</th>
                            <th>显示大图</th>
                            <th>详情小图</th>                                                  
                            <th colspan=3>操作</th>
                        </tr>
                       
                        <?php 					
						  		foreach ( $proImgDetail as $a ) {
						  	?>
						  <tr>
					            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
	                            <td>
	                                <input name="ids[]" value="59" type="hidden">
	                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
	                            </td>	  
						        <td><?php echo $a['id']?></td>
						        <td><?php echo $a['product_id']?></td>	
							    <td><img src="/Upload/<?php echo $a['imgshowpath']?>" height="60" /> </td> 
								<td><img src="/Upload/<?php echo $a['imgdetailpath']?>" height="30" /> </td>
								<td><a href="deletedetail?id=<?php echo $a['id']?>&product_id=<?php echo $a['product_id']?>" onclick="return confirm('您确定删除吗？')" >删除</a></td>
																		
							</tr>
						  <?php 
								  		 }
						   
					  ?>
                    </table>
                    <a href="adddetail?id=<?php echo $a['product_id']?>" >增加</a>
 
                </div>
            </form>
            
            
            
        </div>
        
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="../products/addproductsku"><i class="icon-font"></i>新增产品属性</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                

    <?php 
//     print_r($proInfoSku);
    print_r($sku_code);
   print_r($sku_name);
//     print_r($name);
//     print_r($code);
//     print_r($sku_code4);
//    print_r($proImgSelect);
    ?>	
    <p>属性表</p>
	
	<table class="result-tab" width="100%">
		  <tr>
		   <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
		   <th>排序</th>
		    <th>SKU_ID</th>
		    
		    <?php 
		    $numofname = count($name);
		    foreach ($name as $key=>$data){
		    	
				echo "  <th>".$data."</th>";
				 
				
		    }
		    
		    
		    ?>
<!-- 		    <td>颜色</td> -->
<!-- 		    <td>显示大图片</td> -->
<!-- 		    <td>选择小图片</td> -->
<!-- 		    <td >尺寸</td> -->
<!-- 			<td>显示大图片</td> -->
<!-- 		    <td>选择小图片</td> -->
		    <th>price</th>
		    <th>number</th>
		    <th colspan=2>操作</th>
		  </tr>
		  <?php 
		  
		  foreach ($proInfoSku as $key=>$data){
		  	
				echo " <tr>";
    		?>
    		                 <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
	                            <td>
	                                <input name="ids[]" value="59" type="hidden">
	                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
	                            </td>
			<?php 
					   echo "<td>".$data['id']."</td>";
				foreach ($data['sku_name_cn'] as $key1=>$data1){
					
						echo " <td>".$data1."</td>";
						//echo "<td>&nbsp</td>";
						//echo "<td>&nbsp</td>";
					
						
// 						   $flag=false;
// 							foreach ($proImgSelect as $key3=>$data3){
						
								
// 								if($data3['property']== $data['sku_code'][$key1]){
// 					                $flag=true;
// 									if(!empty($data3['imgshowpath'])){
						
// 										echo  "<td><img src=/Upload/".$data3['imgshowpath']." height='60' /></td>";
// 									}else {
										
// 										echo "<td>--</td>";
// 									}
										
// 									if(!empty($data3['imgselectpath'])){
											
// 										echo  "<td><img src=/Upload/".$data3['imgselectpath']." height='30' /></td>";
// 									}else {
										
// 										echo "<td>--</td>";
// 									}
								
// 								}						
// 							}	
									
// 						if(!$flag){
							
//                             echo "<td>--</td>";
//                             echo "<td>--</td>";
// 						}

				}
				
				
				
				
					   
				echo "  <td>".$data['sales_price']."</td>
						<td>".$data['qty']."</td>
						<td><a href='updateproductskuitem?id=".$data['id']."&product_id=".$a['product_id']."' target='blank'>修改</a></td>
					    <td><a href='deleteproductskuitem?id=".$data['id']."&product_id=".$a['product_id']."'  target='blank' >删除</a></td>
					  </tr>";


		  }
		  ?>
		
 
      </table>	
	<a href="addproductskuitem?id=<?php echo $a['product_id']?>"  target="blank">增加</a>

	
	
	<p>别名表</p>
	<?php
	 print_r($proInfoSkuRemark);
	?>
	<table   class="result-tab" width="100%">
		  <tr>	   
		    				 <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
		                    <th>排序</th>
                            <th>remark_id</th>
                            <th>product_id</th>
                            <th>sku_code</th>
                            <th>sku_name</th>       
                             <th>remark_cn</th>                                             
                            <th colspan=2>操作</th>
		  </tr>
		 
 			   
		    <?php 
		    
		    foreach ($proInfoSkuRemark as $key=>$data){
		    ?>	
		    	<tr>
				            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>	
		    	  <td><?php echo $data['id']?></td>
		    	  <td><?php echo $data['product_id']?></td>
		    	  <td><?php echo $data['sku_code']?></td>
		    	  <td><?php echo $data['sku_name']?></td>
		    	  <td><?php echo $data['remark_cn']?></td>
		    	 <td><a href="updateproinfoskuremark?id=<?php echo $data['id']?>&product_id=<?php echo $a['product_id']?>" target='blank'>修改</a></td>
				 <td><a href="deleteproinfoskuremark?id=<?php echo $data['id']?>&product_id=<?php echo $a['product_id']?>" target='blank' >删除</a></td>	   
		         </tr>
		    <?php 
		    }?>
		  
    </table>
    
	<a href="addproinfoskuremark?product_id=<?php echo $a['product_id']?>" target='blank' >新增别名</a> 
	
	
	 <p>属性-图片对照表</p>
	
	<table class="result-tab" width="100%">
		 
		<tr>
		    <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
		     <th>排序</th>
		    <th >id</th>
			<th >产品ID</th>
			<th >属性值</th>
			<th >显示大图</th>
			<th >选择小图</th>
			
			<th colspan=1>操作</th>
		
			
		</tr>
	  <?php foreach ( $proImgSelect as $a ) {?>
	  <tr>
			 <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
               <td>
                 <input name="ids[]" value="59" type="hidden">
                 <input class="common-input sort-input" name="ord[]" value="0" type="text">
               </td>
	        <td><?php echo $a['id']?></td>
	        <td><?php echo $a['product_id']?></td>	
	        <td><?php echo $a['name']?></td>	
		    <td><img src="<?php 
		    		if($a['imgshowpath'])
		                echo "/Upload/".$a['imgshowpath'];
		    			else echo "--";
		    		
		    		
		    		?>" height="60" /> </td> 
			<td><?php 
					if($a['imgselectpath'])
		                echo "<img src='/Upload/".$a['imgselectpath']."' height='30' />";
		    			else echo $a['name'];
		    		?> </td>
			<td><a href="deleteselect?id=<?php echo $a['id']?>&product_id=<?php echo $a['product_id']?>" onclick="return confirm('您确定删除吗？')" >删除</a></td>
			
		</tr>
	  <?php }?>
 
      </table>
	
		
	<a href="addselect?id=<?php echo $a['product_id']?>" target="blank">增加</a>
	  
	
           </div>
           </form>

        </div>
        
        
        
        
        
        <div class="list-page"> 2 条 1/1 页</div>
    </div>
    
</div>

 

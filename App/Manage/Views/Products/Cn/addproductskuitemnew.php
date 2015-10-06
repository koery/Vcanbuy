
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VCANBUY后台管理系统</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo APP_MODULE_JS_PATH?>manager.js" type="text/javascript"></script>
</head>
<body>



<div class="container clearfix">
    
   
    <div class="main-wrap">
      <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../products/productslist">产品列表</a><span class="crumb-step">&gt;</span><span>新增产品属性</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="addsavaproductskuitem" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody><tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                        </tr>
                          					
                       <tr>
					    <th>productID</th>
					    <td><?php echo $product_id?></td>					   
					  </tr>
					   <?php 
							  print_r($addproductskuitemdata);
							  print_r($sku_namenew);
							  print_r($sku_codenew);
							  if($addproductskuitemdata){
							  foreach ($sku_codenew as $keycode=>$datacode)
							  	foreach ($sku_namenew as $keyname=>$dataname){
									if($keycode==$keyname){
							  ?>
							   <tr>
							    <th><i class="require-red">*</i>属性类别:<?php echo $dataname?></th>							    
							    <td >
								<select name="name[]">
								 	<option value=""></option>
								 	<?php
								 	
								 		foreach ($addproductskuitemdata as $key=>$data) {
											if($key==$datacode){
												foreach ($data as $key1=>$data1){
													
													echo '<option value="'.$data1['id'].'">'.$data1['name'].'</option>';
												}
												
											}
								 		} 
								 	
								 	?>
								 </select>
							    </td>
							  </tr>
							  <?php 
							      }
							    }
							  ?>						  		 
                    
							   <tr>
							     <th><i class="require-red">*</i>价格</th>							    
							    <td><input type="text" name="price" id="price" value="" size="50">
							   </td>
							  </tr>
							 <tr>
							     <th><i class="require-red">*</i>库存</th>							    
							    <td><input type="text" name="qty" id="qty" value="" size="50">
							   </td>
							  </tr>
							  							
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>
                 <?php 
				  }
				  ?>
               
            </div>
        </div>

    </div>
    <!--/main-->
</div>








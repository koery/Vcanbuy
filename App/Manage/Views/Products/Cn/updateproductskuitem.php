
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

<?php
print_r($proInfoSku);
print_r($sku_code);
print_r($sku_name);
$sku_codenew=array_values($sku_code);
$sku_namenew=array_values($sku_name);

?>

<div class="container clearfix">
    
   
    <div class="main-wrap">
      <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../products/productslist">产品列表</a><span class="crumb-step">&gt;</span><span>新增产品属性</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="savaupdateproductskuitem" method="post" id="myform" name="myform" enctype="multipart/form-data">
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
					    <td><?php echo $_GET['product_id']?></td>					   
					  </tr>
					  <?php 
	   // echo $_GET['id'];
		foreach ($proInfoSku as $key=>$data){
			
				if($data['id']==$_GET['id']){
					
					foreach ($data['sku_code'] as $keycode=>$datacode)
						foreach ($data['sku_name_cn'] as $keyname=>$dataname){
						
							if($keycode==$keyname){
?>								
								<tr>
									<th >属性类别：
									<?php 
									foreach ($sku_name as $key1=>$data1){
										if(in_array($dataname, $data1)){
											
											echo $key1;
										}

									}									
									?></th>
									    <td >
										<select name="name[]" >
										 	<option value="<?php echo $datacode?>"><?php echo $dataname?></option>
										 	<?php
										 	
										 	foreach ($sku_namenew as $key2=>$data2){
										 		if(in_array($dataname, $data2)){										 				
										 			foreach ($data2 as $key3=>$data3){
										 				echo '<option value="'.$sku_codenew[$key2][$key3].'">'.$data3.'</option>';

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
							    <td><input type="text" name="price" id="price" value="<?php echo $data['sales_price']?>" size="50">
							   </td>
							  </tr>
							 <tr>
							     <th><i class="require-red">*</i>库存</th>							    
							    <td><input type="text" name="qty" id="qty" value="<?php echo $data['qty']?>" size="50">
							   </td>
							  </tr>
<?php 				}
								
		}	
	?>
							  							
                            <tr>
                                <th></th>
                                <td>
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>" />
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                                </td>
                            </tr>
                        </tbody></table>
                </form>               
               
            </div>
        </div>

    </div>
    <!--/main-->
</div>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VCANBUY后台管理系统</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />
<script src="<?php echo APP_MODULE_JS_PATH?>manager.js" type="text/javascript"></script>

<script src="<?php echo APP_JS_PUBLIC_PATH?>jquery-1.8.3.min.js"type="text/javascript"></script>
<script src="<?php echo APP_JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo APP_MODULE_JS_PATH?>banner.js"type="text/javascript"></script>
<script src="<?php echo APP_JS_PUBLIC_PATH?>uploadify/jquery.uploadify.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="<?php echo APP_JS_PUBLIC_PATH?>uploadify/uploadify.css" />
<script src="<?php echo APP_JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.js"></script>
<link href="<?php echo APP_JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
<link href="<?php echo APP_MODULE_CSS_PATH?>style.css" rel="stylesheet">
<script src="<?php echo APP_JS_PUBLIC_PATH?>upload.js"></script>
</head>
<body>


<?php 
    	 print_r($category1data);
    	 print_r($category2data);
    	 print_r($category3data);
    	
    	?>
<div class="container clearfix">
    
   
    <div class="main-wrap">
      <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../products/productslist">产品列表</a><span class="crumb-step">&gt;</span><span>新增产品</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="saveaddproduct" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                        <tr>
                            <th width="120"><i class="require-red">*</i>分类：</th>
                            <td>
                                <select name="colId" id="catid" class="required">
                                    <option value="">请选择</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                        </tr>
                            <tr>
                                <th><i class="require-red">*</i>标题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="" type="text">
                                </td>
                            </tr>
                           
  							<tr>
								<th><i class="require-red">*</i>开始时间：</th>
								<td><input  class="common-text required" name="start_time" type="text" id="start_time"
									maxlength="50"
									onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})" />
								</td>
							</tr>
							
								<th><i class="require-red">*</i>结束时间：</th>
								<td><input  class="common-text required" name="end_time" type="text" id="end_time"
									maxlength="50"
									onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})" />
								</td>
							</tr>
							
							<tr>
								 <th><i class="require-red">*</i>一级目录</th>
								<td>
								<select name="category1" id="category1" class="required">
								 	<option value=""></option>
								 	<?php
								 	
								 		foreach ($category1data as $key=>$data) {							
													echo '<option value="'.$data['category_1_cn'].'">'.$data['category_1_cn'].'</option>';
																							
								 		} 
								 	
								 	?>
								 </select>
								</td>
							</tr>
							
							<tr>
								 <th><i class="require-red">*</i>二级目录</th>
								<td>
								<select name="category2" id="category2" class="required">
								 	<option value=""></option>
								 	<?php
								 	
								 		foreach ($category2data as $key=>$data) {							
													echo '<option value="'.$data['category_2_cn'].'">'.$data['category_2_cn'].'</option>';
																							
								 		} 
								 	
								 	?>
								 </select>
								</td>
							</tr>
							
							
  							<tr>
								 <th><i class="require-red">*</i>三级目录</th>
								<td>
								<select name="category3" id="category3" class="required">
								 	<option value=""></option>
								 	<?php
								 	
								 		foreach ($category3data as $key=>$data) {							
													echo '<option value="'.$data['category_3_cn'].'">'.$data['category_3_cn'].'</option>';
																							
								 		} 
								 	
								 	?>
								 </select>
								</td>
							</tr>
							
		                      <tr>
                                <th><i class="require-red">*</i>产品URL：</th>
                                <td>
                                    <input class="common-text required" id="product_url" name="product_url" size="50" value="" type="text">
                                </td>
                            </tr>     
							  <tr>
								<th><i class="require-red">*</i>图片：</th>
								<td><input type="button" name="upload" id="upload" value="上传" />
									&nbsp;</td>
							</tr>
						                        
                            
                        </tbody></table>
                        <br>
						 <table class="insert-tab" width="20%" id="tbimage">
						 <tr>
						  <th >图片</th>						  
						  <th >操作</th>
						 </tr>
						 <tbody id="fm2_table_body">
						 </tbody>
						</table>
						  
							
                                    <input class="btn btn-primary btn6 mr10" value="提交" type="submit">
                                    <input class="btn btn6" onClick="history.go(-1)" value="返回" type="button">
                               
						<?php echo $upload;?>
                </form>
            </div>
        </div>

    </div>
    <!--/main-->
</div>

<script type="text/javascript">
$( "#upload" ).click(function( event ) {
	$( "#vcb_dialog" ).dialog( "open" );
	event.preventDefault();
});
function vcb_dialog_upload(){
	var names = document.getElementsByName("vcb_dialog_filename");
	var url ='<?php echo M_UPLOAD_URL?>';
	for(var i =0;i<names.length;i++){
		//alert(names[i].value);
		addNewPersonRow(url,names[i].value);
	}
	
}
</script>


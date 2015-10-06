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



<div class="container clearfix">
    
   
    <div class="main-wrap">
      <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../teambuy/teambuy">团购列表</a><span class="crumb-step">&gt;</span><span>新增团购</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="add_save_detail_show" method="post" id="myform" name="myform" enctype="multipart/form-data">
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
                                <th><i class="require-red">*</i>产品ID：</th>
                                <td>
                                    <input class="common-text required" id="productID" name="productID" size="50" value="<?php echo $productID?>" type="text">
                                </td>
                            </tr>                                                            
						 
							  <tr>
								<th><i class="require-red">*</i>图片组：</th>
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




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
                <form action="addsavaproductsku" method="post" id="myform" name="myform" enctype="multipart/form-data">
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
							     <th><i class="require-red">*</i>父级属性类别</th>
							    <td>
								<select name="pid" id="pid" class="required">
								 	<option value=""></option>
								 	<?php
								 	
								 	foreach ($addproductskudata as $a) {
										
											echo '<option value="'.$a['id'].'">'.$a['name'].'</option>';
										
								 	} 
								 	?>
								 </select>
							    </td>
							  </tr>
  
							 
					 <tr>
					    <th><i class="require-red">*</i>子级类目(中文)</th>
					    <td><input type="text" name="name" id="name" value="" size="50">
					    </td>
					  </tr>
                        
                      <tr>
					    <th><i class="require-red">*</i>子级类目代码</th>
					    <td><input type="text" name="property" id="property" value="" size="50">
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
            </div>
        </div>

    </div>
    <!--/main-->
</div>






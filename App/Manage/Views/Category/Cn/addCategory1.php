 
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
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../manager/manager">管理员列表</a><span class="crumb-step">&gt;</span><span>新增管理员</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
                <form action="add_saveCategory1" method="post" id="myform" name="myform" enctype="multipart/form-data">
                    <table class="insert-tab" width="100%">
                        <tbody>
                            <tr>
                                <th width="120"><i class="require-red">*</i>一级类目(中文)：</th>
                                <td>
                                    <input class="common-text required" id="category_1_cn" name="category_1_cn" size="50" value="" type="text">
                                </td>
                            </tr>
                            <tr>
                                <th><i class="require-red">*</i>一级类目(泰文)：</th>
                                <td>
                                    <input class="common-text required" id="category_1_th" name="category_1_th" size="50" value="" type="text">
                                </td>
                            </tr>
  
  							 <tr>
                                <th><i class="require-red">*</i>一级类目URL：</th>
                                <td>
                                    <input class="common-text required" id="category_1_url" name="category_1_url" size="50" value="" type="text">
                                </td>
                            </tr>                                                       
						 
						    <tr>
                                <th><i class="require-red">*</i>序号：</th>
                                <td>
                                    <input class="common-text required" id="order" name="order" size="50" value="" type="text">
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






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
<script src="<?php echo APP_JS_PUBLIC_PATH?>exchange.js"></script>
</head>
<body>



<div class="container clearfix">
    
   
    <div class="main-wrap">
      <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><a class="crumb-name" href="../activity/activity">活动列表</a><span class="crumb-step">&gt;</span><span>活动更新</span></div>
        </div>
        <div class="result-wrap">
            <div class="result-content">
              <?php $a = $updateData[0];?>
                <form action="update_save" method="post" id="myform" name="myform" enctype="multipart/form-data">
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
                                <th><i class="require-red">*</i>主题：</th>
                                <td>
                                    <input class="common-text required" id="title" name="title" size="50" value="<?php echo $a['title']?>" type="title">
                                </td>
                            </tr>
                            
                           <tr>
						     <th><i class="require-red">*</i>开始时间：</th>
						    <td><input name="start_time" type="text" id="start_time" value="<?php echo $a['start_time']?>"   onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/>
						   </td>
						   </tr>
                             <tr>
						     <th><i class="require-red">*</i>结束时间：</th>
						    <td><input name="end_time" type="text" id="end_time" value="<?php echo $a['end_time']?>"   onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/>
						   </td>
						   </tr>
                            <tr>
                                <th><i class="require-red">*</i>排序：</th>
                                <td>
                                    <input class="common-text required" id="order" name="order"  value="<?php echo $a['orders']?>" >
                                </td>
                            </tr>
						   <tr>                         
						    <th><i class="require-red">*</i>语言版本：</th>
						    <td><select name="language" id="language">  	
						  	<?php 
						  		foreach ($language as $key) {
									if ($a['language'] == $key){
										echo '<option value="'.$key.'" selected="selected">'.$key.'</option>';
									}else{
						  				echo '<option value="'.$key.'">'.$key.'</option>';
						  			}
						  		}
						  	?>
						  </select></td>
						  </tr>
						  <tr>
							 <th><i class="require-red">*</i>图片：</th>
							<td><img src="<?php echo $a['img_path']?>" height="60" /> </td> 
						</tr>
                            <tr>
                                <th></th>
                                <td>
                                	<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/></div>
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





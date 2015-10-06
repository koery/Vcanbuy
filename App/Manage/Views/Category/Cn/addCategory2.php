
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>右边</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />


<script src="<?php echo APP_JS_PUBLIC_PATH?>jquery-1.8.3.min.js"type="text/javascript"></script>

<script src="<?php echo APP_JS_PUBLIC_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo APP_JS_PUBLIC_PATH?>Category2.js" type="text/javascript"></script>


</head>

<body>
<div class="con_public_up">
	<span class="upper_left_corner"></span>
    <div class="upper_center_corner">
    	<h3>新增二级目录</h3>
    </div>
    <span class="upper_right_corner"></span>
</div>
<div class="con_public_center">
	<span class="con_left_corner"></span>
    <div class="con_center_corner">
    	<div class="main">
    	
    	

<form method="POST" action="add_saveCategory2" name="myform" onsubmit="return verifyData()">

<table width="500" border="1">
  
   <tr>
    <td width="147">一级类目：</td>
    <td width="337">
	<select name="category_1_id" id="category_1_id" onchange="setOrders()">
	 	<option value=""></option>
	 	<?php
	 	//print_r($category1Date);
	 	foreach ($category1Date as $a) {
			
				echo '<option value="'.$a['category_1_id'].'">'.$a['category_1_cn'].'</option>';
			
	 	} 
	 	?>
	 </select><span id="msg_category_1_id" style="display: none">请输入一级类目</span>
    </td>
  </tr>
  
  
  <tr>
    <td>二级类目(中文)</td>
    <td><input type="text" name="category_2_cn" id="category_2_cn" value="" maxlength="50">
    <span id="msg_category_2_cn" style="display: none">请输入二级类目(中文)</span></td>
  </tr>
  <tr>
    <td>二级类目(泰文)</td>
    <td><input type="text" name="category_2_th" id="category_2_th" value="" maxlength="50">
    <span id="msg_category_2_th" style="display: none">请输入二级类目(泰文)</span></td>
  </tr>
  
   <tr>
    <td>二级类目URL</td>
    <td><input type="text" name="category_1_url" id="category_1_url" value="" maxlength="50">
    <span id="msg_category_1_url" style="display: none">请输入二级类目URL</span></td>
  </tr>
  
   <tr>
    <td>序号</td>
    <td><input type="text" name="order" id="order" value="" maxlength="50">
    <span id="msg_order" style="display: none">请输入序号</span></td>
  </tr>
</table>
<input name="submit" type="submit" value="提交" />
</form>
    	
    	</div>
    </div>
    <span class="con_right_corner"></span>
</div>
<div class="bottom_public_bottom">
	<span class="bottom_left_corner"></span>
    <div class="bottom_center_corner"></div>
    <span class="bottom_right_corner"></span>
</div>
</body>
</html>


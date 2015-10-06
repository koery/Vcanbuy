
<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>Floor2.js" type="text/javascript"></script>
<form method="POST" action="add_save" name="myform" onsubmit="return verifyData()">

<table width="500" border="1">
  <tr>
    <td width="147">一级类目：</td>
    <td width="337">
	<select name="floor_1" id="floor_1" onchange="setOrders()">
	 	<option value=""></option>
	 	<?php
	 	foreach ($floor_1 as $key => $value) {
			if ($key == get_post_value('floor_1')){
				echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
			}else{
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
	 	} 
	 	?>
	 </select><span id="msg_floor_1" style="display: none">请输入一级类目</span>
    </td>
  </tr>
  <tr>
    <td width="147">序号</td>
    <td width="337"><input type="text" name="orders" id="orders" class="input_int"></td>
  </tr>
  <tr>
    <td>二级类目(中文)</td>
    <td><input type="text" name="floor_2_cn" id="floor_2_cn" value="" maxlength="50">
    <span id="msg_floor_2_cn" style="display: none">请输入二级类目(中文)</span></td>
  </tr>
  <tr>
    <td>二级类目(泰文)</td>
    <td><input type="text" name="floor_2_th" id="floor_2_th" value="" maxlength="50">
    <span id="msg_floor_2_th" style="display: none">请输入二级类目(泰文)</span></td>
  </tr>
</table>
<input name="submit" type="submit" value="提交" />
</form>
<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>floor3.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData()">
<?php $a = $data[0];?>
<table width="500" border="1">
  <tr>
    <td width="147">一级类目：</td>
    <td width="337">
	<select name="floor_1" id="floor_1" onchange="setFloor_1()" >
	 	<option value=""></option>
	 	<?php
	 	foreach ($floor_1 as $key => $value) {
			if ($key == $a['floor_1_id']){
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
    <td>二级类目(中文)</td>
    <td> <select name="floor_2" id="floor_2" onchange="setOrders()" >
 	<option value=""></option>
 	<?php
 	foreach ($floor_2 as $key) {
		if ($key['floor_2_id'] == $a['floor_2_id']){
			echo '<option value="'.$key['floor_2_id'].'" selected="selected">'.$key['floor_2_cn'].'</option>';
		}else{
			echo '<option value="'.$key['floor_2_id'].'">'.$key['floor_2_cn'].'</option>';
		}
 	} 
 	?>
 </select>
    <span id="msg_floor_2" style="display: none">请选择二级类目(中文)</span></td>
  </tr>
  <tr>
    <td width="147">序号</td>
    <td width="337"><input type="text" name="orders" id="orders" class="input_int" value="<?php echo $a['orders']?>"></td>
  </tr>
  <tr>
    <td>三级类目(中文)</td>
    <td><input type="text" name="floor_3_cn" id="floor_3_cn" value="<?php echo $a['floor_3_cn']?>" maxlength="50">
    <span id="msg_floor_3_cn" style="display: none">请输入三级类目(中文)</span></td>
  </tr>
  <tr>
    <td>三级类目(泰文)</td>
    <td><input type="text" name="floor_3_th" id="floor_3_th" value="<?php echo $a['floor_3_th']?>" maxlength="50">
    <span id="msg_floor_3_th" style="display: none">请输入三级类目(泰文)</span></td>
  </tr>
 		 <tr>
		    <td>链接地址</td>
		    <td><input type="text" name="floor_3_url" id="floor_3_url" value="<?php echo $a['floor_3_url']?>" maxlength="50">
		    <span id="msg_floor_2_th" style="display: none">请输入链接地址</span></td>
		</tr>
		<tr>
			<td>开始时间</td>
			<td><input name="start_time" type="text" id="start_time" value="<?php echo $a['start_time']?>"
				maxlength="50"
				onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})" />
				<span id="msg_start_time" style="display: none">请选择开始时间</span></td>
		</tr>
		<tr>
			<td>结束时间</td>
			<td><input name="end_time" type="text" id="end_time" maxlength="50" value="<?php echo $a['start_time']?>"
				onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01'})" />
				<span id="msg_end_time" style="display: none">请选择结束时间</span></td>
		</tr>
</table>
<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/>
<input name="submit" type="submit" value="提交" />
</form>
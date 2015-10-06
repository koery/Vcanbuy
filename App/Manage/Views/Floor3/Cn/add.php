<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>command.js"type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>floor3.js"type="text/javascript"></script>
<form method="POST" action="add_save" name="myform"onsubmit="return verifyData()">

	<table width="500" border="1">
		<tr>
			<td width="147">一级类目：</td>
			<td width="337"><select name="floor_1" id="floor_1" onchange="setFloor_1()">
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
			<td>二级类目(中文)</td>
			<td><select name="floor_2" id="floor_2" onchange="setOrders()">
					<option value=""></option>
 	<?php
		if (! empty ( $floor_2 )) {
			foreach ( $floor_2 as $key => $value ) {
				if ($key == get_post_value ( 'floor_2' )) {
					echo '<option value="' . $key . '" selected="selected">' . $value . '</option>';
				} else {
					echo '<option value="' . $key . '">' . $value . '</option>';
				}
 			} 
		}
 	?>
 </select> <span id="msg_floor_2" style="display: none">请选择二级类目(中文)</span></td>
		</tr>
		<tr>
			<td width="147">序号</td>
			<td width="337"><input type="text" name="orders" id="orders"
				class="input_int"></td>
		</tr>
		<tr>
			<td>三级类目(中文)</td>
			<td><input type="text" name="floor_3_cn" id="floor_3_cn"
				value="" maxlength="50"> <span id="msg_floor_3_cn"
				style="display: none">请输入三级类目(中文)</span></td>
		</tr>
		<tr>
			<td>三级类目(泰文)</td>
			<td><input type="text" name="floor_3_th" id="floor_3_th"
				value="" maxlength="50"> <span id="msg_floor_3_th"
				style="display: none">请输入三级类目(泰文)</span></td>
		</tr>
		<tr>
			<td>开始时间</td>
			<td><input name="start_time" type="text" id="start_time"
				maxlength="50"
				onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})" />
				<span id="msg_start_time" style="display: none">请选择开始时间</span></td>
		</tr>
		<tr>
			<td>结束时间</td>
			<td><input name="end_time" type="text" id="end_time" maxlength="50"
				onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01'})" />
				<span id="msg_end_time" style="display: none">请选择结束时间</span></td>
		</tr>
	</table>
	<input name="submit" type="submit" value="提交" />
</form>
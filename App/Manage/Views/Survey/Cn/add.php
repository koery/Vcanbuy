<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>command.js"type="text/javascript"></script>
<center>调查问卷添加</center>
<form method="post" action = "add_save">
<table>
	<tr>
		<td>问卷名称</td>
		<td><input type="text" name = "survey_title" id= "survey_title"/></td>
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
	<tr>
	<td rowspan="2"><input type="submit" value= "提交"/></td>
	</tr>
</table>
</form>
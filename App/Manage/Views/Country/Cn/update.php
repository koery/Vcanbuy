<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>country.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData()">
<?php $a = $data[0];?>
<table width="500" border="1">
		<tr>
			<td width="147">序号</td>
			<td width="337"><input type="text" name="orders" id="orders"
				value="<?php echo $a['orders']?>" class="input_int"></td>
		</tr>
		<tr>
			<td>国家名称</td>
			<td><input type="text" name="country" id="country"
				value="<?php echo $a['country']?>" maxlength="20"> <span
				id="msg_country" style="display: none">请输入国家名称</span></td>
		</tr>
		<tr>
			<td>启用</td>
			<td><input name="status" type="checkbox" id="status" value="10000"
				<?php echo $a['status'] !='10000'?'':'checked="checked"' ?> /></td>
		</tr>
	</table>
	<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/>
	<input name="submit" type="submit" value="提交" />
</form>



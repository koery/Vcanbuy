<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/command.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData()">
<?php
	$array = $data[0];				//第一行数 
?>
<table width="500" border="1">
		<tr>
			<td width="147">序号</td>
			<td width="337"><input type="text" name="orders" id="orders"
				value="<?php echo $array['orders']?>" class="input_int"></td>
		</tr>
		<tr>
			<td>国家名称</td>
			<td><input type="text" name="country" id="country"
				value="<?php echo $array['country']?>" maxlength="20"> <span
				id="msg_country" style="display: none">请输入国家名称</span></td>
		</tr>
		<tr>
			<td>启用</td>
			<td><input name="status" type="checkbox" id="status" value="10000"
				<?php echo $array['status'] !='10000'?'':'checked="checked"' ?> /></td>
		</tr>
	</table>
	<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/>
	<input name="submit" type="submit" value="提交" />
</form>
<script language="JavaScript" type="text/jscript">
function verifyData() {
    if( document.getElementById("country").value =="") {
    	document.getElementById("msg_country").style.display ='';
		return false;
     }
    else{
    	document.getElementById("msg_country").style.display ='none';
    }

    return true;
}
</script>



<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/command.js" type="text/javascript"></script>
<form method="POST" action="add_save" name="myform" onsubmit="return verifyData()">

<table width="500" border="1">
  <tr>
    <td width="147">序号</td>
    <td width="337"><input type="text" name="orders" id="orders" value="<?php echo $data?>" class="input_int"></td>
  </tr>
  <tr>
    <td>国家名称</td>
    <td><input type="text" name="country" id="country" value="" maxlength="20">
    <span id="msg_country" style="display: none">请输入国家名称</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
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

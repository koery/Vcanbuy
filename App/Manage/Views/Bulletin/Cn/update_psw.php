<script src="<?php echo JS_MODULE_PATH?>manager.js" type="text/javascript"></script>
<form method="POST" action="update_psw_save" name="myform" onsubmit="return verifyDataPsw()">
<table width="500" border="1">
  <tr>
    <td>新密码</td>
    <td>
      <input name="psw1" type="password" id="psw1" maxlength="30" />
      <span id="msg_psw1" style="display: none">请输入新密码</span></td>
  </tr>
  <tr>
    <td>新密码确认</td>
    <td><input name="psw2" type="password" id="psw2" maxlength="30" />
    <span id="msg_psw2" style="display: none">新密码输入不相同</span></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/>

<input name="submit" type="submit" value="提交" />
</form>

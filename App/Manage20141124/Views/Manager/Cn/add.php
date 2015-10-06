
<script src="<?php echo JS_MODULE_PATH?>manager.js" type="text/javascript"></script>
<form method="POST" action="add_save" name="myform" onsubmit="return verifyData()">
<table width="500" border="1">
  <tr>
    <td>用户名：</td>
    <td><label for="username"></label>
      <input name="username" type="text" id="username" maxlength="50" />
      <span id="msg_username" style="display: none">请输入登陆用户名</span></td>
  </tr>
  <tr>
    <td>密码：</td>
    <td><input name="password" type="password" id="password" maxlength="50" />
    <span id="msg_password" style="display: none">请输入密码</span></td>
  </tr>
  <tr>
    <td>真实姓名：</td>
    <td><input name="name" type="text" id="name" maxlength="100" /></td>
  </tr>
  <tr>
    <td>email：</td>
    <td><input name="email" type="text" id="email" maxlength="100" />
    <span id="msg_email" style="display: none">E-mail地址输入有误</span></td>
  </tr>
  <tr>
    <td>性别：</td>
    <td><label for="sex"></label>
      <select name="sex" id="sex">
        <option value="男">男</option>
        <option value="女">女</option>
      </select></td>
  </tr>
  <tr>
    <td>默认语言</td>
    <td><select name="language" id="language">
      <option value="cn">cn</option>
      <option value="th">th</option>
    </select></td>
  </tr>
  <tr>
    <td>启用：</td>
   	<td><input name="status" type="checkbox" id="status" value="10000"/></td>
  </tr>
</table>
<div>用户权限：</div>
.....<br>
<input name="submit" type="submit" value="提交" />
</form>
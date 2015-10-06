
<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>products.js" type="text/javascript"></script>
<form method="POST" action="add2" name="myform" onsubmit="return verifyData1()">
<div>
产品网址：<input name="url" type="text" id="url" size="120" value="http://item.taobao.com/item.htm?spm=a217f.7301673.1998138564.3.uGr4Cz&scm=1007.10595.1649.100200300000000&pvid=eab9227c-4780-4e54-88cf-689f7cf7f7a8&id=40582704862"/>
<span id="msg_url" style="display: none">请输入产品网址</span>
</div>
<input name="submit" type="submit" value="提交" />
</form>

<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>products.js" type="text/javascript"></script>
<form method="POST" action="add2" name="myform" onsubmit="return verifyData1()">
<div>
产品网址：<input name="url" type="text" id="url" size="120" value="http://item.taobao.com/item.htm?spm=a219r.lm874.0.0.LKIpjT&id=44014760562&ns=1&abbucket=3"/>
<span id="msg_url" style="display: none">请输入产品网址</span>
</div>
<input name="submit" type="submit" value="提交" />
</form>
<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.js"></script>
<link href="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
<link href="<?php echo CSS_PUBLIC_PATH?>style.css" rel="stylesheet">
<script src="<?php echo JS_MODULE_PATH?>bulletin.js" type="text/javascript"></script>
<form method="POST" action="add_save" name="myform" onsubmit="return verifyData()">
<table width="500" border="1">
<tr>
    <td>主题：</td>
    <td><label for="class"></label>
      <input name="class" type="text" id="class" />
      <span id="msg_class" style="display: none">请输入主题</span></td>
  </tr>
  <tr>
    <td>标题：</td>
    <td><label for="title_cn"></label>
      <input name="title_cn" type="text" id="title" />
      <span id="msg_title" style="display: none">请输入标题</span></td>
  </tr>
  <tr>
    <td>正文：</td>
    <td><textarea id="editor_id" name="memo_cn" style="width:700px;height:300px;">
</textarea>
    <span id="msg_memo" style="display: none">请输入正文</span></td>
  </tr>
  <tr>
    <td>序号：</td>
    <td><input name="orders" type="text" id="orders" />
    <span id="msg_orders" style="display: none">请输入序号</span></td>
  </tr>
  <tr>
    <td>是否加粗：</td>
    <td><input name="tips" type="text" id="tips"  /></td>
  </tr>
  <tr>
    <td>是否显示：</td>
    <td><input name="diaplay" type="text" id="display"  /></td>
  </tr>
 </table>
<input name="submit" type="submit" value="提交" />
</form>
<script src="<?php echo JS_PUBLIC_PATH?>kindeditor-4.1.10/kindeditor.js"type="text/javascript"></script>
<script src="<?php echo JS_PUBLIC_PATH?>kindeditor-4.1.10/lang/zh_CN.js"type="text/javascript"></script>
<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });

var options = {
        cssPath : '<?php echo JS_PUBLIC_PATH?>kindeditor-4.1.10/examles/jquery-ui/index.css',
        filterMode : true
};
var editor = K.create('textarea[name="content"]', options);
var html = editor.html();
alert(html);
</script>

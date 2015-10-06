<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.js"></script>
<link href="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
<link href="<?php echo CSS_PUBLIC_PATH?>style.css" rel="stylesheet">
<script src="<?php echo JS_MODULE_PATH?>manager.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData()">
<?php 
    $a = $data[0];
    print_r($a);
?>
<table width="500" border="1">
  <tr>
    <td>主题：</td>
    <td><label for="title_cn"></label>
      <input name="title_cn" type="text" id="title" value=<?php echo $a['title_cn']?> />
      <span id="msg_title" style="display: none">请输入标题</span></td>
  </tr>
  <tr>
    <td>正文：</td>
    <td><textarea id="editor_id" name="memo_cn" style="width:700px;height:300px;">
    <?php echo $a['memo_cn']?>
</textarea>
    <span id="msg_memo" style="display: none">请输入正文</span></td>
  </tr>
  <tr>
    <td>序号：</td>
    <td><input name="orders" type="text" id="orders" value=<?php echo $a['orders']?> />
    <span id="msg_orders" style="display: none">请输入序号</span></td>
  </tr>
  <tr>
    <td>是否加粗：</td>
    <td><input name="tips" type="text" id="tips" value=<?php echo $a['tips']?> /></td>
  </tr>
  <tr>
    <td>开始时间</td>
	<td><input name="start_time" type="text" id="start_time"
				maxlength="50"
				value=<?php echo $a['start_time']?>
				onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})" />
				<span id="msg_start_time" style="display: none">请选择开始时间</span></td>
  </tr>
  <tr>
	<td>结束时间</td>
	<td><input name="end_time" type="text" id="end_time" maxlength="50" value=<?php echo $a['end_time']?>
				onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01'})" />
			<span id="msg_end_time" style="display: none">请选择结束时间</span></td>
 </tr>
 </table>
<input name="submit" type="submit" value="提交" />
<input type="hidden" name="bulletin_id" id="bulletin_id" value="<?php echo $_GET['bulletin_id'];?>" />
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

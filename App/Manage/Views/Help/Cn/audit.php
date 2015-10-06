<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.js"></script>
<link href="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
<link href="<?php echo CSS_PUBLIC_PATH?>style.css" rel="stylesheet">
<script src="<?php echo JS_MODULE_PATH?>manager.js" type="text/javascript"></script>
<form method="POST" action="audit_save" name="myform" onsubmit="return verifyData()">
<?php 
    $a = $data[0];
    print_r($a);
?>
<table width="500" border="1">
<tr>
    <td>主题：</td>
    <td><label for="class"></label>
      <input name="class" type="text" id="class" value=<?php echo $a['class']?> />
      <span id="msg_class" style="display: none">请输入主题</span></td>
  </tr>
  <tr>
    <td>标题：</td>
    <td><label for="title_cn"></label>
      <input name="title_cn" type="text" id="title" value=<?php echo $a['title_cn']?> />
      <span id="msg_title" style="display: none">请输入标题</span></td>
  </tr>
  <tr>
    <td>正文：</td>
    <td><input name="memo_cn" type="txt" id="memo" value=<?php echo $a['memo_cn']?> />
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
 <tr>
    <td>是否显示：</td>
    <td><input name="diaplay" type="text" id="display" value=<?php echo $a['display']?> /></td>
  </tr>
  <tr>
 </table>
<input name="submit" type="submit" value="通过" />
<!-- <button><a href=index>不通过</a></button> -->
<input type="hidden" name="help_id" id="help_id" value="<?php echo $_GET['help_id'];?>" />
</form>
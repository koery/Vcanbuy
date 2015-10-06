<script src="<?php echo JS_PUBLIC_PATH?>My97DatePicker/WdatePicker.js"type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>banner.js"type="text/javascript"></script>
<script type="text/javascript"src="<?php echo JS_PUBLIC_PATH?>uploadify/jquery.uploadify.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PUBLIC_PATH?>uploadify/uploadify.css">
<script src="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.js"></script>
<link href="<?php echo JS_PUBLIC_PATH?>jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
<link href="<?php echo CSS_PUBLIC_PATH?>style.css" rel="stylesheet">
<script src="<?php echo JS_MODULE_PATH?>upload.js"></script>

<form method="POST" action="update_save" name="myform" onsubmit="return verifyData()">
<?php $a = $data[0];?>
<table width="500" border="1">
  <tr>
    <td width="149">主题</td>
    <td width="335">
      <input name="title" type="text" id="title" maxlength="50" value="<?php echo $a['title']?>" />
      <span id="msg_title" style="display: none">请选输入标题</span>
      </td>
  </tr>
  <tr>
    <td>开始时间</td>
    <td><input name="start_time" type="text" id="start_time" value="<?php echo $a['start_time']?>"  maxlength="50"  onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',maxDate:'#F{$dp.$D(\'end_time\')||\'2020-10-01\'}'})"/>
    <span id="msg_start_time" style="display: none">请选择开始时间</span></td>
  </tr>
  <tr>
    <td>结束时间</td>
    <td><input name="end_time" type="text" id="end_time" value="<?php echo $a['end_time']?>" maxlength="50"  onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm',minDate:'#F{$dp.$D(\'start_time\')}',maxDate:'2020-10-01'})"/>
    <span id="msg_end_time" style="display: none">请选择结束时间</span></td>
  </tr>
  <tr>
    <td>banner类型</td>
    <td><select name="type" id="type">
		<option value=""></option> 
  	<?php 
  		foreach ($type as $key => $value) {
			if ($a['type'] == $key){
				echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
			}else{
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
  		}
  	?>
	</select><span id="msg_type" style="display: none">请选择banner类型</span></td>
  </tr>
  <tr>
    <td>语言版本</td>
    <td><select name="language" id="language">
  	<option value=""></option> 
  	<?php 
  		foreach ($language as $key) {
			if ($a['language'] == $key){
				echo '<option value="'.$key.'" selected="selected">'.$key.'</option>';
			}else{
  				echo '<option value="'.$key.'">'.$key.'</option>';
  			}
  		}
  	?>
  </select><span id="msg_language" style="display: none">请选择语言版本</span></td>
  </tr>
	<tr>
		<td>图片</td>
		<td><input type="button" name="upload" id="upload" value="上传" /></td>
	</tr>
</table>
<table border="1" id="tbimage">
 <tr>
  <td >图片</td>
  <td > 操作</td>
 </tr>
 <tbody id="fm2_table_body">

 </tbody>
</table>
 <script type="text/javascript">
 <?php foreach ($images as $img) { 
 	echo "addNewPersonRow('".M_UPLOAD_URL."','".$img['image_path']."');";
 }
 ?>
 </script>


<div id="filelist"></div>
<div id="bar"></div>

<input type="submit" name="button" id="button" value="提交" />
<input type="hidden" name="id" id="id" value="<?php echo $_GET['id'];?>" />
</form>
<?php echo $upload;?>
<script type="text/javascript">

$( "#upload" ).click(function( event ) {
	$( "#vcb_dialog" ).dialog( "open" );
	event.preventDefault();
});
function vcb_dialog_upload(){
	var names = document.getElementsByName("vcb_dialog_filename");
	var url ='<?php echo M_UPLOAD_URL?>';
	for(var i =0;i<names.length;i++){
		//alert(names[i].value);
		addNewPersonRow(url,names[i].value);
	}
	
}
</script>
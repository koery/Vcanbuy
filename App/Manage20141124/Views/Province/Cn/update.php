<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>province.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData()">
<?php $a = $data[0];?>
<table width="400" border="1">
  <tr>
    <td width="72">国家名称</td>
    <td width="212">
		<select name="country" id="country" onchange="setRegion()" >
			<option value=""></option>
			<?php foreach ($country as $c) {
				if ($a['country_id'] ==$c['country_id']){
					echo "<option value='".$c['country_id']."' selected='selected'>".$c['country']."</option>";
				}else{
					echo "<option value='".$c['country_id']."'>".$c['country']."</option>";
				}
			}?>
		</select> 
      <span id="msg_country" style="display: none">请选择国家名称</span>
    </td>
  </tr>
  <tr>
    <td width="72">大区名称</td>
    <td width="212">
		<select name="region" id="region" >
			<option value=""></option>
			<?php foreach ($region as $r) {
				if ($a['region_id'] ==$r['region_id']){
					echo "<option value='".$r['region_id']."' selected='selected'>".$r['region']."</option>";
				}else{
					echo "<option value='".$r['region_id']."'>".$r['region']."</option>";
				}
				
			}?>
		</select>  
      <span id="msg_region" style="display: none">请选择大区</span>
    </td>
  </tr>
  <tr>
    <td>序号</td>
    <td><input type="text" name="orders" id="orders"  class="input_int" value='<?php echo $a['orders'];?>'>&nbsp;</td>
  </tr>
  <tr>
    <td>省</td>
    <td><input type="text" name="province" id="province" maxlength="50" value='<?php echo $a['province'];?>'>
    <span id="msg_province" style="display: none">请输入省名称</span></td>
  </tr>
	<tr>
		<td>启用</td>
		<td><input name="status" type="checkbox" id="status" value="10000"
			<?php echo $a['status'] !='10000'?'':'checked="checked"' ?> /></td>
	</tr>
</table>
<input type="hidden" name="id" id="id"  value='<?php echo $_GET['id']?>'/>
<input name="submit" type="submit" value="提交" />
</form>


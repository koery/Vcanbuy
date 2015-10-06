<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>district.js" type="text/javascript"></script>
<form method="POST" action="add_save" name="myform" onsubmit="return verifyData()">
<table width="400" border="1">
  <tr>
    <td width="72">国家名称</td>
    <td width="212">
		<select name="country" id="country" onchange="setRegion()" >
			<option value=""></option>
			<?php foreach ($country as $c) {
				if (get_post_value('country') ==$c['country_id']){
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
		<select name="region" id="region" onchange="setProvince()">
			<option value=""></option>
			<?php foreach ($region as $r) {
				if (get_post_value('region') ==$r['region_id']){
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
    <td width="72">省名称</td>
    <td width="212">
		<select name="province" id="province" onchange="setCity()">
			<option value=""></option>
			<?php foreach ($province as $p) {
				if (get_post_value('province') ==$p['province_id']){
					echo "<option value='".$p['province_id']."' selected='selected'>".$p['province']."</option>";
				}else{
					echo "<option value='".$p['province_id']."'>".$p['province']."</option>";
				}
				
			}?>
		</select>  
      <span id="msg_province" style="display: none">请选择省</span>
    </td>
  </tr>
   <tr>
    <td width="72">市</td>
    <td width="212">
			<select name="city" id="city" onchange="setOrders()">
			<option value=""></option>
			<?php foreach ($city as $c) {
				if (get_post_value('city') ==$c['city_id']){
					echo "<option value='".$c['city_id']."' selected='selected'>".$c['city']."</option>";
				}else{
					echo "<option value='".$c['city_id']."'>".$c['city']."</option>";
				}
				
			}?>
		</select>   
      <span id="msg_city" style="display: none">请选择市</span>
    </td>
  </tr>
  <tr>
    <td>序号</td>
    <td><input type="text" name="orders" id="orders"  class="input_int" value='<?php echo get_post_value('orders');?>'>&nbsp;</td>
  </tr>
  <tr>
    <td>区县</td>
    <td><input type="text" name="district" id="district" maxlength="50">
    <span id="msg_district" style="display: none">请输入区县名称</span></td>
  </tr>
 	<tr>
		<td>启用</td>
		<td><input name="status" type="checkbox" id="status" value="10000" checked="checked"/></td>
	</tr>
</table>

<input name="submit" type="submit" value="提交" />
</form>


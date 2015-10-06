<script src="<?php echo JS_MODULE_PATH?>city.js" type="text/javascript"></script>
<form method="POST" action="index" name="myform">
	<div>
		国家：<select name="country" id="country" onchange="setRegion()" >
			<option value=""></option>
			<?php foreach ($country as $c) {
				if (get_post_value('country') ==$c['country_id']){
					echo "<option value='".$c['country_id']."' selected='selected'>".$c['country']."</option>";
				}else{
					echo "<option value='".$c['country_id']."'>".$c['country']."</option>";
				}
				
			}?>
		</select> 
		大区：<select name="region" id="region" onchange="setProvince()">
			<option value=""></option>
			<?php foreach ($region as $r) {
				if (get_post_value('region') ==$r['region_id']){
					echo "<option value='".$r['region_id']."' selected='selected'>".$r['region']."</option>";
				}else{
					echo "<option value='".$r['region_id']."'>".$r['region']."</option>";
				}
				
			}?>
		</select> 
		省：
			<select name="province" id="province" >
			<option value=""></option>
			<?php foreach ($province as $p) {
				if (get_post_value('province') ==$p['province_id']){
					echo "<option value='".$p['province_id']."' selected='selected'>".$p['province']."</option>";
				}else{
					echo "<option value='".$p['province_id']."'>".$p['province']."</option>";
				}
				
			}?>
		</select>  
		市:<input type="text" name="city" id="city" value='<?php echo get_post_value('city')?>'>
		<input name="submit" type="submit" value="提交" />
		 <a href="add">新增</a>
	</div>

	<table  border="1">
		<tr>
			<td >国家名称</td>
			<td >大区名称</td>
			<td >省</td>
			<td >序号</td>
			<td >市</td>
			<td >状态</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['country']?></td>
			<td><?php echo $a['region']?></td>
			<td><?php echo $a['province']?></td>
			<td><?php echo $a['orders']?></td>
			<td><?php echo $a['city']?></td>
			<td><?php echo $a['status_name']?></td>
			<td><a href="update?id=<?php echo $a['city_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $a['city_id']?>"
				onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
	</table>

</form>

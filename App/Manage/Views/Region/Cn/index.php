
<form method="POST" action="index" name="myform">
	<div>
		国家：<select name="country" id="country">
			<option value=""></option>
			<?php foreach ($country as $c) {
				if (get_post_value('country') ==$c['country_id']){
					echo "<option value='".$c['country_id']."' selected='selected'>".$c['country']."</option>";
				}else{
					echo "<option value='".$c['country_id']."'>".$c['country']."</option>";
				}
				
			}?>
		</select> 
		大区：<input type="text" name="region" id="region" value='<?php echo get_post_value('region')?>'>
		<input name="submit" type="submit" value="提交" />
		 <a href="add">新增</a>
	</div>

	<table  border="1" width ="600">
		<tr>
			<td >国家名称</td>
			<td >序号</td>
			<td >大区名称</td>
			<td >状态</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['country']?></td>
			<td><?php echo $a['orders']?></td>
			<td><?php echo $a['region']?></td>
			<td><?php echo $a['status_name']?></td>
			<td><a href="update?id=<?php echo $a['region_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $a['region_id']?>"
				onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
	</table>

</form>

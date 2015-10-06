	<a href="add">新增</a>
	<table width="500" border="1">
		<tr>
			<td width="50">序号</td>
			<td width="273">国家名称</td>
			<td width="273">状态</td>
			<td width="79">修改</td>
			<td width="70">删除</td>
		</tr>
	  <?php 
	  if (count ( $data ) > 0) {
			foreach ( $data as $country ) {
	 ?>
	  <tr>
			<td><?php echo $country['orders']?></td>
			<td><?php echo $country['country']?></td>
			<td><?php echo $country['status_cn']?></td>
			<td><a href="update?id=<?php echo $country['country_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $country['country_id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php 
		}
	}?>
	</table>




<a href="add">新增</a>
	<table border="1" width ="600">
		<tr>
			<td >序号</td>
			<td >名称</td>
			<td >状态</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['orders']?></td>
			<td><?php echo $a['country']?></td>
			<td><?php echo $a['status_name']?></td>
			<td><a href="update?id=<?php echo $a['country_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $a['country_id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
	</table>


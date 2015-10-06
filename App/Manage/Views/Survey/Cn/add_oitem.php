
<center>问题：<?php echo $data[0]['issue']?></center>
<form action="add_oitem_save" methor="post">
	<input type="text" name="item">
	<input type="hidden" name = "id" value="<?php echo $data[0]['id']?>">
	<input type="submit" value="添加选项">
</form>
<table border="1">
	<tr>
		<td>选项</td>
		<td>编辑</td>
		<td>删除</td>
	</tr>
	<?php foreach ( $data_issue as $a ) {?>
	  <tr>
	  		<td><?php echo $a['item']?></td>
			<td><a href="update_item?id=<?php echo $a['id']?>">编辑</a></td>
			<td><a href="delete_item?id=<?php echo $a['id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
</table>
<a href="add_issue?id=<?php echo $data[0]['survey_id']?>">点此返回添加问题页面</a>
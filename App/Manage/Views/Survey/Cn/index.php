<form action="add" method="post">
	<input name="" type="submit" value = "添加问卷"/>
</form>
<table border="1">
	<tr>
		<td>序号</td>
		<td>问卷名称</td>
		<td>创建人</td>
		<td>状态</td>
		<td>创建时间</td>
		<td>添加问题</td>
		<td>编辑</td>
		<td>删除</td>
		<td>查看统计结果</td>
	</tr>
	<?php foreach ( $data as $a ) {?>
	  <tr>
	  		<td><?php echo $a['id']?></td>
			<td><?php echo $a['title']?></td>
			<td><?php echo $a['manage']?></td>
			<td><?php echo $a['status']?></td>
			<td><?php echo $a['created']?></td>
			<td><a href="add_issue?id=<?php echo $a['id']?>">添加问题</a></td>
			<td><a href="update?id=<?php echo $a['id']?>">编辑</a></td>
			<td><a href="delete?id=<?php echo $a['id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
			<td><a href="count_result?id=<?php echo $a['id']?>">查看统计结果</a></td>
		</tr>
	  <?php }?>
</table>
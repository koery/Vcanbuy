
<a href="add">新增</a>
	<table border="1" >
		<tr>
			<td >用户名</td>
			<td >真实姓名</td>
			<td >email</td>
			<td >性别</td>
			<td >默认语言</td>
			<td >注册时间</td>
			<td >最后登陆</td>
			<td >登陆IP</td>
			<td >状态</td>
			<td >重置密码</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['username']?>&nbsp;</td>
			<td><?php echo $a['name']?>&nbsp;</td>
			<td><?php echo $a['email']?>&nbsp;</td>
			<td><?php echo $a['sex']?>&nbsp;</td>
			<td><?php echo $a['language']?>&nbsp;</td>
			<td><?php echo $a['created']?>&nbsp;</td>
			<td><?php echo $a['logged']?>&nbsp;</td>
			<td><?php echo $a['loggip']?>&nbsp;</td>
			<td><?php echo $a['status_cn']?>&nbsp;</td>
			<td><a href="update_psw?id=<?php echo $a['id']?>" target="_blank">重置密码</a></td>
			<td><a href="update?id=<?php echo $a['id']?>" target="_blank">修改</a></td>
			<td><a href="delete?id=<?php echo $a['id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
	</table>


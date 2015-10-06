<form method="POST" action="" name="myform" >
 一级类目：<select name="category_1" id="category_1">
 	<option value=""></option>
 	<?php
 	foreach ($category_1 as $key => $value) {
		if ($key == get_post_value('category_1')){
			echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
		}else{
			echo '<option value="'.$key.'">'.$value.'</option>';
		}
 	} 
 	?>
 </select>
 <input type="textbox" name="category_2" id="category_2" value="<?php echo get_post_value('category_2')?>" />
 <input type="submit" name="button" id="button" value="提交" />
<a href="add">新增</a>
	<table border="1" >
		<tr>
			<td >一级类目</td>
			<td >序号</td>
			<td >二级类目(中文)</td>
			<td >二级类目(泰文)</td>
			<td >建立时间</td>
			<td >状态</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['category_1']?></td>
			<td><?php echo $a['orders']?></td>
			<td><?php echo $a['category_2_cn']?></td>
			<td><?php echo $a['category_2_th']?></td>
			<td><?php echo $a['created']?></td>
			<td><?php echo $a['status_cn']?></td>
			<td><a href="update?id=<?php echo $a['category_2_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $a['category_2_id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
	</table>
	<div class='page'>
	<?php echo $showPage;?>
</div>
<div class='pagetotal'>
	<?php echo $showTotal;?>
</div>
</form>

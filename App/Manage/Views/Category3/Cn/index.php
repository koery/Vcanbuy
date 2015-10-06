<script src="<?php echo JS_MODULE_PATH?>category3.js" type="text/javascript"></script>
<form method="POST" action="" name="myform" >
 一级类目：<select name="category_1" id="category_1" onchange="setCategory_1()">
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
 二级类目：<select name="category_2" id="category_2" >
 	<option value=""></option>
 	<?php
 	if (!empty($category_2)){
	 	foreach ($category_2 as $key) {
			if ($key['category_2_id'] == get_post_value('category_2')){
				echo '<option value="'.$key['category_2_id'].'" selected="selected">'.$key['category_2_cn'].'</option>';
			}else{
				echo '<option value="'.$key['category_2_id'].'">'.$key['category_2_cn'].'</option>';
			}
	 	}
	}
 	?>
 </select>
 <input type="textbox" name="category_3" id="category_3" value="<?php echo get_post_value('category_3')?>" />
 <input type="submit" name="button" id="button" value="提交" />
<a href="add">新增</a>
	<table border="1" >
		<tr>
			<td >一级类目</td>
			<td >二级类目(中文)</td>
			<td >二级类目(泰文)</td>
			<td >序号</td>
			<td >三级类目(中文)</td>
			<td >三级类目(泰文)</td>
			<td >建立时间</td>
			<td >开始时间</td>
			<td >结束时间</td>
			<td >状态</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['category_1']?></td>
			<td><?php echo $a['category_2_cn']?></td>
			<td><?php echo $a['category_2_th']?></td>
			<td><?php echo $a['orders']?></td>
			<td><?php echo $a['category_3_cn']?></td>
			<td><?php echo $a['category_3_th']?></td>
			<td><?php echo $a['created']?></td>
			<td><?php echo $a['start_time']?></td>
			<td><?php echo $a['end_time']?></td>
			<td><?php echo $a['status_cn']?></td>
			<td><a href="update?id=<?php echo $a['category_3_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $a['category_3_id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
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

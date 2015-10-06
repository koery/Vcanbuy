<form method="POST" action="" name="myform" >
	页面位置:<select name="type" id="type">
		<option value=""></option> 
  	<?php 
  		
  		foreach ($type as $key => $value) {
			if (get_post_value('type') == $key){
				echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
			}else{
  				echo '<option value="'.$key.'">'.$value.'</option>';
  			}
  		}
  	?>
	</select>
  	语言:<select name="language" id="language">
  	<option value=""></option> 
  	<?php 
  		foreach ($language as $key) {
			if (get_post_value('lan') == $key){
				echo '<option value="'.$key.'" selected="selected">'.$key.'</option>';
			}else{
  				echo '<option value="'.$key.'">'.$key.'</option>';
  			}
  		}
  	?>
  </select>
  <input type="text" name="key" id="key" value="<?php echo get_post_value('key')?>"/>
  <input type="submit" name="button" id="button" value="提交" />
  
<a href="add">新增</a>
	<table border="1" >
		<tr>
			<td >banner_id</td>
			<td >语言</td>
			<td >位置</td>
			<td >图片</td>
			<td >开始时间</td>
			<td >结束时间</td>
			<td >创建时间</td>
			<td >创建人</td>
			<td >审核</td>
			<td >状态</td>
			<td >修改</td>
			<td >删除</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
	        <td><?php echo $a['banner_id']?></td>
	        <td><?php echo $a['language']?></td>
	        <td><?php echo $a['type']?></td>
	        <td><img src="<?php echo IMAGE_MODULE_PATH.$a['image_name']?>" height="60" /></td>
			<td><?php echo $a['start_time']?></td>
			<td><?php echo $a['end_time']?></td>
			<td><?php echo $a['created']?></td>
			<td><?php echo $a['created_name']?></td>
			<td><?php 
				$str = '<a href="audit?id='.$a['banner_id'].'&status='.$a['status'].'" >';
				if ($a['status'] =='10000'){
					echo $str.'审核</a>';
				}else if ($a['status'] =='20000'){
					echo $str.'取消审核</a>';
				}else{
					echo '-';
				}
			 ?></td>
			<td><?php echo $a['status_cn']; ?></td>
			<td><a href="update?id=<?php echo $a['banner_id']?>">修改</a></td>
			<td><a href="delete?id=<?php echo $a['banner_id_id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
		</tr>
	  <?php }?>
	</table>
</form>

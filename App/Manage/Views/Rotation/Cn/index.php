<a href="add">新增</a>
	<table border="1" >
		<tr>
			<td >位置</td>
			<td >image_id</td>
			<td >image_url_cn</td>
			<td >图片</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['type']?></td>
			<td><?php echo $a['image_name']?></td>
			<td><img src="<?php echo IMAGE_MODULE_PATH.$a['image_name']?>" /></td>
		</tr>
	  <?php }?>
	</table>
</form>

<table>
	<form action="update_save" method="post">
	<tr>
		<td>问卷名称</td>
		<input type="hidden" name = "id" value = "<?php echo $data[0]['id']?>"/>
		<td><input type="text" name= "title" value = "<?php echo $data[0]['title']?>"></td>
	</tr>
	<input type="submit" value="提交">
	</form>
</table>
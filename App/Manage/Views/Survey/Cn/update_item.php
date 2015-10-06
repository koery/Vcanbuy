<table>
	<form action="update_item_save" method="post">
	<tr>
		<td>问题</td>
		<input type="hidden" name = "id" value = "<?php echo $data[0]['id']?>"/>
		<td><input type="text" name= "item" value = "<?php echo $data[0]['item']?>"></td>
	</tr>
	<input type="submit" value="提交">
	</form>
</table>
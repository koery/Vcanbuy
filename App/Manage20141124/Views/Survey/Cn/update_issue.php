<table>
	<form action="update_issue_save" method="post">
	<tr>
		<td>问题</td>
		<input type="hidden" name = "id" value = "<?php echo $data[0]['id']?>"/>
		<td><input type="text" name= "issue" value = "<?php echo $data[0]['issue']?>"></td>
	</tr>
	<input type="submit" value="提交">
	</form>
</table>
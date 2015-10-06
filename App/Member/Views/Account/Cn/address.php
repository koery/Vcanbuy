<center><h3>修改收货地址</h3></center>
<form id="myform" action="editaddress" method="post">
<!--<?php $data = $data[0]?>
--><table>
	<tr>
		<td>国家</td>
		<td><input  value="<?php echo $data['country']?>" name="country"></td>
	</tr>
	<tr>
		<td>地区</td>
		<td><input value="<?php echo $data['region']?>" name="region"></td>
	</tr>
	<tr>
		<td>省　</td>
		<td><input  value="<?php echo $data['province']?>" name="province"></td>
	</tr>
	<tr>
		<td>市　</td>
		<td><input value="<?php echo $data['city']?>" name="city"></td>
	</tr>
	<tr>
		<td>区县</td>
		<td><input value="<?php echo $data['district']?>" name="district"></td>
	</tr>
	<tr>
		<td>街道</td>
		<td><input value="<?php echo $data['address']?>" name="address"></td>
	</tr>
	<tr>
		<td>邮编</td>
		<td><input  value="<?php echo $data['postcode']?>" name="postcode"></td>
	</tr>
	<tr>
		<td>电话</td>
		<td><input value="<?php echo $data['tel']?>" name="tel"></td>
	</tr>
	<tr>
		<td>手机</td>
		<td><input value="<?php echo $data['mobile']?>" name="mobile"></td>
	</tr>
	<tr>
		<td><input type="submit" value="提交"></td>
		<td><input type="reset" value="取消" ></td>
	</tr>
</table>
</form>
<a href="../index/index">返回我的vcb</a>
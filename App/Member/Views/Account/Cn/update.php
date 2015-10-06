<!-- 订单列表 -->
<form id="myform" action="edituserinfo" method="post">
<?php $a = $data[0]?>
<table width="400" border="1">
  <tr>
    <td width="92">客户代号：</td>
    <td width="292">&nbsp;<?php echo $a['username']?></td>
  </tr>
  <tr>
    <td>E-mail:</td>
    <td>&nbsp;<?php echo $a['email']?></td>
  </tr>
  <tr>
    <td>姓名：</td>
    <td>&nbsp;<input name="name" id="name" value="<?php echo $a['name']?>"></td>
  </tr>
  <tr>
    <td>姓别：</td>
    <td>
      <input type="radio" name="sex" id="sex" value="0" <?php if ($a['sex'] ==0) {echo 'checked="checked"';}?> />男
      <input type="radio" name="sex" id="sex" value="1" <?php if ($a['sex'] ==1) {echo 'checked="checked"';}?>/>女
    </td>
  </tr>
  <tr>
    <td>联系地址：</td>
    <td>&nbsp;
      <select name="country" id="country">
      	<option value="" ></option>
      	<?php echo '<option value="'.$a['country'].'" selected="selected">'.$a['country'].'</option>'?>
      </select>
      <select name="region" id="region">
      	<option value="" ></option>
      	<?php echo '<option value="'.$a['region'].'" selected="selected">'.$a['region'].'</option>'?>
      </select>
      <select name="province" id="province">
      	<option value="" ></option>
      	<?php echo '<option value="'.$a['province'].'" selected="selected">'.$a['region'].'</option>'?>
      </select>
      <select name="city" id="city">
      	<option value="" ></option>
      	<?php echo '<option value="'.$a['city'].'" selected="selected">'.$a['city'].'</option>'?>
      </select>
      <select name="district" id="district">
      	<option value="" ></option>
      	<?php echo '<option value="'.$a['district'].'" selected="selected">'.$a['district'].'</option>'?>
      </select>
    </td>
  </tr>
  <tr> 
  	<td>
  		<input type="submit" value="修改">
  	</td>
  	<td>
  		<input type="reset" value="取消">
  	</td>
  </tr>
</table>
</form>
<a href="../index/index">返回我的vcb</a>


<script src="<?php echo JS_MODULE_PATH?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH?>products.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData2()">

<table width="600" border="1">
  <tr>
    <td>产品网址：</td>
    <td><a href="<?php echo $product_url;?>" target="_blank"><?php echo $product_url?></a></td>
  </tr>
  <tr>
    <td>标题(中文)：</td>
    <td><input name="title_cn" type="text" id="title" size="60" value="<?php echo $data['title']?>" /></td>
  </tr>
    <tr>
    <td>标题(泰文)：</td>
    <td><input name="title_th" type="text" id="title" size="60" value="<?php echo $data['title']?>" /></td>
  </tr>
  <tr>
    <td>一级类目：</td>
    <td> <select name="category_1" id="category_1" onchange="setCategory_1()">
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
    </td>
  </tr>
  <tr>
    <td>二级类目</td>
    <td><select name="category_2" id="category_2" onchange="setCategory_2()">
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
    </td>
  </tr>
  <tr>
    <td>三级类目</td>
    <td><select name="category_3" id="category_3" >
  	</select>
  	</td>
  </tr>
  <tr>
    <td> 一级层类目：</td>
    <td><select name="floor_1" id="floor_1" onchange="setFloor_1()">
	 	<option value=""></option>
	 	<?php
	 	foreach ($floor_1 as $key => $value) {
			if ($key == get_post_value('floor_1')){
				echo '<option value="'.$key.'" selected="selected">'.$value.'</option>';
			}else{
				echo '<option value="'.$key.'">'.$value.'</option>';
			}
	 	} 
	 	?>
	 </select>
  	</td>
  </tr>
  <tr>
    <td> 二级层类目：</td>
    <td><select name="floor_2" id="floor_2" onchange="setFloor_2()">
 	<option value=""></option>
 	<?php
 	if (!empty($floor_2)){
	 	foreach ($floor_2 as $key) {
			if ($key['floor_2_id'] == get_post_value('floor_2')){
				echo '<option value="'.$key['floor_2_id'] .'" selected="selected">'.$key['floor_2_cn'] .'</option>';
			}else{
				echo '<option value="'.$key['floor_2_id'] .'">'.$key['floor_2_cn'] .'</option>';
			}
	 	}
	}
 	?>
 </select>
  	</td>
  </tr>
  <tr>
    <td> 三级层类目：</td>
    <td><select name="floor_3" id="floor_3" >
  	</select>
  	</td>
  </tr>
  <tr>
    <td>进货价：</td>
    <td><input name="purchase_price " type="text" id="purchase_price" size="60" value="<?php echo $data['price']?>" readonly="readonly"/></td>
  </tr>
<!--   <tr> -->
<!--     <td>销售价格模板</td> -->
<!--     <td>&nbsp;<select name="sales_template"> -->
<!--     <option value="0">请选择</option> -->
<!--     </select></td> -->
<!--   </tr> -->
<!--   <tr> -->
<!--     <td>快递价格模板</td> -->
<!--     <td>&nbsp;<select name="express_template"> -->
<!--     <option value="0">请选择</option> -->
<!--     </select></td> -->
<!--   </tr> -->
<!--   <tr> -->
<!--     <td>销售价：</td> -->
<!--   <td><input name="sales_price " type="text" id="sales_price" size="60" value="<?php echo $data['price']?>" readonly="readonly"/></td>-->
<!--   </tr> -->
  <tr>
    <td>商家名称：</td>
    <td><input name="shop" type="text" id="shop" size="60" value="<?php echo $data['shop']?>" /></td>
  </tr>
  <tr>
    <td>产品原图：</td>
    <td><img alt="" src="<?php echo $data['pic_url']?>" height="80">
    	<input type="hidden" name="image_url" id="image_url" value="" />
    </td>
  </tr>

  <tr>
    <td>图片上传：<input type="button" name="upload" id="upload" value="上传" /></td>
    <td><img id="img_upload" height="80" style="display: none">&nbsp;</td>
  </tr>
</table>

</div>
<input name="product_url" type="hidden" id="product_url"  value="<?php echo $product_url?>" />
<input name="shop_id" type="hidden" id="shop_id"  value="<?php echo $data['shop_id']?>" />
<input name="shop_url" type="hidden" id="shop_url"  value="<?php echo $data['shop_url']?>" />

<input name="submit" type="submit" value="提交" />
</form>


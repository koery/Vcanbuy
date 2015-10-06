<script src="<?php echo JS_PUBLIC_PATH ?>My97DatePicker/WdatePicker.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH ?>command.js" type="text/javascript"></script>
<script src="<?php echo JS_MODULE_PATH ?>products.js" type="text/javascript"></script>
<script type="text/javascript"src="<?php echo JS_PUBLIC_PATH ?>uploadify/jquery.uploadify.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo JS_PUBLIC_PATH ?>uploadify/uploadify.css">
<script src="<?php echo JS_PUBLIC_PATH ?>jquery-ui-1.11.1/jquery-ui.js"></script>
<link href="<?php echo JS_PUBLIC_PATH ?>jquery-ui-1.11.1/jquery-ui.css" rel="stylesheet">
<link href="<?php echo CSS_PUBLIC_PATH ?>style.css" rel="stylesheet">
<script src="<?php echo JS_MODULE_PATH ?>upload.js"></script>
<script src="<?php echo JS_MODULE_PATH ?>products.js" type="text/javascript"></script>
<form method="POST" action="update_save" name="myform" onsubmit="return verifyData2()">
    <?php $a = $data[0]; ?>
    <table width="600" border="1">
        <tr>
            <td>产品网址：</td>
            <td><a href="<?php echo $a['product_url']; ?>" target="_blank"><?php echo $a['product_url'] ?></a></td>
        </tr>
        <tr>
            <td>标题(中文)：</td>
            <td><input name="title_cn" type="text" id="title" size="60" value="<?php echo $a['title_cn'] ?>" /></td>
        </tr>
        <tr>
            <td>标题(泰文)：</td>
            <td><input name="title_th" type="text" id="title" size="60" value="<?php echo $a['title_th'] ?>" /></td>
        </tr>
        <tr>
            <td>一级类目：</td>
            <td> <select name="category_1" id="category_1" onchange="setCategory_1()">
                    <option value=""></option>
                    <?php
                    foreach ($category_1 as $key => $value) {
                        if ($key == get_post_value('category_1')) {
                            echo '<option value="' . $key . '" selected="selected">' . $value . '</option>';
                        } else {
                            echo '<option value="' . $key . '">' . $value . '</option>';
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
                    if (!empty($category_2)) {
                        foreach ($category_2 as $key) {
                            if ($key['category_2_id'] == get_post_value('category_2')) {
                                echo '<option value="' . $key['category_2_id'] . '" selected="selected">' . $key['category_2_cn'] . '</option>';
                            } else {
                                echo '<option value="' . $key['category_2_id'] . '">' . $key['category_2_cn'] . '</option>';
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
                        if ($key == get_post_value('floor_1')) {
                            echo '<option value="' . $key . '" selected="selected">' . $value . '</option>';
                        } else {
                            echo '<option value="' . $key . '">' . $value . '</option>';
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
                    if (!empty($floor_2)) {
                        foreach ($floor_2 as $key) {
                            if ($key['floor_2_id'] == get_post_value('floor_2')) {
                                echo '<option value="' . $key['floor_2_id'] . '" selected="selected">' . $key['floor_2_cn'] . '</option>';
                            } else {
                                echo '<option value="' . $key['floor_2_id'] . '">' . $key['floor_2_cn'] . '</option>';
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
            <td><input name="purchase_price" type="text" id="purchase_price" size="60" value="<?php echo $a['purchase_price'] ?>"/></td>
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
        <tr>
            <td>销售价：</td>
            <td><input name="sales_price" type="text" id="sales_price" size="60" value="<?php echo $a['sales_price'] ?>" /></td>
        </tr>
        <tr>
            <td>优惠价：</td>
            <td><input name="preferential_price" type="text" id="preferential_price" size="60" value="<?php echo $a['preferential_price'] ?>"/></td>
        </tr>
        <tr>
            <td>商家名称：</td>
            <td><input name="shop" type="text" id="shop" size="60" value="<?php echo $a['shop'] ?>" /></td>
        </tr>
        <tr>
            <td>产品原图：</td>
            <td><img alt="" src="<?php echo M_UPLOAD_PATH . $a['image_url'] ?>" height="80">
                <input type="hidden" name="image_url_old" id="image_url" value = "<?php echo $a['image_url'] ?>"/>
            </td>
        </tr>

        <tr>
            <td>图片上传：<input type="button" name="upload" id="upload" value="上传" /></td>
            <td><img id="img_upload" name="image_url" height="80">&nbsp;
                <input type="hidden" id="image_url" name="image_url" height="80"></td>
        </tr>
    </table>

</div>
<input name="product_url" type="hidden" id="product_url"  value="<?php echo $a['product_url'] ?>" />
<input name="shop_id" type="hidden" id="shop_id"  value="<?php echo $data['shop_id'] ?>" />
<input name="shop_url" type="hidden" id="shop_url"  value="<?php echo $data['shop_url'] ?>" />
<input name="product_id" type="hidden" id="product_id"  value="<?php echo $a['product_id'] ?>" />
<input name="submit" type="submit" value="提交" />
</form>
<?php echo $upload; ?>
<script type="text/javascript">

    $("#upload").click(function (event) {
        $("#vcb_dialog").dialog("open");
        event.preventDefault();
    });
    function vcb_dialog_upload() {
        var names = document.getElementsByName("vcb_dialog_filename");
        var url = '<?php echo M_UPLOAD_URL ?>';

        for (var i = 0; i < names.length; i++) {
            document.getElementById('img_upload').src = url + names[i].value;
            document.getElementById('img_upload').style.display = '';
            document.getElementById('image_url').value = names[i].value;
            break;
            //alert(names[i].value);
            //addNewPersonRow(url,names[i].value);
        }

    }
</script>

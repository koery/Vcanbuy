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
<form method="POST" action="update_kindsave" name="myform" onsubmit="return verifyData2()">
    <?php foreach ($data as $a) { ?>
        <table width="600" border="1">
            <tr>
                <td>颜色</td>
                <td>
                    <select name="color">
                        <option value="红色">红色</option>
                        <option value="黑色">黑色</option>
                        <option value="蓝色">蓝色</option>
                        <option value="白色">白色</option>
                        <option value="青色">青色</option>
                        <option value="灰色">灰色</option>
                        <option value="黄色">黄色</option>
                    </select>
                    <input type="text" readonly="readonly" value="<?php echo $a['product_color'] ?>">
                </td>
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
    <?php } ?>
</div>

<input name="submit" type="submit" value="提交" />
<input name="id" type="hidden" value="<?php echo $data[0]['id'] ?>" />
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
            // alert(names[i].value);
            //addNewPersonRow(url,names[i].value);
        }

    }
</script>


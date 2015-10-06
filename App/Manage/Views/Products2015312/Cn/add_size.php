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
<form method="POST" action="add_sizesave" name="myform" onsubmit="return verifyData2()">
    尺码:<input type="text" name="size">库存名称：<input type="text" name="sku_name">库存数量：<input type="text" name="sku">
    <input type="hidden" name="pro_k_id" value="<?php echo $pro_k_id ?>">
    <input name="submit" type="submit" value="提交" />
</form>
<table width="600" border="1">
    <tr>
        <td>序号</td>
        <td>尺码</td>
        <td>修改尺码</td>
        <td>库存名称</td>
        <td>库存数量</td>
        <td>修改</td>
        <td>删除</td>
    </tr>

    <?php foreach ($data as $a) { ?>
        <tr>
        <form action="update_sizesave" method="post">
            <td><?php echo $a['id']; ?></td>
            <td><?php echo $a['size']; ?></td>
            <td><input type="text" name="u_size"></td>
            <td><?php echo $a['sku_name']; ?></td>
            <td><?php echo $a['sku']; ?></td>
            <input type="hidden" name="id" value="<?php echo $a['id']; ?>">
            <td><input type="submit" value="更新"> </td>
            <td><a href="delect_size?id=<?php echo $a['id']; ?>">删除</a></td>
        </form>
    </tr>
<?php } ?>
</table>

</div>


<input name="id" type="hidden" value="<?php echo $pro_id ?>" />


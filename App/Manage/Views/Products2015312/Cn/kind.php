<script src="<?php echo JS_MODULE_PATH ?>products.js" type="text/javascript"></script>
<a href="add_kind?id=<?php echo $pro_id ?>">添加种类</a>
<table border="1" >
    <tr>
        <td >序号</td>
        <td >颜色</td>
        <td >状态</td>
        <td >修改</td>
        <td >删除</td>
        <td>添加尺码</td>
    </tr>
    <?php foreach ($data as $a) { ?>
        <tr>
            <td><?php echo $a['id'] ?></td>
            <td><?php echo $a['product_color'] ?></td>
            <td><?php
                if ($a['status'] == 10000) {
                    echo '未审核';
                }
                ?></td>
            <td><a href="update_kind?id=<?php echo $a['id'] ?>">修改</a></td>
            <td><a href="delete_kind?id=<?php echo $a['id'] ?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
            <td><a href="add_size?id=<?php echo $a['id'] ?>">添加尺码</a></td>
        </tr>
    <?php } ?>
</table>

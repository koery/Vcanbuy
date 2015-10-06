<script src="<?php echo APP_MODULE_JS_PATH ?>products.js" type="text/javascript"></script>
<form method="POST" action="" name="myform" >
    <div>
        一级类目：<select name="category_1" id="category_1" onchange="setCategory_1()">
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
        二级类目：<select name="category_2" id="category_2" onchange="setCategory_2()">
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

        三级类目：<select name="category_3" id="category_3" >
        </select>
    </div>

    <div>
        <form method="POST" action="" name="myform" >
            一级层类目：<select name="floor_1" id="floor_1" onchange="setFloor_1()">
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
            二级层类目：<select name="floor_2" id="floor_2" onchange="setFloor_2()">
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
            三级层类目：<select name="floor_3" id="floor_3" >
            </select>
    </div>

    <div>
        产品名称：<input type="text" name="key" id="key" value="<?php echo get_post_value('key') ?>"/>
        <input type="submit" name="submit" value="确定" />
        <a href="add1">新增</a>
    </div>
    <table border="1" >
        <tr>
            <td >序号</td>
            <td >名称</td>
            <td >状态</td>
            <td >修改</td>
            <td >删除</td>
            <td >商品种类</td>
        </tr>
        <?php foreach ($data as $a) { ?>
            <tr>
                <td><?php echo $a['product_id'] ?></td>
                <td><?php echo $a['title_cn'] ?></td>
                <td><?php
                    if ($a['status'] == 10000) {
                        echo '未审核';
                    }
                    ?></td>
                <td><a href="update?id=<?php echo $a['product_id'] ?>">修改</a></td>
                <td><a href="delete?id=<?php echo $a['product_id'] ?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
                <td><a href="kind?id=<?php echo $a['product_id'] ?>">商品种类</a></td>
            </tr>
        <?php } ?>
    </table>
</form>

</div>
<div class="container">
    <form action="count_re" method="post">
        <div class="content">
            <center>
                <h3><?php echo $data[0]['title']; ?></h3>
            </center>
            <?php $i = 1;
            foreach ($data_issue as $a) { ?>
                <div class="center">
                    <div class="title"><?php echo $i . "," . $a['issue'] ?></div>
                    <div class="item">
                        <ul>
    <?php foreach ($data_item as $b) {
        if ($a['id'] == $b['issue_id'] && $b['type'] == '10000') { ?>
                                    <li><input class="oitem_rd" type="radio"
                                               name="<?php echo $b['issue_id'] ?>" value="<?php echo $b['id'] ?>"><?php echo $b['item'] ?>
                                    </li>
                                <?php } ?>
        <?php if ($a['id'] == $b['issue_id'] && $b['type'] == '20000') { ?>
            <?php if ($b['item'] != "其他") { ?>
                                        <li><input class="oitem_ck" type="checkbox"
                                                   name="<?php echo $b['issue_id'] ?>[]" value="<?php echo $b['id'] ?>"><?php echo $b['item'] ?>
                                        </li>
            <?php } ?>
                                    <?php if ($b['item'] == "其他") { ?>
                                        <li>其他：</li>
                                        <li><textarea name="other<?php echo $a['id'] ?>"></textarea></li>
            <?php } ?>
        <?php }
    } ?>
                        </ul>
                    </div>
                </div>
    <?php $i++;
} ?> <input type="hidden"
                   value="<?php echo $data[0]['id']; ?>" name="id">
            <center><input type="submit" value="提交"></center>
        </div>
    </form>
</div>
<div class="clear"></div>
<div class="preview"><a href="add_issue?id=<?php echo $data[0]['id']; ?>">返回上一页</a></div>
<div class="clear"></div>
<style type="text/css">
    .container {
        width: 1000px;
        margin: 0 auto;
        padding: 0 12px;
    }

    .navigation {
        display: none;
    }

    * {
        margin: 0px;
        padding: 0px;
    }

    .center {
        float: left;
        width: 975px;
        padding: 10px;
        border-bottom: dashed 1px #000;
    }

    .content {
        float: left;
        width: 1000px;
        background: #cccccc;
    }

    .title {
        margin-bottom: 25px;
    }

    .item {

    }

    .item li {
        list-style: none;
        float: left;
        width: 100px;
        text-align: center;
    }

    .clear {
        clear: both;
    }

    h3 {
        margin: 20px auto;
    }
</style>

<script type="text/javascript">
    $(function () {




    });
</script>

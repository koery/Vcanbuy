<div>
    <center><h3>问题:<?php echo $data_issue[0]['issue']; ?></h3></center>
    <?php foreach ($data as $a) { ?>
        <p>用户名:<?php echo $a['user_name'] ?>用户ip:<?php echo $a['user_ip']; ?></p>
        <p>建议:<?php echo $a['content'] ?></p>
    <?php } ?>
    <p><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>">返回上一页</a></p>
</div>

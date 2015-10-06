<center>问卷名称：<?php echo $data[0]['title']?></center>
<?php $i=1; foreach ($data_issue as $a){?>
	<p class="title"><?php echo $i.",".$a['issue']?></p>
	<?php foreach ($data_item as $b){?>
		<p class="item"><?php if($a['id'] == $b['issue_id']){echo "选项票数:".$b['item']."——".$b['selected'];}?></p>
	<?php }?>
<?php $i++;}?>
<style type="text/css">
	.title{color:red}
	.item{color:green}
</style>
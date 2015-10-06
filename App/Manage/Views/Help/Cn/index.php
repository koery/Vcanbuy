
<a href="add">创建</a>
	<table border="1" >
		<tr>
			<td >ID</td>
			<td >创建时间</td>
			<td >标题</td>
			<td >主题</td>
			<td >内容</td>
			<td >排序号</td>
			<td >标题是否加粗</td>			
			<td >审核</td>
			<td >状态</td>
			<td >创建人</td>
			<td >审核人</td>
			<td >是否显示</td>
			<td >操作</td>
		</tr>
	  <?php foreach ( $data as $a ) {?>
	  <tr>
			<td><?php echo $a['help_id']?>&nbsp;</td>
			<td><?php echo $a['created']?>&nbsp;</td>
			<td><?php echo $a['class']?>&nbsp;</td>
			<td><?php echo $a['title_cn']?>&nbsp;</td>
			<td><?php echo $a['memo_cn']?>&nbsp;</td>
			<td><?php echo $a['orders']?>&nbsp;</td>
			<td><?php echo $a['tips']?>&nbsp;</td>
			<td><?php 
				$str = '<a href="audit?help_id='.$a['help_id'].'&status='.$a['status'].'" >';
				if ($a['status'] =='10000'){
					echo $str.'审核</a>';
				}else if ($a['status'] =='30000'){
                $strQuit = '<a href="auditQuit?help_id='.$a['help_id'].'&status='.$a['status'].'" >';
					echo $strQuit.'取消审核</a>';
				}else{
					echo '-';
				}
			 ?></td>
			<td><?php echo $a['status_cn']?>&nbsp;</td>
			<td><?php echo $a['created_name']?>&nbsp;</td>
			<td><?php echo $a['audit_name']?>&nbsp;</td>
			<td><?php echo $a['display']?>&nbsp;</td>
			<td><a href="update?help_id=<?php echo $a['help_id']?>" target="_blank">编辑</a></td>
	</tr>
	  <?php }?>
	</table>


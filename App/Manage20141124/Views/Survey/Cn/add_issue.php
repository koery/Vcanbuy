
<center>问卷名称：<?php echo $data[0]['title']?></center>
<div class="tab">
		<ul class="tabm">
			<li>添加单项问题</li>
			<li>添加多项问题</li>
			
		</ul>  
        <div class="con1">
        <form action="add_issue_save" method="post">
                 <div class="aa">问题:<input type = "text" name= "issue_title" size="80"/>
                 <input type="hidden" name = "id" value = "<?php echo $data[0]['id']?>"/>
                 	<input type = "submit" value ="添加问题"/>
                 </div>
         </form>
        
         <table border="1">
        
         	<tr>
         		<td>序号</td>
         		<td>问题</td>
         		<td>选项</td>
         		<td>状态</td>
         		<td>修改问题</td>
         		<td>操作选项</td>
         		<td>删除问题</td>
         		
         	</tr>
         	 <?php foreach ($data_issue as $a){?>
         	<tr>
         	
         		<td><?php echo $a['id']?></td>
         		<td><?php echo $a['issue']?></td>
         		<?php if(!empty($a['item']))
         		{echo "<td>".$a['item']."</td>";
         		}
         		else{
         			echo "<td><a href=add_item?id=".$a['id'].">操作选项</a></td>";}?>
         		<td><?php echo $a['status']?></td>
         		<td><a href="update_issue?id=<?php echo $a['id']?>">修改</a></td>
         		<td><a href="add_item?id=<?php echo $a['id']?>">操作选项</a></td>
         		<td><a href="delete_issue?id=<?php echo $a['id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
         	</tr>
         	 <?php }?>  
         </table>  
           <div class='page'>
	<?php echo $showPage;?>
</div>
<div class='pagetotal'>
	<?php echo $showTotal;?>
</div>
        </div>
        <div class="con2">
          
        <form action="add_issue_save" method="post">
                 <div class="aa">问题:<input type = "text" name= "issue_title2" size="80"/>
                 <input type="hidden" name = "id" value = "<?php echo $data[0]['id']?>"/>
                 	<input type = "submit" value ="添加问题"/>
                 </div>
         </form>
        
         <table border="1">
        
         	<tr>
         		<td>序号</td>
         		<td>问题</td>
         		<td>选项</td>
         		<td>状态</td>
         		<td>修改问题</td>
         		<td>操作选项</td>
         		<td>删除问题</td>
         		
         	</tr>
         	 <?php foreach ($data_issue2 as $a2){?>
         	<tr>
         	
         		<td><?php echo $a2['id']?></td>
         		<td><?php echo $a2['issue']?></td>
         		<?php if(!empty($a2['item']))
         		{echo "<td>".$a2['item']."</td>";
         		}
         		else{
         			echo "<td><a href=add_oitem?id=".$a2['id'].">操作选项</a></td>";}?>
         			<td><?php echo $a['status']?></td>
         		<td><a href="update_issue?id=<?php echo $a2['id']?>">修改</a></td>
         		<td><a href="add_oitem?id=<?php echo $a2['id']?>">操作选项</a></td>
         		<td><a href="delete_issue?id=<?php echo $a2['id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
         	</tr>
         	 <?php }?>  
         </table>  
           <div class='page'>
	<?php echo $showPage2;?>
</div>
<div class='pagetotal'>
	<?php echo $showTotal2;?>
</div>
        </div>
</div>

<div class="preview"><a href="preview?id=<?php echo $data[0]['id'];?>">预览</a></div>
<div class="preview"><a href="index">返回上一页</a></div>
<div class="clear">
</div>
<div class="footer"></div>
<script type="text/javascript">
				$(function () {
				   $('.tab ul.tabm li').click(function(){
						var Index = $(this).index();
						$(this).addClass('active').siblings().removeClass('active');
						$('.tab').children('div').eq(Index).show().siblings('div').hide();
				   });
				});
</script>
<style type="text/css">
	.tabm li{
	float:left;
	cursor: pointer;
	list-style:none;
	margin-right:50px;
	}
	.active{color:#ff0000;}
	.clear{
		clear:both;
	}
	.con1{
	clear:both;
	}
	.con1,.con2{
	display:none;clear:both;
	}
	.footer{height:500px}
</style>
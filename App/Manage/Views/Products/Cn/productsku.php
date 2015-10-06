<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>VCANBUY后台管理系统</title>
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>common.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="<?php echo APP_CSS_PUBLIC_PATH?>main.css" rel="stylesheet" type="text/css" />
</head>


<body>


<div class="container clearfix">   
    <div class="main-wrap">
        <div class="crumb-wrap">
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">产品属性列表</span></div>
        </div>
        <div class="search-wrap">
            <div class="search-content">
                <form action="#" method="post">
                    <table class="search-tab">
                        <tr>
                            <th width="120">选择分类:</th>
                            <td>
                                <select name="search-sort" id="">
                                    <option value="">全部</option>
                                    <option value="19">精品界面</option><option value="20">推荐界面</option>
                                </select>
                            </td>
                            <th width="70">关键字:</th>
                            <td><input class="common-text" placeholder="关键字" name="keywords" value="" id="" type="text"></td>
                            <td><input class="btn btn-primary btn2" name="sub" value="查询" type="submit"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="result-wrap">
            <form name="myform" id="myform" method="post">
                <div class="result-title">
                    <div class="result-list">
                        <a href="../products/addproductsku"><i class="icon-font"></i>新增产品属性</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>sku_id</th>
                            <th>pid</th>
                            <th>p-name</th>
                            <th>p-code</th>
                            <th>name</th>
                            <th>code</th>                         
                            <th colspan=1>操作</th>
                        </tr>
                       
                        <?php 
						  print_r($productsku);
						  foreach ( $productsku as $data ) {
						  			if($data['value']){
						  				foreach ( $data['value'] as $a ) {
						  	?>
						  <tr>
					            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
	                            <td>
	                                <input name="ids[]" value="59" type="hidden">
	                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
	                            </td>	  
						        <td><?php echo $a['id']?></td>
						        <td><?php echo $data['id']?></td>
						        <td><?php echo $data['property']?></td>	       
						        <td><?php echo $data['name']?></td>
						        <td><?php echo $a['property']?></td>	       
						        <td><?php echo $a['name']?></td>
					
								<td><a href="deleteproductsku?id=<?php echo $a['id']?>" onclick="return confirm('您确定删除吗？')" >删除</a></td>			
							</tr>
						  <?php 
								  		 }
									}else{
							?>	
					
							<tr>
							 <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>	
				            <td><?php echo $data['id']?></td>
					        <td><?php echo $data['id']?></td>
					        <td><?php echo $data['property']?></td>	       
					        <td><?php echo $data['name']?></td>
					        <td>--</td>	       
					        <td>--</td>
				
							<td><a href="deleteproductsku?id=<?php echo $data['id']?>" onclick="return confirm('您确定删除吗？')" >删除</a></td>			
						</tr>
				
				
						<?php 
								}
					      }
					  ?>
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    
</div>

	

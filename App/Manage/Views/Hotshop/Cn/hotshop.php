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
            <div class="crumb-list"><i class="icon-font"></i><a href="../right/right">首页</a><span class="crumb-step">&gt;</span><span class="crumb-name">热门店铺列表</span></div>
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
                        <a href="../hotshop/add"><i class="icon-font"></i>新增热门店铺</a>
                        <a id="batchDel" href="javascript:void(0)"><i class="icon-font"></i>批量删除</a>
                        <a id="updateOrd" href="javascript:void(0)"><i class="icon-font"></i>更新排序</a>
                    </div>
                </div>
                <div class="result-content">
                    <table class="result-tab" width="100%">
                        <tr>
                            <th class="tc" width="5%"><input class="allChoose" name="" type="checkbox"></th>
                            <th>排序</th>
                            <th>建立时间</th>
                            <th>开始时间</th>
                            <th>结束时间</th>
                            <th>主题</th>
                            <th>语言</th>                                                  
                            <th>状态</th>
                            <th>排序</th>  
                            <th>图片</th>  
                           
                            <th colspan=4>操作</th>
                        </tr>
                       
                        <?php foreach ( $hotshop as $a ) {?>
                         <tr>
                            <td class="tc"><input name="id[]" value="59" type="checkbox"></td>
                            <td>
                                <input name="ids[]" value="59" type="hidden">
                                <input class="common-input sort-input" name="ord[]" value="0" type="text">
                            </td>
				             <td><?php echo $a['created']?></td>
							<td><?php echo $a['start_time']?></td>
							<td><?php echo $a['end_time']?></td>
							<td><?php echo $a['title']?></td>
							<td><?php echo $a['language']?></td>
							<td><?php echo $a['status_cn']; ?></td>	
							<td><?php echo $a['orders']; ?></td>	
						    <td><img src="<?php echo $a['img_path']?>" height="60" /> </td> 
			              <td><?php 
							$str = '<a href="audit?id='.$a['shop_id'].'&status='.$a['status'].'" >';
							if ($a['status'] =='10000'){
								echo $str.'审核</a>';
							}else if ($a['status'] =='20000'){
								echo $str.'取消审核</a>';
							}else{
								echo '-';
							}
						 ?></td>                                              
						  <td><a href="update?id=<?php echo $a['shop_id']?>" >修改</a></td>
						  <td><a href="delete?id=<?php echo $a['shop_id']?>" onclick="return confirm('您确定删除吗？')">删除</a></td>
                        </tr>
	  
	  <?php }?>                      
                      
                    </table>
                    <div class="list-page"> 2 条 1/1 页</div>
                </div>
            </form>
        </div>
    </div>
    
</div>

	


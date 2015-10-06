<?php

class ProductlistController extends Controller {

    /**
     * 系统函数beforeAction 定义在该类中进行操作之前的动作
     * @access public
     */
    function beforeAction() {}

    /**
     * 系统函数afterAction 定义在该类中进行操作之后的动作
     * @access public
     */
    function afterAction() {}
 
    /**
     * productlist基本数据读取
     * @access public
     */
   function productlist(){
   	
   	/**
   	 * 获取顶部banner1数据
   	 *
   	 */
   	
   	$index = new Index();
   	 
   	$banner1 = $index->getBanner1();
   	 
   	if($banner1){
   		 
   		$this->assign('banner1', $banner1);
   		 
   	}
 //	$Productlist = new Productlists();
   	
//    	//获取目录
//    	$categoryProductlist = $Productlist->getCategoryProductlist();
   	
//    	if($categoryProductlist){
//    		//print_r($categoryProductlist);
//    		$this->assign('categoryProductlist', $categoryProductlist);
//    	}
   	

   	//获得关键词
   	
//    	$KEY = get_post_value('key');
//    	$VALUE = get_post_value('value');
//    	$order = get_post_value('order');
   	//echo $KEY."=>".$VALUE;
   	/**
   	 * 获得产品列表
   	 * 
   	 * i.获得一级目录
   	 *  
   	 *    显示一级目录推荐
   	 * 
   	 * ii.获得二级目录
   	 * 
   	 * 	   显示二级目录推荐
   	 * 
   	 * iii  获得三级目录
   	 * 
   	 *   显示三级目录产品信息 
   	 */
    //	$productlist = $Productlist->getProductlist();
   	
//    	if($productlist){
//    		//print_r($productlist);
//    		$this->assign('KEY', $KEY);
//    		$this->assign('VALUE', $VALUE);
//    		$this->assign('productlist', $productlist);
//    	}
   	
   	
   }//productlist() 结束
    
    
}

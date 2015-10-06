<?php
class CategoryController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		
	}
	/**
	 * 系统函数
	 * @access public
	 */
	function afterAction() {
	}
	
	
	/**
	 * 获得一级类目数据
	 * @access public
	 */
	function category1(){
		
		
		$category1 = new Category();
		
		$category1Date = $category1->getcategory1Date();

		if($category1Date){
			
			$this->assign('category1Date', $category1Date);
		}
		
		
	}
	
	
	
	
	function auditCategory1(){
		$id = get_post_value('id');
		$status = get_post_value('status');
	
		//只可修改审核状态
		if (!in_array($status, array('10000','20000'))){
			echo '<br>数据不可修改.<a href="category1">返回</a><br>';
			return ;
		}
		
	
		$field = array (
				'status' => ($status =='10000'?'20000':'10000')
	
		);
		$m = new Category();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_product_category_1' );					//设置表名
		$m->setWhere('category_1_id','=',$id);				//设置Where条件
		$m->update();
	
		//返回
		echo '<br>操作成功,<a href="category1" >返回</a><br>';
	}
	
	
	
	/**
	 * 
	 * @access public
	 */
	function index(){
		$category_1 = get_post_value('category_1');
		$category_2 = get_post_value('category_2');
		
		$field = array (
				'category_1_id',
				'category_2_id',
				'category_2_cn',
				'category_2_th',
				'orders',
				'status',
				'created',
				'created_name',
				'audit_name' 
		);
		
		$m = new Category();
		$m->clear ();
		$m->setField ( $field );
		$m->setTable ( 'vcb_product_category_2' );
		$m->setWhere('status', '!=', '60000');
		if ($category_1 !=''){
			$m->setWhere('category_1_id', '=', $category_1);
		}
		if ($category_2!=''){
			$m->setWhere('category_2_cn', 'LIKE', '%'.$category_2.'%','AND','(');
			$m->setWhere('category_2_th', 'LIKE', '%'.$category_2.'%','OR',')');
		}
		$m->setOrderBy ( 'orders' );
		$count = $m->getRowsCount();
		
		$page = new Page($count);
		$parameter = array(
				'category_1'=>$category_1,
				'category_2'=>$category_2,
		);
		$page->setParameter($parameter);
		$showPage = $page->showPage();
		$showTotal = $page->showTotal();
		
		$m->setPage();
		$data = $m->select();
		
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_cn'] = $m->getStatus('cn',$status);
			$data[$i]['status_th'] =  $m->getStatus('th',$status);
			$data[$i]['category_1'] = $m->getCategory_1($data[$i]['category_1_id']);
		
		}
		
					
		$this->assign('data', $data);	
		$this->assign ('showPage', $showPage );			//输出分页
		$this->assign ('showTotal', $showTotal );		//输出分页合计
	}
	
	/**
	 * 
	 * 
	 * @access public
	 */
	function addCategory1() {
		
	}
	/**
	 * 
	 * 
	 * @access public
	 */
	function add_saveCategory1(){
		//查询国家是否已存在
		
		$category_1_cn = get_post_value('category_1_cn');
		$category_1_th = get_post_value('category_1_th');
		$category_1_url = get_post_value('category_1_url');
		$orders = get_post_value('order');

		if (!$this->verifyCategory1()){
			echo '<br> '.$category_1_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				
				'category_1_cn'=>trim($category_1_cn),
				'category_1_th' => trim($category_1_th),
				'category_1_url' => trim($category_1_url),
				'orders' =>$orders,
				'status' =>'10000'
			
		);
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_1' );			
		$m->setField ( $field );				
		$data = $m->insert ();				
		
		if (!$data){										
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add">继续添加</a>,<a href="category1">返回</a><br>';
		}
	}
	/**
	 * @access public
	 */
	
	function deleteCategory1(){
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Category();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_product_category_1' );				
		$m->setWhere('category_1_id','=',$id);				
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="category1" >返回</a><br>';
	}

	
	function updateCategory1(){
		$id = get_post_value('id');

		$category1 = new Category();
		
		$category1Date = $category1->getcategory1UpdateDate($id);
		
		if($category1Date){
				
			$this->assign('category1Date', $category1Date);
		}
		
	}
	
	function updateCategory2(){
		$id = get_post_value('id');
	
		$category2 = new Category();
	
		$category2Date = $category2->getcategory2UpdateDate($id);
	
		if($category2Date){
	
			$this->assign('category2Date', $category2Date);
		}
	
	}
	function updateCategory3(){
		$id = get_post_value('id');
	
		$category3 = new Category();
	
		$category3Date = $category3->getcategory3UpdateDate($id);
	
		if($category3Date){
	
			$this->assign('category3Date', $category3Date);
		}
	
	}
	/**
	 * 
	 * @access public
	 */
	function update_saveCategory1(){
		$id = get_post_value('id');
		
		$category_1_cn = get_post_value('category_1_cn');
		$category_1_th = get_post_value('category_1_th');
		$category_1_url = get_post_value('category_1_url');
		$orders = get_post_value('order');

		if (!$this->verifyCategory1($id)){
			echo '<br> '.$category_1_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				
				'category_1_cn'=>trim($category_1_cn),
				'category_1_th' => trim($category_1_th),
				'category_1_url' => trim($category_1_url),
				'orders' =>$orders,
				
		);
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_1' );
		$m->setField ( $field );
		$m->setWhere('category_1_id','=',$id);
		$data = $m->update ();
		
		
		//返回
		echo '<br>操作成功,<a href="category1" >返回</a><br>';
	}
	/**
	 * 判断是否存在
	 * @access private
	 * @param string $country_id
	 * @return true|false
	 */
	private function verifyCategory1($category_1_id = NULL){
		
		$category_1_cn = get_post_value('category_1_cn');
		$category_1_th = get_post_value('category_1_th');
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_1' );					
		$m->setWhere('status','!=','60000');					
		$m->setWhere('category_1_cn', '=', $category_1_cn,'AND','(');
		$m->setWhere('category_1_th', '=', $category_1_th,'OR',')');
		if ($category_1_id!= null){
			$m->setWhere('category_1_id','!=',$category_1_id);
		}
		
		$data = $m->getFieldValue('COUNT(*)');		//直接返回单条记录	
		
		return $data > 0 ? false : true;
		
	}
	
	/**
	 * 返回国家最大序号
	 * @access public
	 */
	function get_orders(){
		//查询最大序号
		$category_1 = get_post_value('category_1');
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_2' );				
		$m->setWhere('status', '!=', '60000');					
		$m->setWhere('category_1_id', '=', $category_1);				
		$data = $m->getFieldValue('MAX(orders) '); 
	
		// 设置新的序号
		if (is_null ( $data )) {
			$data = 1;
		} else {
			$data += 1;
		}
		$this->assign('message', $data);
		$this->setReturnType('message');							//只返回单值
	}
	
	
	
	/**
	 * 获得二级类目数据
	 * @access public
	 */
	function category2(){
	
	
		$category2 = new Category();
	
		$category2Date = $category2->getcategory2Date();
	
		if($category2Date){
				
			$this->assign('category2Date', $category2Date);
		}
	
	
	}
	
	

	/**
	 *
	 *新增二级目录
	 * @access public
	 */
	function addCategory2() {
		
		/**
		 * 获得一级目录数据
		 */
		$category1 = new Category();
		
		$category1Date = $category1->getcategory1Date();
		
		if($category1Date){
		
			$this->assign('category1Date', $category1Date);
		}
	
	}
	
	
	/**
	 *保存增加的二级目录数据
	 * @access public
	 */
	function add_saveCategory2(){
		
	
		$category_2_cn = get_post_value('category_2_cn');
		$category_2_th = get_post_value('category_2_th');
		$category_2_url = get_post_value('category_2_url');
		$category_1_id = get_post_value('category_1_id');
		$orders = get_post_value('order');
	
		if (!$this->verifyCategory2()){
			echo '<br> '.$category_2_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
	
		
		$field = array(
		
				
				'category_1_cn',
				'category_1_th'

		);
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_1' );
		$m->setField ( $field );
		$m->setWhere('category_1_id', '=', $category_1_id);
		$dataCategory1 = $m->select();
		
		print_r($dataCategory1);
		
		
		$category_1_cn = $dataCategory1[0]['category_1_cn'];
		$category_1_th = $dataCategory1[0]['category_1_th'];
		$field = array(
	
				'category_1_id' => $category_1_id,
				'category_1_cn'=>trim($category_1_cn),
				'category_1_th' => trim($category_1_th),
				'category_2_cn'=>trim($category_2_cn),
				'category_2_th' => trim($category_2_th),
				'category_2_url' => trim($category_2_url),
				'orders' =>$orders,
				'status' =>'10000'
		
		);
		
		$m->clear();
		$m->setTable ( 'vcb_product_category_2' );
		$m->setField ( $field );
		$data = $m->insert ();
	
		if (!$data){
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="addCategory2">继续添加</a>,<a href="category2">返回</a><br>';
		}
	}
	
	
	/**
	 * 判断是否存在
	 * @access private
	 * @param string 
	 * @return true|false
	 */
	private function verifyCategory2($category_2_id = NULL){
	
		$category_2_cn = get_post_value('category_2_cn');
		$category_2_th = get_post_value('category_2_th');
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_2' );
		$m->setWhere('status','!=','60000');
		$m->setWhere('category_2_cn', '=', $category_2_cn,'AND','(');
		$m->setWhere('category_2_th', '=', $category_2_th,'OR',')');
		if ($category_2_id!= null){
			$m->setWhere('category_2_id','!=',$category_2_id);
		}
	
		$data = $m->getFieldValue('COUNT(*)');		//直接返回单条记录
	
		return $data > 0 ? false : true;
	
	}
	

	
	/**
	 * 获得三级类目数据
	 * @access public
	 */
	function category3(){
	
	
		$category3 = new Category();
	
		$category3Date = $category3->getcategory3Date();
	
		if($category3Date){
	
			$this->assign('category3Date', $category3Date);
		}
	
	
	}
	
	
	

	/**
	 *
	 *新增三级目录
	 * @access public
	 */
	function addCategory3() {
	
		/**
		 * 获得一级目录数据
		 */
		$category1 = new Category();
	
		$category1Date = $category1->getcategory1Date();
	
		if($category1Date){
	
			$this->assign('category1Date', $category1Date);
		}
		
		/**
		 * 获得二级目录数据
		 */
		$category2 = new Category();
		
		$category2Date = $category2->getcategory2Date();
		
		if($category2Date){
		
			$this->assign('category2Date', $category2Date);
		}
		
	
	}
	
	
	/**
	 *保存增加的三级目录数据
	 * @access public
	 */
	function add_saveCategory3(){
	
		$category_3_cn = get_post_value('category_3_cn');
		$category_3_th = get_post_value('category_3_th');
		$category_3_url = get_post_value('category_3_url');
		
		$category_2_id = get_post_value('category_2_id');
		$category_1_id = get_post_value('category_1_id');
		$orders = get_post_value('order');
	
		if (!$this->verifyCategory3()){
			echo '<br> '.$category_3_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
	
	
		
		
		$field = array(
	
	
				'category_1_cn',
				'category_1_th'
	
		);
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_1' );
		$m->setField ( $field );
		$m->setWhere('category_1_id', '=', $category_1_id);
		$dataCategory1 = $m->select();
	
		print_r($dataCategory1);
		
		

		$field = array(
		
		
				'category_2_cn',
				'category_2_th'
		
		);
		$m->clear();
		$m->setTable ( 'vcb_product_category_2' );
		$m->setField ( $field );
		$m->setWhere('category_2_id', '=', $category_2_id);
		$dataCategory2 = $m->select();
		
		print_r($dataCategory2);
		
		
	
		$category_1_cn = $dataCategory1[0]['category_1_cn'];
		$category_1_th = $dataCategory1[0]['category_1_th'];
		$category_2_cn = $dataCategory2[0]['category_2_cn'];
		$category_2_th = $dataCategory2[0]['category_2_th'];
		
		
		$field = array(
	
				'category_1_id' => $category_1_id,
				'category_1_cn'=>trim($category_1_cn),
				'category_1_th' => trim($category_1_th),
				'category_2_id'=> $category_2_id,
				'category_2_cn'=>trim($category_2_cn),
				'category_2_th' => trim($category_2_th),
				'category_3_cn'=>trim($category_3_cn),
				'category_3_th' => trim($category_3_th),
				'category_3_url' => trim($category_3_url),
				'orders' =>$orders,
				'status' =>'10000'
				
				
	
		);
	
		$m->clear();
		$m->setTable ( 'vcb_product_category_3' );
		$m->setField ( $field );
		$data = $m->insert ();
	
		if (!$data){
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="addCategory3">继续添加</a>,<a href="category3">返回</a><br>';
		}
	}
	
	
	/**
	 * 判断是否存在
	 * @access private
	 * @param string
	 * @return true|false
	 */
	private function verifyCategory3($category_3_id = NULL){
	
		$category_3_cn = get_post_value('category_3_cn');
		$category_3_th = get_post_value('category_3_th');
		$m = new Category();
		$m->clear();
		$m->setTable ( 'vcb_product_category_3' );
		$m->setWhere('status','!=','60000');
		$m->setWhere('category_3_cn', '=', $category_3_cn,'AND','(');
		$m->setWhere('category_3_th', '=', $category_3_th,'OR',')');
		if ($category_2_id!= null){
			$m->setWhere('category_3_id','!=',$category_3_id);
		}
	
		$data = $m->getFieldValue('COUNT(*)');		//直接返回单条记录
	
		return $data > 0 ? false : true;
	
	}
	
	
	
	
	
}

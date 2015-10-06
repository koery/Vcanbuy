<?php
class Floor2Controller extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		$m = new Floor();
		$floor_1 = $m->getFloor_1_id();
		$this->assign('floor_1', $floor_1);	
	}
	/**
	 * 系统函数
	 * @access public
	 */
	function afterAction() {
	}
	/**
	 * 返回国家列表
	 * @access public
	 */
	function index(){
		$floor_1 = get_post_value('floor_1');
		$floor_2 = get_post_value('floor_2');
		
		$field = array (
				'floor_1_id',
				'floor_2_id',
				'floor_2_cn',
				'floor_2_th',
				'orders',
				'status',
				'created',
				'created_name',
				'audit_name' 
		);
		
		$m = new Floor();
		$m->clear ();
		$m->setField ( $field );
		$m->setTable ( 'vcb_product_floor_2' );
		$m->setWhere('status', '!=', '60000');
		if ($floor_1 !=''){
			$m->setWhere('floor_1_id', '=', $floor_1);
		}
		if ($floor_2!=''){
			$m->setWhere('floor_2_cn', 'LIKE', '%'.$floor_2.'%','AND','(');
			$m->setWhere('floor_2_th', 'LIKE', '%'.$floor_2.'%','OR',')');
		}
		$m->setOrderBy ( 'orders' );
		$count = $m->getRowsCount();
		
		$page = new Page($count);
		$parameter = array(
				'floor_1'=>$floor_1,
				'floor_2'=>$floor_2,
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
			$data[$i]['floor_1'] = $m->getFloor_1($data[$i]['floor_1_id']);
		
		}
		
					
		$this->assign('data', $data);	
		$this->assign ('showPage', $showPage );			//输出分页
		$this->assign ('showTotal', $showTotal );		//输出分页合计
	}
	
	/**
	 * 返回新建国家初始信息
	 * 
	 * @access public
	 */
	function add() {
		
	}
	/**
	 * 保存新建国家信息
	 * 
	 * @access public
	 */
	function add_save(){
		//查询国家是否已存在
		$floor_1 = get_post_value('floor_1');
		$floor_2_cn = get_post_value('floor_2_cn');
		$floor_2_th = get_post_value('floor_2_th');
		$orders = get_post_value('orders');

		if (!$this->verify()){
			echo '<br> '.$floor_2_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				'floor_1_id' =>$floor_1,
				'floor_2_cn'=>trim($floor_2_cn),
				'floor_2_th' => trim($floor_2_th),
				'orders' =>$orders,
				'status' =>'10000',
				'created'=>date('Y-m-d H:i:s', time()),
				'created_name'=>'',
		);
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_2' );			
		$m->setField ( $field );				
		$data = $m->insert ();				
		
		if (!$data){										
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add">继续添加</a>,<a href="index">返回</a><br>';
		}
	}
	/**
	 * 删除国家
	 * @access public
	 */
	function delete(){
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Floor();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_product_floor_2' );				
		$m->setWhere('floor_2_id','=',$id);				
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}

	/**
	 * 返回更新国家信息
	 * @access public
	 */
	function update(){
		$id = get_post_value('id');
		
		$field = array (
				'floor_1_id',
				'floor_2_id',
				'floor_2_cn',
				'floor_2_th',
				'orders',
				'status',
				'created',
				'created_name',
				'audit_name' 
		);
		$m = new Floor();
		$m->clear ();
		$m->setField ( $field );
		$m->setTable ( 'vcb_product_floor_2' );
		$m->setWhere('status', '!=', '60000');
		$m->setWhere('floor_2_id', '=', $id);
		$m->setOrderBy ( 'orders' );
		$data = $m->select();
		

		$this->assign('data', $data);
	}
	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save(){
		$id = get_post_value('id');
		$floor_1 = get_post_value('floor_1');
		$floor_2_cn = get_post_value('floor_2_cn');
		$floor_2_th = get_post_value('floor_2_th');
		$orders = get_post_value('orders');

		if (!$this->verify($id)){
			echo '<br> '.$floor_2_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				'floor_1_id' =>$floor_1,
				'floor_2_cn'=>trim($floor_2_cn),
				'floor_2_th' => trim($floor_2_th),
				'orders' =>$orders,
				'created_name'=>'',
		);
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_2' );
		$m->setField ( $field );
		$m->setWhere('floor_2_id','=',$id);
		$data = $m->update ();
		
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 判断是否存在
	 * @access private
	 * @param string $country_id
	 * @return true|false
	 */
	private function verify($floor_2_id = NULL){
		$floor_1 = get_post_value('floor_1');
		$floor_2_cn = get_post_value('floor_2_cn');
		$floor_2_th = get_post_value('floor_2_th');
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_2' );					
		$m->setWhere('status','!=','60000');					
		$m->setWhere('floor_2_cn', '=', $floor_2_cn,'AND','(');
		$m->setWhere('floor_2_th', '=', $floor_2_th,'OR',')');
		if ($floor_2_id!= null){
			$m->setWhere('floor_2_id','!=',$floor_2_id);
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
		$floor_1 = get_post_value('floor_1');
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_2' );				
		$m->setWhere('status', '!=', '60000');					
		$m->setWhere('floor_1_id', '=', $floor_1);				
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
}

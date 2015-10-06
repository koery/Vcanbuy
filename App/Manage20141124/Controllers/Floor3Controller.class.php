<?php
class Floor3Controller extends Controller {
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
		$floor_3 = get_post_value('floor_3');
		$field = array (
				'floor_2.floor_1_id',
				'floor_2.floor_2_id',
				'floor_2.floor_2_cn',
				'floor_2.floor_2_th',
				'floor_3.floor_3_id',
				'floor_3.floor_3_cn',
				'floor_3.floor_3_th',
				'floor_3.orders',
				'floor_3.status',
				'floor_3.created',
				'floor_3.created_name',
				'floor_3.audit_name',
				'floor_3.start_time',
				'floor_3.end_time' 
		);
		$m = new Floor();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_product_floor_3 AS floor_3' );
		$m->setJoin('vcb_product_floor_2 as floor_2','floor_2.floor_2_id=floor_3.floor_2_id');
		$m->setWhere('floor_3.status', '!=', '60000');
		if ($floor_1 !=''){
			$m->setWhere('floor_3.floor_1_id', '=', $floor_1);
		}
		if ($floor_2 !=''){
			$m->setWhere('floor_3.floor_2_id', '=', $floor_2);
		}
		if ($floor_2!=''){
			$m->setWhere('floor_3.floor_3_cn', 'LIKE', '%'.$floor_3.'%','AND','(');
			$m->setWhere('floor_3.floor_3_th', 'LIKE', '%'.$floor_3.'%','OR',')');
		}
		$m->setOrderBy ( array(
				'floor_2.orders' =>'ASC',
				'floor_3.orders' =>'ASC',
			
		) );
		$count = $m->getRowsCount();
		
		$page = new Page($count);
		$parameter = array(
				'floor_1'=>$floor_1,
				'floor_2'=>$floor_2,
				'floor_3'=>$floor_3,
		);
		$page->setParameter($parameter);
		$showPage = $page->showPage();
		$showTotal = $page->showTotal();
		
		$m->setPage();
		/*$page->setListRows(5);
		$m->setLimit($page->listRows);*/
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
		
		if ($floor_1 !=''){
			$c_2 = $m->getFloor_2($floor_1);
			$this->assign('floor_2', $c_2);
		}else{
			$this->assign('floor_2', array());
		}
	}
	function get_floor_2(){
		$floor_1 = get_post_value('floor_1');
		$m = new Floor();
		$data = $m->getFloor_2($floor_1);		
		$this->assign('json', $data);
		$this->setReturnType('json');							//只返回单值
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
		$floor_2 = get_post_value('floor_2');
		$floor_3_cn = get_post_value('floor_3_cn');
		$floor_3_th = get_post_value('floor_3_th');
		$floor_3_url = get_post_value('floor_3_url');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$orders = get_post_value('orders');

		if (!$this->verify()){
			echo '<br> '.$floor_3_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				'floor_2_id'=>$floor_2,
				'floor_3_cn' => trim($floor_3_cn),
				'floor_3_th' => trim($floor_3_th),
				'floor_3_url'=>trim($floor_3_url)==''?'#':trim($floor_3_url),
				'orders' =>$orders,
				'status' =>'10000',
				'created'=>date('Y-m-d H:i:s', time()),
				'created_name'=>'',
				'start_time' =>$start_time,
				'end_time' =>$end_time,
		);
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_3' );			
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
		$m->setTable ( 'vcb_product_floor_3' );				
		$m->setWhere('floor_3_id','=',$id);				
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
				'floor_2.floor_1_id',
				'floor_2.floor_2_id',
				'floor_2.floor_2_cn',
				'floor_2.floor_2_th',
				'floor_3.floor_3_id',
				'floor_3.floor_3_cn',
				'floor_3.floor_3_th',
				'floor_3_url',
				'floor_3.orders',
				'floor_3.status',
				'floor_3.created',
				'floor_3.created_name',
				'floor_3.audit_name',
				'floor_3.start_time',
				'floor_3.end_time' 
		);
		$m = new Floor();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_product_floor_3 AS floor_3' );
		$m->setJoin('vcb_product_floor_2 as floor_2','floor_2.floor_2_id=floor_3.floor_2_id');
		$m->setWhere('floor_3.status', '!=', '60000');
		$m->setWhere('floor_3.floor_3_id', '=', $id);

		$m->setOrderBy ( array(
				'floor_2.orders' =>'ASC',
				'floor_3.orders' =>'ASC',
			
		) );
		$data = $m->select();

		$this->assign('data', $data);
		
		$floor_1_id = $data[0]['floor_1_id'];
		$m->clear();
		$field = array('floor_2_id','floor_2_cn');
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_product_floor_2' );
		$m->setWhere('status', '!=', '60000');
		$m->setWhere('floor_1_id', '=', $floor_1_id);
		$m->setOrderBy ( 'orders' );
		$data = $m->select();
		
		$this->assign('floor_2', $data);
	}
	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save(){
		$id = get_post_value('id');
		
		$floor_1 = get_post_value('floor_1');
		$floor_2 = get_post_value('floor_2');
		$floor_3_url = get_post_value('floor_3_url');
		$floor_3_cn = get_post_value('floor_3_cn');
		$floor_3_th = get_post_value('floor_3_th');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$orders = get_post_value('orders');
		
		if (!$this->verify($id)){
			echo '<br> '.$floor_3_cn.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				'floor_2_id'=>$floor_2,
				'floor_3_cn' => trim($floor_3_cn),
				'floor_3_th' => trim($floor_3_th),
				'floor_3_url'=>trim($floor_3_url)==''?'#':trim($floor_3_url),
				'orders' =>$orders,
				'status' =>'10000',
				'created'=>date('Y-m-d H:i:s', time()),
				'created_name'=>'',
				'start_time' =>$start_time,
				'end_time' =>$end_time,
		);
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_3' );
		$m->setField ( $field );
		$m->setWhere('floor_3_id','=',$id);
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
	private function verify($floor_3_id = NULL){
		$floor_2 = get_post_value('floor_2');
		$floor_3_cn = get_post_value('floor_3_cn');
		$floor_3_th = get_post_value('floor_3_th');
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_3' );					
		$m->setWhere('status','!=','60000');	
		$m->setWhere('floor_2_id','=',$floor_2);
		$m->setWhere('floor_3_cn', '=', $floor_3_cn,'AND','(');
		$m->setWhere('floor_3_th', '=', $floor_3_th,'OR',')');
		if ($floor_3_id!= null){
			$m->setWhere('floor_3_id','!=',$floor_3_id);
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
		$floor_2 = get_post_value('floor_2');
		$m = new Floor();
		$m->clear();
		$m->setTable ( 'vcb_product_floor_3' );				
		$m->setWhere('status', '!=', '60000');					
		$m->setWhere('floor_2_id', '=', $floor_2);				
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

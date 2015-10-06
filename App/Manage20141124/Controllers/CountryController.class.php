<?php
class CountryController extends Controller {
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
	 * 返回国家列表
	 * @access public
	 */
	function index(){
		$m = new Address();
		$data = $m->getCountry();				//返回查询国家数据(model模式)
		$this->assign('data', $data);						//输出到View页
	}
	
	/**
	 * 返回新建国家初始信息
	 * 
	 * @access public
	 */
	function add() {
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_country' ); // 设置表名
		$m->setWhere('status', '!=', '50000');					//设置查询条件
		$data = $m->getFieldValue('MAX(orders) as orders'); // 直接返回单条记录
		                                                                
		// 设置新的序号
		if (is_null ( $data )) {
			$data = 1;
		} else {
			$data += 1;
		}
		$this->assign ( 'data', $data ); // 输出到View页
		
	}
	/**
	 * 保存新建国家信息
	 * 
	 * @access public
	 */
	function add_save(){
		//查询国家是否已存在
		$country = get_post_value('country');

		if (!$this->verify()){
			echo '<br>大区  '.$country.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$status = get_post_value('status');
		$field = array(
				'country' =>trim($country),
				'orders'=>get_post_value('orders'),
				'status' => $status =='10000' ? '10000' : '30000',
		);
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_country' );					//设置表名
		$m->setField ( $field );				//设置更新字段及值，(键值数组) 
		$data = $m->insert ();					//插入数据
		
		if (!$data){										//插入数据是否成功。
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
				'status' => '50000' 
		);
		$m = new Address();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_address_country' );					//设置表名
		$m->setWhere('country_id','=',$id);				//设置Where条件 
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}

	/**
	 * 返回更新国家信息
	 * @access public
	 */
	function update(){
		$m = new Address();
		$id = get_post_value('id');
		$data = $m->getCountry ( $id );				//返回查询国家数据(model模式)
		$this->assign('data', $data);
	}
	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save(){
		
		$id = get_post_value('id');
		$country = get_post_value('country');
		
		if (!$this->verify($id)){
			echo '<br>大区  '.$country.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		
		$status = get_post_value('status');
		$field = array(
				'country' =>trim($country),
				'orders'=>get_post_value('orders'),
				'status' => $status =='10000' ? '10000' : '30000',
		);
		//判断country是否已存在
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_country' );					//设置表名
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setWhere('country_id','=',$id);						//设置Where条件 
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 判断国定是否存在
	 * @access private
	 * @param string $country_id
	 * @return true|false
	 */
	private function verify($country_id = NULL){
		$country = get_post_value('country');
		
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_country' );					//设置表名
		if ($country_id!= null){
			$m->setWhere('country_id','!=',$country_id);			//设置Where条件\
		}
		$m->setWhere('status','!=','50000');					//设置Where条件 (可多个)
		$m->setWhere('country','=',trim($country));	//国家
		$data = $m->getFieldValue('COUNT(*)');		//直接返回单条记录	
		
		return $data > 0 ? false : true;
		
	}
}

<?php
class RegionController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		$m =new Address();
		$data = $m->getCountry();				 
		$this->assign('country', $data);						 
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
		$m =new Address();
		
		$country = get_post_value('country');
		$region = get_post_value('region');
		$field = array (
				'country.country',
				'region.region_id',
				'region.region',
				'region.status',
				'region.orders' 
		);
			// 排序方法2
		$orderby = array (
				'country.orders',
				'region.orders' 
		);
		$m->clear();
		$m->setField ( $field );													
		$m->setWhere('country.status', '!=', '50000');						
		$m->setWhere('region.status', '!=', '50000');	
		if ($country !=''){
			$m->setWhere('country.country_id', '=', $country);
		}
		if ($region!=''){
			$m->setWhere('region.region', 'LIKE', '%'.$region.'%');
		}
		$m->setTable ( 'vcb_address_country AS country' );	
		$m->setJoin('vcb_address_region as region','country.country_id=region.country_id');		
		$m->setOrderBy ($orderby);
		
		$count = $m->getRowsCount();				//合计计录数
		
		//分页其他参数
		$page = new Page($count);
		$parameter = array(
				'country'=>$country,
		);
		$page->setParameter($parameter);
		$showPage = $page->showPage();
		$showTotal = $page->showTotal();
		
		$m->setPage();			
		$data = $m->select();
		
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$status = $data[$i]['status'];
			$data[$i]['status_name'] = $m->getStatus($status);
		}
		
		
		$this->assign ('data', $data );				//输出数据
		$this->assign ('showPage', $showPage );			//输出分页
		$this->assign ('showTotal', $showTotal );		//输出分页合计
		
	}

	/**
	 * 返回新建国家初始信息
	 * @access public
	 */
	function add(){
		
	}

	/**
	 * 保存新建大区信息
	 * 
	 * @access public
	 */
	function add_save(){
		//查询大区是否已存在
		$country = get_post_value('country');
		$region = get_post_value('region');
		$orders = get_post_value('orders');

		if (!$this->verify_region()){
			echo '<br>大区  '.$_POST['region'].' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		//保存新增数据(设置column及值)
		$field = array(
				'country_id' =>$country,
				'region' => $region,
				'orders'	=>$orders,
				'status' => isset($_POST ['status']) ? '10000' : '30000',							
		);
		
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_region' );
		$m->setField ( $field );				//设置更新字段及值，(键值数组) 
		$data = $m->insert ();					//插入数据
		
		if (!$data){										//插入数据是否成功。
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add?country='.$country.'&orders='.($orders+1).'">继续添加</a>,<a href="index">返回</a><br>';
		}
	}
	/**
	 * 删除国家
	 * @access public
	 */
	function delete(){
		$field = array(
				'status' =>'50000',
		);
		$m = new Address();
		$m->clear ();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_address_region' );					//设置表名
		$m->setWhere('region_id','=',get_post_value('id'));				//设置Where条件 
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
				'region_id',
				'country_id',
				'region',
				'status',
				'orders' 
		);
		$m = new Address();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_address_region' );	
		$m->setWhere('region_id', '=', $id);

		$data = $m->select();			
		$this->assign('data', $data);
	}
	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save(){
		//判断country是否已存在
		$id = get_post_value('id');
		$country = get_post_value('country');
		$region = get_post_value('region');
		$orders = get_post_value('orders');
		$status  = get_post_value('status');
		
		if (!$this->verify_region($id)){
			echo '<br>大区  '.$_POST['region'].' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$field = array(
				'country_id' =>$country,
				'region' => $region,
				'orders'	=>$orders,
				'status' => $status =='10000' ? '10000' : '30000',
		);
		
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_region' );
		$m->setField ( $field );								 
		$m->setWhere('region_id','=',$id);				 
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 返回国家最大序号
	 * @access public
	 */
	function get_orders(){
		//查询最大序号
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_region' );					
		$m->setWhere('status', '!=', '50000');					
		$m->setWhere('country_id', '=', get_post_value('country'));				
		$data = $m->getFieldValue('MAX(orders)'); 
	
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
	 * 判断大区是否存在
	 * @access private
	 * @param string $region_id 大区ID
	 * @return true|false
	 */
	private function verify_region($region_id = NULL){
		$country = get_post_value('country');
		$region = get_post_value('region');
		
		$m = new Address();
		$m->clear();
		$m->setTable ( 'vcb_address_region' );
		$m->setWhere('country_id', '=', $country);
		$m->setWhere('region', '=', $region);
		$m->setWhere('status', '!=', '50000');
		if ($region_id != null){
			$m->setWhere('region_id', '!=', $region_id);
		}
		$data = $m->getFieldValue('COUNT(*)'); // 直接返回单条记录
		
		return $data > 0 ? false : true;

	}
}

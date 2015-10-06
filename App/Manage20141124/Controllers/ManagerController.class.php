<?php
class ManagerController extends Controller {
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
		$m = new Manager();
		$data = $m->getManager();				//返回查询国家数据(model模式)
		$this->assign('data', $data);						//输出到View页
	}
	

	function add_save(){

		$username = get_post_value('username');
		$password = get_post_value('password');
		$name = get_post_value('name');
		$email = get_post_value('email');
		$sex = get_post_value('sex');
		$language = get_post_value('language');

		if (!$this->verify()){
			echo '<br>用户名  '.$username.' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
			return ;
		}
		
		$status = get_post_value('status');
		$field = array(
				'username' =>trim($username),
				'password' =>md5($password),
				'name' =>trim($name),
				'email' =>trim($email),
				'sex' =>trim($sex),
				'language' =>trim($language),
				'created'=> date('Y-m-d H:i:s', time()),
				'status' => $status =='10000' ? '10000' : '30000',
		);
		$m = new Manager();
		$m->clear();
		$m->setTable ( 'vcb_manage_user' );					//设置表名
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
		$m = new Manager();
		$m->clear();
		$m->setField ( $field );								
		$m->setTable ( 'vcb_manage_user' );					
		$m->setWhere('id','=',$id);				
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
		$m = new Manager();
		$data = $m->getManager ( $id );				
		$this->assign('data', $data);
	}
	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save(){
		$id = get_post_value('id');
		
		$name = get_post_value('name');
		$email = get_post_value('email');
		$sex = get_post_value('sex');
		$language = get_post_value('language');
		
		
		$status = get_post_value('status');
		$field = array(
				'name' =>trim($name),
				'email' =>trim($email),
				'sex' =>trim($sex),
				'language' =>trim($language),
				'status' => $status =='10000' ? '10000' : '30000',
		);
		
		//判断Manager是否已存在
		$m = new Manager();
		$m->clear();
		$m->setTable ( 'vcb_manage_user' );					//设置表名
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setWhere('id','=',$id);						//设置Where条件 
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	
	function update_psw_save(){
		$password = get_post_value('password');
		$id = get_post_value('id');
		$status = get_post_value('status');
		$field = array(
				'password' =>md5($password),
		);
		
		
		$m = new Manager();
		$m->clear();
		$m->setTable ( 'vcb_manage_user' );					//设置表名
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setWhere('id','=',$id);						//设置Where条件
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 判断
	 * @access private
	 * @param string $Manager_id
	 * @return true|false
	 */
	private function verify($id = NULL){
		$username = get_post_value('username');
		
		$m = new Manager();
		$m->clear();
		$m->setTable ( 'vcb_manage_user' );					
		if ($id!= null){
			$m->setWhere('id','!=',$id);			
		}
		$m->setWhere('status','!=','50000');					
		$m->setWhere('username','=',trim($username));	
		$data = $m->getFieldValue('COUNT(*)');		
		
		return $data > 0 ? false : true;
		
	}
}

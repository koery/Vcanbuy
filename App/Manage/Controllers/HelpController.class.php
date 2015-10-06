<?php
class HelpController extends Controller {
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
	 * 返回帮助信息列表
	 * @access public
	 */
	function index(){
		echo "hello help!<br/>";
		$m = new Help();
		$data = $m->getHelp();				//返回查询国家数据(model模式)

		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$data[$i]['status_cn'] = $m->getStatus('cn',$data[$i]['status']);
			$data[$i]['status_th'] = $m->getStatus('th',$data[$i]['status']);		
		}
		$this->assign('data', $data);						//输出到View页
	}
	

	function add_save(){
		$class= get_post_value('class');
		$title_cn= get_post_value('title_cn');
		$memo_cn = get_post_value('memo_cn');
		$orders = get_post_value('orders');
		$tips = get_post_value('tips');		
		$status = get_post_value('status');
		$display=get_post_value('display');
		$field = array(
				'class' =>$class,
				'title_cn' =>$title_cn,
				'memo_cn' =>$memo_cn,
				'orders' =>$orders,
				'tips' =>$tips,
				'created'=> date('Y-m-d H:i:s', time()),
				'status' =>'10000',
				'display'=>$display,
		);
		$m = new Help();
		$m->clear();
		$m->setTable ( 'vcb_help' );					//设置表名
		$m->setField ( $field );				//设置更新字段及值，(键值数组) 
		$data = $m->insert ();					//插入数据
		
		if (!$data){										//插入数据是否成功。
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add">继续添加</a>,<a href="index">返回</a><br>';
		}
	}
// 	/**
// 	 * 删除国家
// 	 * @access public
// 	 */
// 	function delete(){
// 		$id = get_post_value('id');
// 		$field = array (
// 				'status' => '50000' 
// 		);
// 		$m = new Bulletin();
// 		$m->clear();
// 		$m->setField ( $field );								
// 		$m->setTable ( 'vcb_manage_user' );					
// 		$m->setWhere('id','=',$id);				
// 		$m->update();
		
// 		//返回
// 		echo '<br>操作成功,<a href="index" >返回</a><br>';
// 	}

	/**
	 * 返回更新帮助信息
	 * @access public
	 */
	function update(){
		$id = get_post_value('help_id');
		$m = new Help();
		$data = $m->getHelp ( $id );				
		$this->assign('data', $data);
	}
	/**
	 * 更新公告栏信息
	 * @access public
	 */
	function update_save(){
		$class= get_post_value('class');
		$title_cn= get_post_value('title_cn');
		$memo_cn = get_post_value('memo_cn');
		$orders = get_post_value('orders');
		$tips = get_post_value('tips');	
		$help_id = get_post_value('help_id');
		$display=get_post_value('display');
		$field = array(
				'class' =>$class,
				'title_cn' =>$title_cn,
				'memo_cn' =>$memo_cn,
				'orders' =>$orders,
				'tips' =>$tips,
				'created'=> date('Y-m-d H:i:s', time()), 
				'display'=>$display,
		);
		//判断help是否已存在
		$m = new Help();
		$m->clear();
		$m->setTable ( 'vcb_help' );					//设置表名
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setWhere('help_id','=',$help_id);						//设置Where条件 
		$m->update();
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 返回审核公告栏信息
	 * @access public
	 */
	function audit(){
		$id = get_post_value('help_id');
		$m = new Help();
		$data = $m->getHelp ( $id );
		$this->assign('data', $data);
	}
	/**
	 * 审核公告栏信息
	 * @access public
	 */
	function audit_save(){
		$class= get_post_value('class');
		$title_cn= get_post_value('title_cn');
		$memo_cn = get_post_value('memo_cn');
		$orders = get_post_value('orders');
		$tips = get_post_value('tips');
		$help_id = get_post_value('help_id');
		$status = get_post_value('status');
		$display=get_post_value('display');
		$field = array(
				'class' =>$class,
				'title_cn' =>$title_cn,
				'memo_cn' =>$memo_cn,
				'orders' =>$orders,
				'tips' =>$tips,
				'created'=> date('Y-m-d H:i:s', time()),
				'status'=>'30000',
				'display'=>$display,
		);
		//判断Bulletin是否已存在
		$m = new Help();
		$m->clear();
		$m->setTable ( 'vcb_help' );					//设置表名
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setWhere('help_id','=',$help_id);						//设置Where条件
		$m->update();
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 取消审核
	 * @access public
	 */
	function auditQuit(){
		$id = get_post_value('help_id');
		$status = get_post_value('status');
		//只可修改审核状态
		if (!in_array($status, array('10000','30000'))){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return ;
		}
		if ($this->verify($status)){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return;
		}
	
		$field = array (
				'status' => ($status =='30000'?'10000':''),
		);
		$m = new Help();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_help' );					//设置表名
		$m->setWhere('help_id','=',$id);				//设置Where条件
		$m->update();
	
		//返回
         header("Location:index");
	}
	
	/**
	 * 判断是否可修改
	 * @access private
	 * @return true|false
	 */
	private function verify($status ='10000'){
		$id = get_post_value('help_id');
		$m = new Help();
		$m->clear();
		$m->setTable ( 'vcb_help' );
		$m->setWhere('help_id','=',$id);
		$m->setWhere('status','=',$status);
		$data = $m->getFieldValue('COUNT(*)');
	
		return $data > 0 ? false : true;
	
	}
	
}

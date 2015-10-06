<?php
class BannerController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		$m = new Banner();
		$type = $m->gettype();
		$language = $m->getLanguageList();
		
		$this->assign('type', $type);
		$this->assign('language', $language);
		
		
		$upload = new Upload();
		$this->assign('upload', $upload->show());
	
			
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
		$category = get_post_value('category');
		$language = get_post_value('language');
		$key = get_post_value('key');
		$field = array (
				'category_id',
				'type',
				'title',
				'created',
				'start_time',
				'end_time',
				'status',
				'language' 
		);
		$m = new Banner();
		$m->clear();											 
		$m->setField ( $field );									 
		$m->setTable ( 'vcb_banner_categor' );						 
		$m->setWhere('status', '!=', '60000');	
		if ($category >0){
			$m->setWhere('category', '=', $category);
		}	
		if ($language !=''){
			$m->setWhere('language', '=', $language);
		}	
		if ($key !=''){
			$m->setWhere('title', 'LIKE', '%'.$key.'%');
		} 
		$m->setOrderBy ( array('created'=>'DESC'));								 
		$data = $m->select();										 
		
		//状态标题
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$data[$i]['status_cn'] = $m->getStatus('cn',$data[$i]['status']);
			$data[$i]['status_th'] = $m->getStatus('th',$data[$i]['status']);
			$data[$i]['type_caption'] = $m->getTypeCaption($data[$i]['type']);
			$data[$i]['image_url'] = $m->getImage($data[$i]['category_id']);
			
		}
					
		$this->assign('data', $data);					
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
		$type = get_post_value('type');
		$title = get_post_value('title');
		$language = get_post_value('language');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		
		$field = array(
				'type' => $type,
				'title' => trim ( $title ),
				'language' => $language,
				'start_time' => $start_time,
				'end_time' => $end_time,
				'created_name' => '',
				'status' => '10000',
				'created' => gmdate('Y-m-d H:i:s', time() + 3600 * 8),
		);
		//保存主表
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_banner_categor' );				
		$m->setField ( $field );				
		$category_id = $m->insert ();					
		
		//保存子表
		$this->save_image($category_id);

		if (!$category_id){										
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
		if ($this->verify()){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return;
		}
		$id = get_post_value('id');
		$field = array (
				'status' => '60000' 
		);
		$m = new Banner();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_banner_categor' );					//设置表名
		$m->setWhere('category_id','=',$id);				//设置Where条件 
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	function audit(){
		$id = get_post_value('id');
		$status = get_post_value('status');
		//只可修改审核状态
		if (!in_array($status, array('10000','20000'))){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return ;
		}
		if ($this->verify($status)){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return;
		}
		
		$field = array (
				'status' => ($status =='10000'?'20000':'10000'),
				'audit_name' => '',
		);
		$m = new Banner();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_banner_categor' );					//设置表名
		$m->setWhere('category_id','=',$id);				//设置Where条件
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';	
	}
	/**
	 * 保存子表信息
	 * @access public
	 */
	function save_image($category_id){
		//保存子表
		$filename = get_post_value('filename');
		$m = new Banner();
		if ($filename!='' && count($filename)>0){
			$order = 0;
			foreach ($filename as $file ) {
				$field = array(
						'category_id' => $category_id,
						'image_url' => $file,
						'orders' =>$order,
						'status'=>'10000',
						'created'=> date('Y-m-d H:i:s', time()),
				);
				$m->clear();
				$m->setTable ( 'vcb_banner_images' );
				$m->setField ( $field );
				$data = $m->insert ();
				$order ++;
			}
		}
	}
	/**
	 * 返回更新国家信息
	 * @access public
	 */
	function update(){
		$id = get_post_value('id');
		$field = array (
				'category_id',
				'type',
				'title',
				'created',
				'start_time',
				'end_time',
				'status',
				'language' 
		);
		$m = new Banner();
		$m->clear();											 
		$m->setField ( $field );									 
		$m->setTable ( 'vcb_banner_categor' );						 
		$m->setWhere('category_id', '=', $id);		
		$m->setWhere('status', '!=', '60000');							 
		$data = $m->select();										 
				
		$this->assign('data', $data);
		
		//修改原记录
		
		//图像
		$field = array('image_url','orders','image_id');
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_banner_images' );
		$m->setWhere('category_id', '=', $id);
		$m->setWhere('status', '=', '10000');
		$m->setOrderBy ('orders');
		$data = $m->select();
		
		$this->assign('images', $data);
	}
	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save(){

		if ($this->verify('10000')){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return ;
		}
		
		$type = get_post_value('type');
		$title = get_post_value('title');
		$language = get_post_value('language');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$id = get_post_value('id');
		
		$field = array(
				'type' => $type,
				'title' => trim ( $title ),
				'language' => $language,
				'start_time' => $start_time,
				'end_time' => $end_time,
		);
		
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_banner_categor' );					
		$m->setField ( $field );								
		$m->setWhere('category_id','=',$id);				
		$m->update();
		
		//子表
		$m->clear();
		$field = array(
				'status' => '50000',
		);
		$m->setTable ( 'vcb_banner_images' );
		$m->setField ( $field );
		$m->setWhere('category_id','=',$id);
		$m->update();
		
		//保存子表
		$this->save_image($id);
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 * 上传图片
	 * @access 
	 * @return 
	 */
	function upload(){
		$upload = new Upload();
		$data =  $upload->save('banner');
		//$data = fn_upload('banner');
		$this->assign('message', $data);
		$this->setReturnType('message');						
	}
	/**
	 * 删除图片
	 */
	function image_delete() {
		$imgid = get_post_value('imgid');
		$category = get_post_value('id');
		
		$field = array(
				'status' => '50000',
		);
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_banner_images' );				 
		$m->setField ( $field );							 
		$m->setWhere('image_id','=',$imgid);					 
		$m->update();
		
		//返回
		echo '操作成功,<a href="update?id='.$category.'" >返回</a><br>';
	}
	/**
	 * 上移图片
	 */
	function image_move_up() {
		$imgid = get_post_value('imgid');
		$category = get_post_value('id');
		

	}
	/**
	 * 判断是否可修改
	 * @access private
	 * @return true|false
	 */
	private function verify($status ='10000'){
		$id = get_post_value('id');
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_banner_categor' );					
		$m->setWhere('category_id','=',$id);			
		$m->setWhere('status','=',$status);					
		$data = $m->getFieldValue('COUNT(*)');		
	
		return $data > 0 ? false : true;
	
	}
}

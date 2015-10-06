<?php
class BannerController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		$m = new Banner();
		
		$language = $m->getLanguageList();

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
	 * 返回banner 横幅列表
	 * @access public
	 */
	function index(){
		
		
		$field = array (
				'banner_id',				
				'img_path',
				'created',
				'start_time',
				'end_time',
				'title',
				'status',
				'orders',
				'language',
				'created_name',
				'audit_name'
		);
		$m = new Banner();
		$m->clear();											 
		$m->setField ( $field );									 
		$m->setTable ( 'vcb_index_banner1' );						 
		//$m->setWhere('status', '!=', '60000');//暂不设置	
		if ($type !=''){
			$m->setWhere('type', '=', $type);
		}	
		if ($language !=''){
			$m->setWhere('language', '=', $language);
		}	
		if ($key !=''){
			$m->setWhere('title', 'LIKE', '%'.$key.'%');
		} 
		$m->setOrderBy ( 'orders');								 
		$data = $m->select();
											 
		
		//状态标题    在每一条数据后加上4个数据
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$data[$i]['status_cn'] = $m->getStatus('cn',$data[$i]['status']);
			$data[$i]['status_th'] = $m->getStatus('th',$data[$i]['status']);					
			
		}
		//print_r($data) ;
		$this->assign('data', $data);					
	}
	
	/**
	 * 返回广告列表
	 * @access public
	 */
	function ads(){
	
	
		$field = array (
				'banner_id',
				'img_path',
				'created',
				'start_time',
				'end_time',
				'title',
				'status',
				'orders',
				'language',
				'created_name',
				'audit_name'
		);
		$m = new Banner();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_index_banner2' );
		//$m->setWhere('status', '!=', '60000');//暂不设置
		if ($type !=''){
			$m->setWhere('type', '=', $type);
		}
		if ($language !=''){
			$m->setWhere('language', '=', $language);
		}
		if ($key !=''){
			$m->setWhere('title', 'LIKE', '%'.$key.'%');
		}
		$m->setOrderBy ( 'orders');
		$data = $m->select();
	
	
		//状态标题    在每一条数据后加上4个数据
		$count = count($data);
		for($i = 0; $i < $count; $i ++) {
			$data[$i]['status_cn'] = $m->getStatus('cn',$data[$i]['status']);
			$data[$i]['status_th'] = $m->getStatus('th',$data[$i]['status']);
				
		}
		//print_r($data) ;
		$this->assign('data', $data);
	}
	
	
	
	
	
	/**
	 * 
	 * 
	 * @access public
	 */
	function add() {
		
	}
	
	
	function add_ads() {
	
	}
	/**
	 * 
	 * 
	 * @access public
	 */
	function add_save(){
		
		$title = get_post_value('title');
		$language = get_post_value('language');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$filename = get_post_value('filename');
		$num = count($filename);
		//print_r($filename);
		$m = new Banner();
		if ($filename!='' && count($filename)>0){
			$order = 0;
			for($i=0;$i<$num;$i++) {
				$field = array(
						
						'title' => trim ( $title ),
						'language' => $language,
						'start_time' => $start_time,
						'end_time' => $end_time,
						'created_name' => '',
						'status' => '10000',		
						'img_path' => '/Upload/'.$filename[$i],
						'orders' =>$order,					
						'created'=> date('Y-m-d H:i:s', time())
				);
				
				$m->clear();
				$m->setTable ( 'vcb_index_banner1' );				
				$m->setField ( $field );				
				$banner_id = $m->insert ();		
				$order ++;
			}
		}

		if (!$banner_id){										
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add">继续添加</a>,<a href="index">返回</a><br>';
		}
	}
	
	/**
	 *
	 *
	 * @access public
	 */
	function add_save_ads(){
	
		$title = get_post_value('title');
		$language = get_post_value('language');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$filename = get_post_value('filename');
		$num = count($filename);
		//print_r($filename);
		$m = new Banner();
		if ($filename!='' && count($filename)>0){
			$order = 0;
			for($i=0;$i<$num;$i++) {
				$field = array(
	
						'title' => trim ( $title ),
						'language' => $language,
						'start_time' => $start_time,
						'end_time' => $end_time,
						'created_name' => '',
						'status' => '10000',
						'img_path' => '/Upload/'.$filename[$i],
						'orders' =>$order,
						'created'=> date('Y-m-d H:i:s', time())
				);
	
				$m->clear();
				$m->setTable ( 'vcb_index_banner2' );
				$m->setField ( $field );
				$banner_id = $m->insert ();
				$order ++;
			}
		}
	
		if (!$banner_id){
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add_ads">继续添加</a>,<a href="ads">返回</a><br>';
		}
	}
	/**
	 * 
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
		$m->setTable ( 'vcb_index_banner1' );					//设置表名
		$m->setWhere('banner_id','=',$id);				//设置Where条件 
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	/**
	 *
	 * @access public
	 */
	function delete_ads(){
		if ($this->verify_ads()){
			echo '<br>数据不可修改.<a href="ads">返回</a><br>';
			return;
		}
		$id = get_post_value('id');
		$field = array (
				'status' => '60000'
		);
		$m = new Banner();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_index_banner2' );					//设置表名
		$m->setWhere('banner_id','=',$id);				//设置Where条件
		$m->update();
	
		//返回
		echo '<br>操作成功,<a href="ads" >返回</a><br>';
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
		$m->setTable ( 'vcb_index_banner1' );					//设置表名
		$m->setWhere('banner_id','=',$id);				//设置Where条件
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';	
	}
	
	
	function audit_ads(){
		$id = get_post_value('id');
		$status = get_post_value('status');
	
		//只可修改审核状态
		if (!in_array($status, array('10000','20000'))){
			echo '<br>数据不可修改.<a href="ads">返回</a><br>';
			return ;
		}
		if ($this->verify_ads($status)){
			echo '<br>数据不可修改.<a href="ads">返回</a><br>';
			return;
		}
	
		$field = array (
				'status' => ($status =='10000'?'20000':'10000'),
				'audit_name' => '',
		);
		$m = new Banner();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_index_banner2' );					//设置表名
		$m->setWhere('banner_id','=',$id);				//设置Where条件
		$m->update();
	
		//返回
		echo '<br>操作成功,<a href="ads" >返回</a><br>';
	}
	/**
	 * 保存子表信息
	 * @access public
	 */
	function save_image($banner_id){
		//保存子表
		echo $banner_id;
		$filename = get_post_value('filename');
		$fileurl = get_post_value('fileurl');
		$fileSubtitle = get_post_value('fileSubtitle');
		$filePrice = get_post_value('filePrice');
		$num = count($filename);
		
		print_r($filename);//$filename.$fileurl.$fileSubtitle.$filePrice;
		//print_r($fileurl);
		$m = new Banner();
		if ($filename!='' && count($filename)>0){
			$order = 0;
			for($i=0;$i<$num;$i++) {
				$field = array(
						
						'image_path' => '/Upload/'.$filename[$i],
						//'image_url' => $fileurl[$i],
						//'subtitle'=>$fileSubtitle[$i],
						//'price'=>$filePrice[$i],
						'orders' =>$order,
						'status'=>'10000',
						'created'=> date('Y-m-d H:i:s', time()),
				);
				$m->clear();
				$m->setTable ( 'vcb_index_banner1' );
				$m->setField ( $field );
				$data = $m->insert ();
				$order ++;
			}
		}
	}
	/**
	 * 
	 * @access public
	 */
	function update(){
		$id = get_post_value('id');
		$field = array (
				'banner_id',				
				'img_path',
				'created',
				'title',
				'start_time',
				'end_time',
				'orders',
				'language'
				
				
		);
		$m = new Banner();
		$m->clear();											 
		$m->setField ( $field );									 
		$m->setTable ( 'vcb_index_banner1' );						 
		$m->setWhere('banner_id', '=', $id);		
		$m->setWhere('status', '!=', '60000');							 
		$data = $m->select();										 
		print_r($data);		
		$this->assign('data', $data);
		
		
	}
	
	/**
	 *
	 * @access public
	 */
	function update_ads(){
		$id = get_post_value('id');
		$field = array (
				'banner_id',
				'img_path',
				'created',
				'title',
				'start_time',
				'end_time',
				'orders',
				'language'
	
	
		);
		$m = new Banner();
		$m->clear();
		$m->setField ( $field );
		$m->setTable ( 'vcb_index_banner2' );
		$m->setWhere('banner_id', '=', $id);
		$m->setWhere('status', '!=', '60000');
		$data = $m->select();
		//print_r($data);
		$this->assign('data', $data);
	
	
	}
	/**
	 * 
	 * @access public
	 */
	function update_save(){

		if ($this->verify('10000')){
			echo '<br>数据不可修改.<a href="index">返回</a><br>';
			return ;
		}
		
		
		$title = get_post_value('title');
		$language = get_post_value('language');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$orders = get_post_value('order');
		$id = get_post_value('id');
		
		$field = array(
				
				'title' => trim ( $title ),
				'language' => $language,
				'language' => $language,
				'orders' => $orders,
				'end_time' => $end_time,
		);
		
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_index_banner1' );					
		$m->setField ( $field );								
		$m->setWhere('banner_id','=',$id);				
		$m->update();
		
		
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}
	
	
	/**
	 *
	 * @access public
	 */
	function update_ads_save(){
	
		if ($this->verify('10000')){
			echo '<br>数据不可修改.<a href="ads">返回</a><br>';
			return ;
		}
	
	
		$title = get_post_value('title');
		$language = get_post_value('language');
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$orders = get_post_value('order');
		$id = get_post_value('id');
	
		$field = array(
	
				'title' => trim ( $title ),
				'language' => $language,
				'language' => $language,
				'orders' => $orders,
				'end_time' => $end_time,
		);
	
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_index_banner2' );
		$m->setField ( $field );
		$m->setWhere('banner_id','=',$id);
		$m->update();
	
	
		echo '<br>操作成功,<a href="ads" >返回</a><br>';
	}
	/**
	 * 上传图片
	 * @access 
	 * @return 
	 */
	function upload(){
		$upload = new Upload();
		$data =  $upload->save('Banner');
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
		//echo $id;
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_index_banner1' );					
		$m->setWhere('banner_id','=',$id);			
		$m->setWhere('status','=',$status);					
		$data = $m->getFieldValue('COUNT(*)');		
	
		return $data > 0 ? false : true;
	
	}
	private function verify_ads($status ='10000'){
		$id = get_post_value('id');
		//echo $id;
		$m = new Banner();
		$m->clear();
		$m->setTable ( 'vcb_index_banner2' );
		$m->setWhere('banner_id','=',$id);
		$m->setWhere('status','=',$status);
		$data = $m->getFieldValue('COUNT(*)');
	
		return $data > 0 ? false : true;
	
	}
}

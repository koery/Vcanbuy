<?php
class WebsiteController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		
		$website = new Website();
		
		$language = $website->getLanguageList();
		//print_r($language);
		
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
	function website(){
		
		
		
		$website = new Website();
		$websiteData = $website->getWebsite();
		
		if($websiteData){
			
			$this->assign('website',$websiteData);
			
		}
		
					
	}
	
	
	
	function audit(){
		$id = get_post_value('id');
		$status = get_post_value('status');
		
		//只可修改审核状态
		if (!in_array($status, array('10000','20000'))){
			echo '<br>数据不可修改.<a href="website">返回</a><br>';
			return ;
		}
		if ($this->verify($status)){
			echo '<br>数据不可修改.<a href="website">返回</a><br>';
			return;
		}
		
		$field = array (
				'status' => ($status =='10000'?'20000':'10000')
				
		);
		$m = new Website();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_index_website' );					//设置表名
		$m->setWhere('website_id','=',$id);				//设置Where条件
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="website" >返回</a><br>';	
	}
	
	
	
	/**
	 * 
	 * @access public
	 */
	function update(){
		
		$id = get_post_value('id');

		$website = new Website();
		$updateData = $website->getUpdateData($id);
		
		if($updateData){
				
			$this->assign('updateData',$updateData);
				
		}
		
		
		
		
	}
	
	
	/**
	 * 
	 * @access public
	 */
	function update_save(){

		if ($this->verify('10000')){
			echo '<br>数据不可修改.<a href="website">返回</a><br>';
			return ;
		}
		
		
		$img_url = get_post_value('img_url');
		$language = get_post_value('language');
		$website_name_th = get_post_value('website_name_th');
		$website_name_cn = get_post_value('website_name_cn');
		$orders = get_post_value('order');
		$id = get_post_value('id');
		
		$field = array(
				
				
				'img_url'=>$img_url,
				'language' => $language,
				'website_name_th'=>$website_name_th,
				'website_name_cn'=>$website_name_cn,
				'orders' => $orders,
				
		);
		
		$m = new Website();
		$m->clear();
		$m->setTable ( 'vcb_index_website' );					
		$m->setField ( $field );								
		$m->setWhere('website_id','=',$id);				
		$m->update();
		
		
		echo '<br>操作成功,<a href="website" >返回</a><br>';
	}
	
	/**
	 *
	 * @access public
	 */
	function delete(){
		if ($this->verify()){
			echo '<br>数据不可修改.<a href="website">返回</a><br>';
			return;
		}
		$id = get_post_value('id');
		$field = array (
				'status' => '60000'
		);
		$m = new Website();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_index_website' );					//设置表名
		$m->setWhere('website_id','=',$id);				//设置Where条件
		$m->update();
	
		//返回
		echo '<br>操作成功,<a href="website" >返回</a><br>';
	}
	
	function add(){
		
		
	}
	
	/**
	 *
	 *
	 * @access public
	 */
	function add_save(){

		$img_url = get_post_value('img_url');
		$language = get_post_value('language');
		$website_name_th = get_post_value('website_name_th');
		$website_name_cn = get_post_value('website_name_cn');
		$orders = get_post_value('order');
	
		$filename = get_post_value('filename');
		$num = count($filename);
		//print_r($filename);
		$m = new Website();
		if ($filename!='' && count($filename)>0){
			
				$field = array(
						
						

						'img_url'=>$img_url,
						'language' => $language,
						'website_name_th'=>$website_name_th,
						'website_name_cn'=>$website_name_cn,
						'orders' => $orders,
						'status' => '10000',
						'img_path' => '/Upload/'.$filename[0],
						'created'=> date('Y-m-d H:i:s', time())
				);
	
				$m->clear();
				$m->setTable ( 'vcb_index_website' );
				$m->setField ( $field );
				$websiter_id = $m->insert ();
				
			}
		
	
		if (!$websiter_id){
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add">继续添加</a>,<a href="website">返回</a><br>';
		}
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
		$m = new Website();
		$m->clear();
		$m->setTable ( 'vcb_index_website' );					
		$m->setWhere('website_id','=',$id);			
		$m->setWhere('status','=',$status);					
		$data = $m->getFieldValue('COUNT(*)');		
	
		return $data > 0 ? false : true;
	
	}
	
}

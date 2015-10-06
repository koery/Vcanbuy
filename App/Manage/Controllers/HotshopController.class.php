<?php
class HotshopController extends Controller {
	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		
		$hotshop = new Hotshop();
		
		$language = $hotshop->getLanguageList();
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
	function hotshop(){
		
		
		
		$hotshop = new Hotshop();
		$hotshopData = $hotshop->getHotshop();
		
		if($hotshopData){
			
			$this->assign('hotshop',$hotshopData);
			
		}
		
					
	}
	
	
	
	function audit(){
		$id = get_post_value('id');
		$status = get_post_value('status');
		
		//只可修改审核状态
		if (!in_array($status, array('10000','20000'))){
			echo '<br>数据不可修改.<a href="hotshop">返回</a><br>';
			return ;
		}
		if ($this->verify($status)){
			echo '<br>数据不可修改.<a href="hotshop">返回</a><br>';
			return;
		}
		
		$field = array (
				'status' => ($status =='10000'?'20000':'10000')
				
		);
		$m = new Hotshop();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_index_shop' );					//设置表名
		$m->setWhere('shop_id','=',$id);				//设置Where条件
		$m->update();
		
		//返回
		echo '<br>操作成功,<a href="hotshop" >返回</a><br>';	
	}
	
	
	
	/**
	 * 
	 * @access public
	 */
	function update(){
		
		$id = get_post_value('id');

		$hotshop = new Hotshop();
		$updateData = $hotshop->getUpdateData($id);
		
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
			echo '<br>数据不可修改.<a href="hotshop">返回</a><br>';
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
		
		$m = new Hotshop();
		$m->clear();
		$m->setTable ( 'vcb_index_shop' );
		$m->setField ( $field );
		$m->setWhere('shop_id','=',$id);
		$m->update();
		
		
		echo '<br>操作成功,<a href="hotshop" >返回</a><br>';
		}
		
	/**
	 *
	 * @access public
	 */
	function delete(){
		if ($this->verify()){
			echo '<br>数据不可修改.<a href="hotshop">返回</a><br>';
			return;
		}
		$id = get_post_value('id');
		$field = array (
				'status' => '60000'
		);
		$m = new Hotshop();
		$m->clear();
		$m->setField ( $field );								///设置更新字段及值，(键值数组)
		$m->setTable ( 'vcb_index_shop' );					//设置表名
		$m->setWhere('shop_id','=',$id);				//设置Where条件
		$m->update();
	
		//返回
		echo '<br>操作成功,<a href="hotshop" >返回</a><br>';
	}
	
	function add(){
		
		
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
		$m = new Hotshop();
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
				$m->setTable ( 'vcb_index_shop' );				
				$m->setField ( $field );				
				$shop_id = $m->insert ();		
				$order ++;
			}
		}

		if (!$shop_id){										
			echo '<br>保存失败<br>';
		}else{
			echo '<br>保存成功，<a href="add">继续添加</a>,<a href="hotshop">返回</a><br>';
		}
	}
	/**
	 * 上传图片
	 * @access 
	 * @return 
	 */
	function upload(){
		$upload = new Upload();
		$data =  $upload->save('Index/IndexShop');
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
		$m = new Hotshop();
		$m->clear();
		$m->setTable ( 'vcb_index_shop' );					
		$m->setWhere('shop_id','=',$id);			
		$m->setWhere('status','=',$status);					
		$data = $m->getFieldValue('COUNT(*)');		
	
		return $data > 0 ? false : true;
	
	}
	
}

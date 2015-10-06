<?php
class Hotproduct extends Model {	

	//初始化语言设置
	private $_lang = array(
		'cn'=>array(
					'10000' => "未审核",
					'20000' => "已审核",
					'30000' => "已发布",
					'40000' => "已下架",
					'50000' => "已关闭",
					'60000' => "已删除",
		),
		'th'=>array(
				'10000' => "ไม่ได้รับการตรวจสอบ ",
				'20000' => "ผ่านการตรวจสอบ ",
				'30000' => "ตีพิมพ์ ",
				'40000' => "มีการเก็บรักษา",
				'50000' => "ปิด ",
				'60000' => "ที่ถูกลบ",
		),	
	);

	function getLanguageList(){
		return array (
				'cn',
				'th'
		);
	}
	
	/**
	 * 返回状态标签
	 * @param srtring $lang :语言版本
	 * @param string $name :名称
	 */
	function getStatus($lang,$name) {
		return $this->_lang[$lang][$name];
	}
	
	
	function getHotproduct(){
		
		
		
		$field = array (
				
				'product_id',				
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
	
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_index_hot_product' );
		$this->setOrderBy ( 'orders');
		$data = $this->select();
		//print_r($data);
		$count = count($data);
			for($i = 0; $i < $count; $i ++) {
				$data[$i]['status_cn'] = $this->getStatus('cn',$data[$i]['status']);
				$data[$i]['status_th'] = $this->getStatus('th',$data[$i]['status']);					
				
			}
			//print_r($data);
		if($data){
			
			return $data;
		}
		
		
	}
	
	
	/**
	 *
	 * @access public
	 */
	function getUpdateData($id){
		
		$field = array (
				
				'product_id',				
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
		
		$this->clear();
		$this->setField ( $field );
		$this->setTable ( 'vcb_index_hot_product' );
		$this->setWhere('product_id', '=', $id);
		$this->setWhere('status', '!=', '60000');
		$data = $this->select();
		//print_r($data);
		
		if($data){
			
			return $data;
		}
	
	
	}

	
}

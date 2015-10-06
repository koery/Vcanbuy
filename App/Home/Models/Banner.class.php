<?php
class Banner extends Model {	

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
	
	/**
	 * 可使用语言版本
	 * @access public
	 * @return array
	 */
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
	function getImage($categoryId) {//获得对应categoryid的图片数组
		$field = array (
				'image_path',
				'image_url',
				'price',
				'subtitle'
				
		);
		$this->clear();
		$this->setField ($field);
		$this->setTable ( 'vcb_banner_images' );					
		//$this->setWhere('status','=','10000');//暂不设置
		$this->setWhere('category_id','=',$categoryId);//对应的category_id
		//$this->setOrderBy('orders');
		//$data = $this->getFieldValue('image_path');	
		$data = $this->select();
		//echo $categoryId."=>image_path=";
		//print_r($data);
		//echo "<br/>";
		return $data ;
	}
	

}

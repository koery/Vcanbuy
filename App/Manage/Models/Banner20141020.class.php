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
	//banner 类型
	private $_type = array(
			'10000'=>'整页大横幅',
			'20000'=>'活动横幅',
			'30000'=>'营销区',
			'40000'=>'主题区',
			'50101'=>'1楼1区',
			'50102'=>'1楼2区',
			'50103'=>'1楼3区',
			'50104'=>'1楼4区',
			'60101'=>'2楼1区',
			'60102'=>'2楼2区',
			'60103'=>'2楼3区',
			'60104'=>'2楼4区',
			'70101'=>'3楼1区',
			'70102'=>'3楼2区',
			'70103'=>'3楼3区',
			'70104'=>'3楼4区',
			'80101'=>'4楼1区',
			'80102'=>'4楼2区',
			'80103'=>'4楼3区',
			'80104'=>'4楼4区',
			'90101'=>'5楼1区',
			'90102'=>'5楼2区',
			'90103'=>'5楼3区',
			'90104'=>'5楼4区',
			'100101'=>'6楼1区',
			'100102'=>'6楼2区',
			'100103'=>'6楼3区',
			'100104'=>'6楼4区'
	);
	/**
	 * banner 类型
	 * @access public
	 * @return array
	 */
	function getType(){
		return $this->_type;
	}
	
	/**
	 * banner 类型
	 * @access public
	 * @return array
	 */
	function getTypeCaption($key){
		return $this->_type[$key];
	}
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
	function getImage($bannerId) {
		$this->clear();
		$this->setTable ( 'vcb_banner' );					
		$this->setWhere('status','!=','60000');
		$this->setWhere('banner_id','=',$bannerId);
		$this->setOrderBy('orders');
		$data = $this->getFieldValue('image_name');		
		
		return $data ;
	}
}

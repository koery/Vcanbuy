<?php
class Rotation extends Model {	

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
			'10000'=>'首页横幅',
			'20000'=>'活动横幅',
	);
	/**
	 * banner 类型
	 * @access public
	 * @return array
	 */
	function getType(){
		return $this->_type;
	}
function getTypeCaption($key){
		return $this->_type[$key];
	}
	
	/**
	 * banner 类型
	 * @access public
	 * @return array
	 */
	/**
	 * 可使用语言版本
	 * @access public
	 * @return array
	 */
	
	/**
	 * 返回状态标签
	 * @param srtring $lang :语言版本
	 * @param string $name :名称
	 */
}

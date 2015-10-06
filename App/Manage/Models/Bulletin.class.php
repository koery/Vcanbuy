<?php
class Bulletin extends Model {	
	
	//初始化语言设置
	private $_lang = array(
			'cn'=>array(
					'10000' => "未审核",
					'30000' => "已审核",
					'50000' => "已发布",
					'70000' => "已关闭",
					'90000' => "已删除",
			),
			'th'=>array(
					'10000' => "ไม่ได้รับการตรวจสอบ ",
					'30000' => "ผ่านการตรวจสอบ ",
					'50000' => "ตีพิมพ์ ",
					'70000' => "ปิด ",
					'90000' => "ที่ถูกลบ",
			),
	);
	/**
	 * 返回状态标签
	 * @param srtring $lang :语言版本
	 * @param string $name :名称
	 */
	function getStatus($lang,$name) {
		return $this->_lang[$lang][$name];
	}
	/**
	 * 返回国家列表
	 * @access public
	 * @param mixed $id 查询ID
	 * @return array
	 */
	function getBulletin($bulletin_id =''){
		$field = array (
			'bulletin_id',
			'created',
			'title_cn',
			'memo_cn',
			'orders',
			'tips',
			'hits',
			'status',
			'start_time',
			'end_time',
			'created_name',
			'audit_name'
		);
		$this->clear ();											//清除所有设置
		$this->setField ( $field );										//设置查询列(查询时索引数组)
		$this->setTable ( 'vcb_bulletin' );						//设置表名
		//$this->setWhere('status', '!=', '50000');						//设置where
		if ($bulletin_id !=''){
			$this->setWhere('bulletin_id', '=', $bulletin_id);
		}
		$this->setOrderBy ( 'bulletin_id' );									//设置排序	
		$data = $this->select();										//返回查询结果
		return $data;
	}
}

<?php
class Products extends Model {
	private $_website_id = array(
		'10000' =>'淘宝',
		'20000' =>'天猫',
		'30000' =>'阿里巴巴',
	);
/*
	 * 根据id返回字段
	 */
	function getproducts_id($id){
		$field = array(
				'product_url',
				'title_cn',
				'title_th',
				'category_3_id',
				'floor_3_id',
				'image_url',
				'product_url',
				'shop',
				'shop_id',
				'shop_url',
				'product_id',
				'status',
				'category_1_id',
				'sales_price',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable(' vcb_product ');
		$this->setWhere('product_id', '=', $id);
		$data = $this->select();
		return $data;
	}
}

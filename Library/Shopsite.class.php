<?php


/**
 * 订购平台
 * @author xxx
 *
 */
class Shopsite {
	private $_config = array(
		'10000' =>'淘宝',
		'20000'=>'天猫商城',
		'30000'=>'阿里巴巴（1688）'	,
	);
	/**
	 * 返回 淘宝 (shop_site) ID
	 */
	public static function taobao(){
		return 10000;
	}
	/**
	 * 返回 天猫 (shop_site) ID
	 */
	public static function tmall(){
		return 20000;
	}
	/**
	 * 返回阿里巴巴(shop_site) ID
	 */
	public static function al1688(){
		return 30000;
	}
	
	/**
	 * 
	 * @param int $site_id :平台ID
	 */
	public static function getName($site_id){
		return $this->_config[$site_id];
	}
	
}


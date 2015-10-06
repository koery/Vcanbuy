<?php
/**
 * 收藏夹
 * @author xxx
 *
 */
class Favorites extends Model{
	private $_user_id ;				//用户ID
	function __construct(){
		parent::__construct();
		$this->_user_id = Login::getUserId();
	}
	/**
	 * 添加收藏夹
	 */
	function addFavorites($shop_site,$shop_id,  $shop_username, $shop_url, $product_id, $product_url, $product,$image_url){
		$this->save($shop_site, $shop_id, $shop_username, $shop_url, $product_id, $product_url, $product,$image_url);
	}
	/**
	 * 把购物车商品移入收藏夹
	 * @param string $id :购物车ID
	 */
	function cartToFavorites($id){
		//购物车数据
		$field = array(
			'user_id',
			'shop_id',
			'shop_site',
			'shop_username',
			'shop_url',
			'product_id',
			'product_url',
			'product',
			'price',
			'image_url',
		);
		
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_cart');
		$this->setWhere('user_id', '=', $this->_user_id);
		$this->setWhere('cart_id', '=', $id);
		$data = $this->select();
		
		$a = $data[0];
	
		
		//加入收藏夹
		$user_id = $a ['user_id'];
		$shop_id = $a ['shop_id'];
		$shop_site = $a ['shop_site'];
		$shop_username = $a ['shop_username'];
		$shop_url = $a ['shop_url'];
		$product_id = $a ['product_id'];
		$product = $a ['product'];
		$product_url = $a['product_url'];
		$image_url = $a['image_url'];
		
		$this->save($shop_id, $shop_site, $shop_username, $shop_url, $product_id, $product_url, $product,$image_url);
		
		//是新购物车状态
		$this->clear();
		$field = array(
				'status' => '30000',
		);
		$this->setTable('vcb_cart');
		$this->setWhere('user_id', '=', $this->_user_id);
		$this->setWhere('cart_id', '=', $id);
		$this->update();
		
		return true;
	}
	/**
	 * 保存收藏夹
	 */
	private function save($shop_site,$shop_id, $shop_username, $shop_url, $product_id, $product_url, $product,$image_url) {
		//判读数据是否已收藏过
		if (!$this->verify($shop_site, $shop_id, $product_id)){
			return 0;
		}
		
		$field = array(
				'created'=>date('Y-m-d H:i:s', time()),
				'user_id' => $this->_user_id,
				'shop_site' => $shop_site,
				'shop_id' => $shop_id,
				'shop_username' => $shop_username,
				'shop_url' => $shop_url,
				'product_id' => $product_id,
				'product_url' =>$product_url,
				'product' => $product,
				'image_url'=>$image_url,
				'status' => '10000',
		);
		$this->clear();
		$this->setField($field);
		$this->setTable('vcb_favorites');
		$data = $this->insert();
		return $data;
	}
	/**
	 * 数据是否存在
	 * @param int $shop_site	:订购平台ID
	 * @param int $shop_id		：店铺ID
	 * @param int $product_id	:商品ID
	 */
	private function verify($shop_site,$shop_id,$product_id){
		$this->clear();
		$this->setTable('vcb_favorites');
		$this->setWhere('user_id', '=', $this->_user_id);
		$this->setWhere('shop_site', '=', $shop_site);
		$this->setWhere('shop_id', '=', $shop_id);
		$this->setWhere('product_id', '=', $product_id);
		$this->setWhere('status', '=', '10000');
		$data = $this->getFieldValue('COUNT(*)');
		
		return $data> 0 ? false : true;
	}
}
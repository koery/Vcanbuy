<?php
class Taobao{
	private $_url 				= NULL;			//原URL
	private $_productUrl		= NULL;			//新的URL
	private $_productId			= NULL;			//产品ID		
	private $_data				= array();		//结果
	private $_shopName			= NULL;			//店铺名称		
	private $_ump_price_list	= array();		//优惠价格	
	
	private $_properties_1 		= array();
	private $_properties_2 		= array();
	private $_prop_imgs			= array();
	/**
	 * 
	 * @param string $url			网址
	 */
	function __construct($url){
		$this->_url = trim(strtolower($url));
		if (strpos('http://detail.tmall.com', $url)){
			$this->_productUrl ='http://detail.tmall.com/item.htm?';
		}else{
			$this->_productUrl ='http://item.taobao.com/item.htm?';
		}
		$this->_productId = $this->getId();
		
		$this->parseUmpPromotion();
		$this->parseProduct();
		$this->parseShop();
		$this->parseProperties();
	}
	
	/**
	 * 网址分析
	 */
	private function getId(){
		$str =explode('?',$this->_url);

		$array = explode('&', $str[1]);
		foreach ($array as $key) {
			if (substr($key, 0,3)=='id='){
				return  substr($key, 3);
			}
		}
		return 0;
	}
	
	private function parseProduct(){
		$c = new TopClient;
		$c->appkey = TAOBAO_APP_KEY;
		$c->secretKey = TAOBAO_APPSECRET;
		$req = new ItemGetRequest;
		$req->setFields ( "detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_url,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,approve_status,postage_id,product_id,auction_point,property_alias,item_img,prop_img,sku,video,outer_id,is_virtual" );
		$req->setNumIid($this->_productId);
		//$req->setTrackIid("123_track_456");
		$resp = $c->execute($req, TAOBAO_SESSIONKEY);
		
		$this->_data = array();
		$this->_prop_imgs = array();
		foreach ($resp as $key ) {
			$key =(array)$key;
			$this->_shopName = $key ['nick'];
			$this->_data['product_id'] = $this->_productId;
			$this->_data ['product_url'] = $this->_productUrl . 'id=' . $this->_productId; // 商品URL
			$this->_data ['image_url'] = $key ['pic_url']; // 主图网址
			$this->_data ['product'] = $key ['title']; // 商品名
			$this->_data ['shop_url'] = $key ['detail_url']; // 商店URL
			$this->_data ['shop_username'] = $key ['nick']; // 卖家名称
			$this->_data ['price_cn'] = $key ['price']; // 单价(RMB)(定价)
			$this->_data['price_th'] = $key['price'] * RATE;
			$this->_data ['property_alias'] = $key ['property_alias']; // 颜色及尺码选择
			$this->_data['desc'] =$key['desc'];
		
			if (strpos($this->_productUrl, 'tmall.com')>0){
				$this->_data['shop_site'] = Shopsite::tmall();
			}else{
				$this->_data['shop_site'] = Shopsite::taobao();
			}
			// skus
			if (! empty ( $key ['skus'] )) {
				$skus = $key ['skus'];
				$this->_properties_2  = array();
				$this->_properties_2  = array();
				foreach ( $skus as $k ) {
					$k = ( array ) $k;
					$price = $k ['price'];
					$sku_id  = $k['sku_id'];
					$quantity = $k['quantity'];
					$properties = $k['properties'];
					$properties_name =$k ['properties_name'];
					
					$a =explode(';', $properties_name);
					if (!in_array($a[0], $this->_properties_1)){
						$this->_properties_1[] = $a[0];
					}
					if (count($a) ==2 && !in_array($a[1], $this->_properties_2)){
						$this->_properties_2[] = $a[1];
					}
	
		
					
					if ($quantity ==0) continue;
					
					if (!empty($this->_ump_price_list) && array_key_exists($sku_id,$this->_ump_price_list)){
						$price = $this->_ump_price_list[$sku_id];
					}
					$this->_data ['skus'] [] = array (
							'sku_id' => $sku_id,
							'price_cn' => $price,
							'price_th' => $price * RATE,
							'quantity' => $quantity,
							'properties' => $properties,
							'sku_name' => $properties_name ,
					);
				}
			}
			
			
			//产品小图
			if (!empty($key['item_imgs'])){
			$item_imgs = $key ['item_imgs'];
				foreach ( $item_imgs as $k ) {
					$k = ( array ) $k;
					$this->_data ['item_imgs'] [] = $k ['url']; // 产品小图
				}
			}
				
				// 颜色选择图片
			if (!empty($key ['prop_imgs'])) {
				$prop_imgs = $key ['prop_imgs'];
				foreach ( $prop_imgs as $k ) {
					$k = ( array ) $k;
					$this->_prop_imgs[] = array (
							'id' => $k ['id'], // ID
							'properties' => $k ['properties'], // 产品属性选择(颜色)
							'url' => $k ['url']  // 图片URL
							);
				}
			}
		}
	}
	private function parseShop() {
		$c = new TopClient;
		$c->appkey = TAOBAO_APP_KEY;
		$c->secretKey = TAOBAO_APPSECRET;
		$req = new ShopGetRequest ();
		$req->setFields ( "sid,cid,title,nick,desc,bulletin,pic_path,created,modified" );
		$req->setNick ( $this->_shopName );
		$resp = $c->execute ( $req );
		
		foreach ($resp as $key ) {
			$key =(array)$key;
			$this->_data['shop_id'] =$key['sid'];				//店铺ID
			$this->_data['shop'] = $key['title'];				//店铺名称
		}
	}
	/**
	 * 产品促销信息
	 */
	private function parseUmpPromotion() {
		$c = new TopClient ();
		$c->appkey = TAOBAO_APP_KEY;
		$c->secretKey = TAOBAO_APPSECRET;
		$req = new UmpPromotionGetRequest ();
		$req->setItemId ( $this->_productId );
		$resp = $c->execute ( $req, TAOBAO_SESSIONKEY );
		$resp =(array)$resp;
		if (empty($resp)){
			return ;
		}
// 		var_dump($resp);
		$this->_ump_price_list = array();
		foreach ( $resp as $key ) {
			$key = ( array ) $key;
				// if (empty($key)) return ;
				// echo '<br>--ump_price_list---<br>';
				// var_dump($key);
			if (! empty ( $key ['promotion_in_item'] )) {
				$promotion_in_item = ( array ) $key ['promotion_in_item'];
				$promotion_in_item = ( array ) $promotion_in_item ['promotion_in_item'];
				
				$sku_id_list = ( array ) $promotion_in_item ['sku_id_list'];
				$sku_id_list = $sku_id_list ['string'];
				
				$sku_price_list = ( array ) $promotion_in_item ['sku_price_list'];
				$sku_price_list = $sku_price_list ['price'];
				
				$count = count ( $sku_id_list );
				for($i = 0; $i < $count; $i ++) {
					$this->_ump_price_list [$sku_id_list [$i]] = $sku_price_list [$i];
				}
			}
		}
	}
	/**
	 * 属性分析
	 */
	private function parseProperties(){
		
		if (!empty($this->_prop_imgs)){
			$p =$this->_prop_imgs;	
		}else{
			$p = null;
		}

		$properties_1_name = null;
		foreach ($this->_properties_1 as $key) {
			$a = explode(':', $key);
			$url = null;
			if (! empty ( $p )) {
				foreach ( $p as $k ) {
					if ($k ['properties'] == $a [0] . ':' . $a [1]) {
						$url = $k ['url'];
						break;
					}
				};
			};
			$properties_1_name = $a[2];
			$this->_data['properties_1']['properties'][] = array(
					'id' => $a [0] . ':' . $a [1],
					'name' => $a [3],
					'url' => $url,	
			);
		}
		$this->_data['properties_1']['name'] = $properties_1_name;
		
		$properties_2_name = null;
		foreach ($this->_properties_2 as $key) {
			$a = explode(':', $key);
			$properties_2_name = $a[2];
			$this->_data['properties_2']['properties'][] = array(
					'id' => $a [0] . ':' . $a [1],
					'name' => $a [3],
			);
		}
		$this->_data['properties_2']['name'] = $properties_2_name;
		
	}
	/**
	 * 返回产品地址
	 */
	public function getProductUrl(){
		return $this->_productUrl. 'id='. $this->_productId;
	}
	public function getData(){
		return $this->_data;
	}
}
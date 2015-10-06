<?php
class Taobao{
	private $_url 				= NULL;			//原URL
	private $_productUrl		= NULL;			//新的URL
	private $_productId			= NULL;			//产品ID		
	private $_data				= array();		//结果
	private $_shopName			= NULL;			//店铺名称			
	/**
	 * 
	 * @param string $url			网址
	 */
	function __construct($url){
		$this->_url = $url;
		$this->_productUrl ='http://item.taobao.com/item.htm?';
		
		$this->parseUrl();
		$this->parseProduct();
		$this->parseShop();
	}
	
	/**
	 * 网址分析
	 */
	private function parseUrl(){
		$str = trim(strtolower($this->_url));
		if (substr($str, 0,7)!='http://'){
			$str ='http://'.$str;
		}
		
		if (strlen($str)<40){
			return ;
		}
		
		$i = strlen($this->_productUrl);
		$s_1 = substr($str, 0,$i);
		$s_2 = substr($str, $i);
		if ($s_1 !=$this->_productUrl){
			return ;	
		}
		
		$array = explode('&', $s_2);
		foreach ($array as $key) {
			if (substr($key, 0,3)=='id='){
				$this->_productId = substr($key, 3);
				break;
			}
		}
	}
	
	private function parseProduct(){
		$c = new TopClient;
		$c->appkey = TAOBAO_APP_KEY;
		$c->secretKey = TAOBAO_APPSECRET;
		$req = new ItemGetRequest;
		//$req->setFields ( "detail_url,num_iid,title,nick,type,cid,seller_cids,props,input_pids,input_str,desc,pic_url,num,valid_thru,list_time,delist_time,stuff_status,location,price,post_fee,express_fee,ems_fee,has_discount,freight_payer,has_invoice,has_warranty,has_showcase,modified,increment,approve_status,postage_id,product_id,auction_point,property_alias,item_img,prop_img,sku,video,outer_id,is_virtual" );
		$req->setFields("num_iid,title,price,desc_modules,pic_url,nick,detail_url");
		$req->setNumIid($this->_productId);
		//$req->setTrackIid("123_track_456");
		$resp = $c->execute($req, TAOBAO_SESSIONKEY);
		
		$this->_data = array();
		foreach ($resp as $key ) {
			$key =(array)$key;
			foreach ($key as $k => $v) {
				switch ($k) {
					case 'pic_url':
						$this->_data['pic_url'] =$v;
						break;
					case 'detail_url':
						$this->_data['shop_url'] =$v;
						break;
					case 'title':
						$this->_data['title'] =$v;
						break;
					case 'price':
						$this->_data['price'] =$v;
						break;
 					case 'nick':
 						$this->_data['shop_username'] =$v;
 						$this->_shopName = $v;
 						break;
				}
			}
		}
		print_r($this->_data);
	}
	private function parseShop() {
		$c = new TopClient;
		$c->appkey = TAOBAO_APP_KEY;
		$c->secretKey = TAOBAO_APPSECRET;
		$req = new ShopGetRequest ();
		$req->setFields ( "sid,cid,title,desc,bulletin,pic_path,created,modified" );
		$req->setNick ( $this->_shopName );
		$resp = $c->execute ( $req );
		
		foreach ($resp as $key ) {
			$key =(array)$key;
			foreach ($key as $k => $v) {
				if ($k =='sid'){
					$this->_data['shop_id'] =$v;
				}else if ($k =='title'){
					$this->_data['shop'] =$v;
				}
			}
		}
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
<?php
class SearchController extends Controller {
	/**
	 * 系统函数
	 * 
	 * @access public
	 */
	function beforeAction() {

	}
	/**
	 * 系统函数
	 * @access public
	 */
	function afterAction() {
	}
	/**
	 * 返回国家列表
	 * @access public
	 */
	function index(){
		
		$key = strtolower(get_post_value('key'));
		$field = array(
				'product_url',
				'title_cn',
				'title_th',
				'category_3_id',
				'floor_3_id',
				//'purchase_price',
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
		$m = new Products();
		$m->clear();
		$m->setTable ( 'vcb_product' );					//设置表名
		$m->setField ( $field );
		$m->setWhere('title_cn', 'LIKE', '%'.$key.'%','and','(');
		$m->setWhere('title_th', 'LIKE', '%'.$key.'%','or');
		$m->setWhere('shop', 'LIKE', '%'.$key.'%','or',')');
		$count = $m->getRowsCount();
		//var_dump($count);	
		$page = new Page($count,5);
		$parameter = array(
				
		);
		$page->setParameter($parameter);
		$showPage = $page->showPage();
		$showTotal = $page->showTotal();
		/*var_dump($showPage);
		var_dump($showTotal);*/
		$m->setPage();
		$page->setListRows(5);
		$m->setLimit($page->listRows);
		$data = $m->select();
		$this->assign('data',$data);		
		$this->assign('key',$key);
		$this->assign ('showPage', $showPage );			//输出分页
		$this->assign ('showTotal', $showTotal );
	}

	function add_cart() {
		$this->doNotRenderHeader =1;
		$user_id = Login::getUserId();
		$tourists_id = Login::getTouristsId();

		
		$m = new Cart();
		$data = $m->save_cart($user_id,$tourists_id);
		
		$this->assign('message', '1');
		$this->setReturnType('message');							
	}
	function get_cart(){
		$this->doNotRenderHeader =1;
		$m = new Cart();
		$data = $m->getCartInfo();
		
		$this->assign('message', $data);
		$this->setReturnType('message');
	}
	function add_favorites(){
		if (!Login::verifyLogin()){
			header("Location: ../login/index");
			exit;
		}
		
		$shop_id = get_post_value('shop_id');
		$shop_site = get_post_value('shop_site');
		$shop_username = get_post_value('shop_username');
		$shop_url = get_post_value('shop_url');
		$product_id = get_post_value('product_id');
		$product = get_post_value('product');
		$product_url = get_post_value('product_url');
		$image_url = get_post_value('image_url');
		
		$m = new Favorites();
		$data = $m->addFavorites($shop_site, $shop_id, $shop_username, $shop_url, $product_id, $product_url, $product,$image_url);
		$this->assign('message', $data);
		$this->setReturnType('message');
	}
}

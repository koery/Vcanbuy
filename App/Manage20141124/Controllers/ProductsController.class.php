<?php

class ProductsController extends Controller {

	/**
	 * 系统函数
	 * @access public
	 */
	function beforeAction() {
		$c = new Category();
		$category_1 = $c->getCategory_1_id();
		$this->assign('category_1', $category_1);

		$f = new Floor();
		$floor_1 = $f->getFloor_1_id();
		$this->assign('floor_1', $floor_1);
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
	function index() {
		$field = array(
            'product_url',
            'title_cn',
            'title_th',
            'category_3_id',
            'floor_3_id',
            'purchase_price',
            'image_url',
            'product_url',
            'shop_id',
            'shop_url',
            'product_id',
            'status',
		);
		$m = new Products();
		$m->clear();
		$m->setTable('vcb_product');     //设置表名
		$m->setField($field);
		$data = $m->select();
		$this->assign('data', $data);
	}

	function add2() {
		$url = strtolower(get_post_value('url'));
		if (substr($url, 0, 7) != 'http://') {
			$url = 'http://' . $url;
		}

		$product_url = null;
		if (substr($url, 0, 22) == 'http://item.taobao.com') {
			$taobao = new Taobao($url);
			$product_url = $taobao->getProductUrl();
			$data = $taobao->getData();

			$this->assign('product_url', $product_url);
			$this->assign('data', $data);
		} else {

		}

		$upload = new Upload();
		$this->assign('upload', $upload->show());
	}

	function upload() {
		$upload = new Upload();
		$data = $upload->save('products');
		//$data = fn_upload('banner');
		$this->assign('message', $data);
		$this->setReturnType('message');
	}

	/**
	 *
	 *
	 * @access public
	 */
	function add_save() {
		$product_url = get_post_value('product_url');
		$title_cn = get_post_value('title_cn');
		$title_th = get_post_value('title_th');
		$category_1 = get_post_value('category_1');
		$category_2 = get_post_value('category_2');
		$category_3 = get_post_value('category_3');
		$floor_1 = get_post_value('floor_1');
		$floor_2 = get_post_value('floor_2');
		$floor_3 = get_post_value('floor_3');
		$purchase_price = trim(get_post_value('purchase_price'));
		$sales_price = trim(get_post_value('sales_price'));
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$image_url = get_post_value('image_url');
		$product_url = get_post_value('product_url');
		$shop_id = get_post_value('shop_id');
		$shop = get_post_value('shop');
		$shop_url = get_post_value('shop_url');
		$preferential_price = get_post_value('preferential_price');

		$field = array(
            'product_url' => trim($product_url),
            'title_cn' => trim($title_cn),
            'title_th' => trim($title_th),
            'category_3_id' => trim($category_3),
            'floor_3_id' => trim($floor_3),
            'purchase_price' => intval($purchase_price),
            'sales_price' => intval($sales_price),
            'preferential_price' => intval($preferential_price),
            'image_url' => trim($image_url),
            'product_url' => trim($product_url),
		//'shop_id'=>trim($shop_id),
            'shop' => trim($shop),
		//'shop_url'=>trim($shop_url),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hits' => '0',
            'buys' => '0',
            'favorites' => '0',
            'created' => date('Y-m-d H:i:s', time()),
            'created_name' => '',
            'upload_name' => '',
            'status' => '10000',
            'category_1_id' => $category_1,
		);
		$m = new Products();
		$m->clear();
		$m->setTable('vcb_product');     //设置表名
		$m->setField($field);    //设置更新字段及值，(键值数组)
		$data = $m->insert();     //插入数据

		if (!$data) {          //插入数据是否成功。
			echo '<br>保存失败<br>';
		} else {
			echo '<br>保存成功，<a href="add1">继续添加</a>,<a href="index">返回</a><br>';
		}
	}

	/**
	 * 删除国家
	 * @access public
	 */
	function delete() {
		$id = get_post_value('id');
		$field = array(
            'status' => '50000'
            );
            $m = new Products();
            $m->clear();
            $m->setField($field);        ///设置更新字段及值，(键值数组)
            $m->setTable('vcb_product');     //设置表名
            $m->setWhere('product_id', '=', $id);    //设置Where条件
            $m->update();

            //返回
            echo '<br>操作成功,<a href="index" >返回</a><br>';
	}

	/**
	 * 返回更新国家信息
	 * @access public
	 */
	function update() {
		$id = get_post_value('id');
		$field = array(
            'product_url',
            'title_cn',
            'title_th',
            'category_3_id',
            'floor_3_id',
            'purchase_price',
            'image_url',
            'product_url',
            'shop_id',
            'shop_url',
            'product_id',
            'status',
            'shop',
            'sales_price',
            'purchase_price',
            'preferential_price',
		);
		$m = new Products();
		$m->clear();
		$m->setTable('vcb_product');     //设置表名
		$m->setWhere('product_id', '=', $id);
		$m->setField($field);
		$data = $m->select();
		var_dump($data);
		$this->assign('data', $data);
		$upload = new Upload();
		$this->assign('upload', $upload->show());
	}

	/**
	 * 更新国家信息
	 * @access public
	 */
	function update_save() {
		$id = get_post_value('product_id');
		$product_url = get_post_value('product_url');
		$title_cn = get_post_value('title_cn');
		$title_th = get_post_value('title_th');
		$category_1 = get_post_value('category_1');
		$category_2 = get_post_value('category_2');
		$category_3 = get_post_value('category_3');
		$floor_1 = get_post_value('floor_1');
		$floor_2 = get_post_value('floor_2');
		$floor_3 = get_post_value('floor_3');
		$purchase_price = trim(get_post_value('purchase_price'));
		$sales_price = trim(get_post_value('sales_price'));
		$start_time = get_post_value('start_time');
		$end_time = get_post_value('end_time');
		$image_url = trim(get_post_value('image_url')) == '' ? get_post_value('image_url_old') : get_post_value('image_url');
		$product_url = get_post_value('product_url');
		$shop_id = get_post_value('shop_id');
		$shop = get_post_value('shop');
		$shop_url = get_post_value('shop_url');
		$preferential_price = get_post_value('preferential_price');
		$field = array(
		//'product_url' =>trim($product_url),
            'title_cn' => trim($title_cn),
            'title_th' => trim($title_th),
            'category_3_id' => trim($category_3),
            'floor_3_id' => trim($floor_3),
            'purchase_price' => intval($purchase_price),
            'sales_price' => intval($sales_price),
            'preferential_price' => intval($preferential_price),
            'image_url' => trim($image_url),
            'product_url' => trim($product_url),
		//'shop_id'=>trim($shop_id),
            'shop' => trim($shop),
		//'shop_url'=>trim($shop_url),
            'start_time' => $start_time,
            'end_time' => $end_time,
            'hits' => '0',
            'buys' => '0',
            'favorites' => '0',
            'created' => time(),
            'created_name' => '',
            'upload_name' => '',
            'status' => '10000',
            'category_1_id' => $category_1,
		);
		$m = new Products();
		$m->clear();
		$m->setTable('vcb_product');     //设置表名
		$m->setField($field);        ///设置更新字段及值，(键值数组)
		$m->setWhere('product_id', '=', $id);      //设置Where条件
		$m->update();


		//返回
		echo '<br>操作成功,<a href="index" >返回</a><br>';
	}

	function get_category_2() {
		$category_1 = get_post_value('category_1');
		$m = new Category();
		$data = $m->getCategory_2($category_1);

		$this->assign('json', $data);

		$this->setReturnType('json');
	}

	function get_category_3() {
		$category_2 = get_post_value('category_2');
		$m = new Category();
		$data = $m->getCategory_3($category_2);

		$this->assign('json', $data);

		$this->setReturnType('json');
	}

	function get_floor_2() {
		$floor_1 = get_post_value('floor_1');
		$m = new Floor();
		$data = $m->getFloor_2($floor_1);

		$this->assign('json', $data);

		$this->setReturnType('json');
	}

	function get_floor_3() {
		$floor_2 = get_post_value('floor_2');
		$m = new Floor();
		$data = $m->getFloor_3($floor_2);
		$this->assign('json', $data);
		$this->
		setReturnType('json');
	}

	
	
	
	
	
	
	
	
	
	
	
	
	//商品属性添加
	function add_property() {

	}

	
	
	
	
	
	
	
	
	
	//验证
	private function verify(){
		
	}
	
	
	
	
	
	
	
	
	
	
	
	
}

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
        echo $url;
        if (substr($url, 0, 22) == 'http://item.taobao.com') {
        	echo $url;
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

    //商品种类页面
    function kind() {
        $id = get_post_value('id');
        $ve = $this->verify($id);
        if (!empty($ve)) {
            $field = array(
                'id',
                'product_id',
                'product_color',
                'created',
                'status',
                'image_url',
            );
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product_kind ');
            $m->setWhere('product_id', '=', $id);
            $data = $m->select();
            $this->assign('data', $data);
            $this->assign('pro_id', $id);
        } else {
            header('Location:error.php');
        }
    }

    //添加商品页面

    function add_kind() {
        $id = get_post_value('id');
        $ve = $this->verify($id);
        if (!empty($ve)) {
            $field = array(
                'id',
            );
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product_kind ');
            $m->setWhere('product_id', '=', $id);
            $data = $m->select();
            $this->assign('pro_id', $id);
            $upload = new Upload();
            $this->assign('upload', $upload->show());
        } else {
            header('Location:error.php');
        }
    }

    //添加商品种类保存
    function add_kindsave() {
        $id = get_post_value('id');
        $ve = $this->verify($id);
        $color = trim(get_post_value('color'));
        $sku = trim(get_post_value('sku'));
        $sku_name = trim(get_post_value('sku_name'));
        // var_dump($size);
        $image_url = trim(get_post_value('image_url'));
        var_dump($ve_kind);
        if (!empty($ve)) {
            $field = array(
                'product_id' => $id,
                'product_color' => $color,
                'created' => date('Y-m-d H:i:s', time()),
                'sku_name' => $sku_name,
                'sku' => $sku,
                'status' => 10000,
                'image_url' => $image_url,
            );
            var_dump($field);
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product_kind ');
            $data = $m->insert();
            if (empty($data)) {
                header('Location:error.php');
            } else {
                // header('Location:kind?id=' . $id);
                echo "<a href='add_kind?id=" . $id . "'>继续添加</a>";
            }
        } else {
            header('Location:error.php');
        }
    }

    //商品种类修改
    function update_kind() {
        $id = get_post_value('id');
        $field = array(
            'id',
            'product_id',
            'product_color',
            'image_url',
        );
        var_dump($field);
        $m = new Products();
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_kind ');
        $m->setWhere('id', '=', $id);
        $data = $m->select();
        $this->assign('data', $data);
        $upload = new Upload();
        $this->assign('upload', $upload->show());
    }

    //商品种类修改保存

    function update_kindsave() {
        $id = get_post_value('id');
        $color = trim(get_post_value('color'));
        $image_url = trim(get_post_value('image_url')) != '' ? trim(get_post_value('image_url')) : trim(get_post_value('image_url_old'));
        $field = array(
            'product_color' => $color,
            'image_url' => $image_url,
        );
        var_dump($field);
        $m = new Products();
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_kind ');
        $m->setWhere('id', '=', $id);
        $data = $m->update();
        if (empty($data)) {
            header('Location:error.php');
        } else {

            //echo "<a href='kind?id=" . $_SERVER['HTTP_REFERER'] . "'>点击返回</a>";
            header('Location:index');
        }
    }

    function add_size() {
        $id = get_post_value('id');
        $ve = $this->verify_kind($id);
        if (empty($ve)) {
            header('Location:error.php');
        }
        $m = new Products();
        $field = array(
            'id',
            'size',
            'sku',
            'sku_name',
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_ksize ');
        $m->setWhere('product_kind_id', ' = ', $id);
        $data = $m->select();
        $this->assign('data', $data);
        $this->assign('pro_k_id', $id);
    }

    function add_sizesave() {
        $size = trim(get_post_value('size'));
        $sku = trim(get_post_value('sku'));
        $sku_name = trim(get_post_value('sku_name'));
        $pro_k_id = get_post_value('pro_k_id');
        //echo $pro_k_id;
        $ve = $this->verify_kind($pro_k_id);
        // var_dump($ve);
        if (empty($ve)) {
            header('Location:error.php');
        }
        //  $arr_size = explode(',', $size);
        var_dump(count($arr_size));
        //  for ($i = 0; $i < count($arr_size); $i++) {
        $m = new Products();
        $field = array(
            'size' => $size,
            'sku' => $sku,
            'sku_name' => $sku_name,
            'product_kind_id' => $pro_k_id,
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_ksize ');
        $data = $m->insert();
        //}
        if (!empty($data)) {
            header('Location:add_size?id=' . $pro_k_id);
        }
    }

    function update_sizesave() {
        $size = trim(get_post_value('u_size'));
        $id = get_post_value('id');
        //echo $pro_k_id;
        $ve = $this->verify_kind($id);
        // var_dump($ve);
        if (empty($ve)) {
            header('Location:error.php');
        }
        $m = new Products();
        $field = array(
            'size' => $size,
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_ksize ');
        $m->setWhere('id', '=', $id);
        $data = $m->update();
        if (!empty($data)) {
            header('Location:add_size?id=' . $id);
        }
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

    //判断商品是否存在
    private function verify($id) {
        $m = new Products();
        $field = array(
            'product_id',
            'title_cn',
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product ');
        $m->setWhere('product_id', ' = ', $id);

        $data = $m->select();
        return $data;
    }

    private function verify_kind($id) {
        $m = new Products();
        $field = array(
            'id',
        );
        $m->clear();
        $m->setField($field);
        $m->setTable(' vcb_product_kind ');
        $m->setWhere('id', ' = ', $id);

        $data = $m->select();
        return $data;
    }

}

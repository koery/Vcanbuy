<?php

class OrdersController extends Controller {

    function beforeAction() {

    }

    function afterAction() {

    }

    function index() {
        if (!Login::verifyLogin()) {
            header("Location: ../../home/login/index");
            exit;
        }
        $user_id = "";
        if (isset($_SESSION['user_id'])) {
            $user_id = $_SESSION['user_id'];
            if (!empty($user_id)) {
                $user_data = Login::verify_login($user_id);
                if (!empty($user_data)) {
                    // var_dump($user_data);
                    $this->assign('user_data', $user_data);
                }
            }
        }
        $m_order = new Orders();
        $field = array(
            'ord.id',
            'ord.order_no',
            'ord.created',
            'ord.status',
            'ord.product_id',
            'ord.qty',
            'ord.freight',
            'pr.product_url',
            'pr.title_cn',
            'pr.title_th',
            'pr.category_3_id',
            'pr.floor_3_id',
            'pr.image_url',
            'pr.product_url',
            'pr.shop',
            'pr.shop_id',
            'pr.shop_url',
            'pr.product_id',
            'pr.status',
            'pr.category_1_id',
            'pr.sales_price',
        );
        $m_order->clear();
        $m_order->setField($field);
        $m_order->setTable(' vcb_order as ord');
        $m_order->setJoin(' vcb_product as pr ', 'ord.product_id=pr.product_id');
        $count = $m_order->getRowsCount();
        //var_dump($count);
        $page = new Page($count, 5);
        $parameter = array(
        );
        $page->setParameter($parameter);
        $showPage = $page->showPage();
        $showTotal = $page->showTotal();
        //var_dump($showPage);
        //var_dump($showTotal);
        $m_order->setPage();
        $page->setListRows(5);
        $m_order->setWhere('ord.user_id', '=', $user_id);
        $m_order->setWhere('ord.status', '!=', 60000);
        $m_order->setLimit($page->listRows);
        $order_data = $m_order->select();

        //	var_dump($order_data);
        /* $product_data = array();
          $m_product = new products();
          for($i = 0;$i<count($order_data);$i++){

          $product_data[$i] = $m_product->getproducts_id($order_data[$i]['product_id']);

          } */
        //var_dump($product_data);
        $this->assign('order_data', $order_data);
        $this->assign('showPage', $showPage);
        $this->assign('showTotal', $showTotal);
        //$this->assign('pro_data', $product_data);
    }

    function delete() {
        $id = get_post_value('id');
        $m = new Orders();
        $m->delete($id);
    }

}

<?php

class InlistController extends Controller {

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

    function index() {
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
        /* $id = get_post_value("id");
          $category_2_all = $this->get_category_2($id);
          //var_dump($category_2_all);
          $this->assign('category_2_all', $category_2_all);
          $category_3_all = $this->get_category_3($id);
          $this->assign('category_3_all', $category_3_all);
          $this->assign('kid', $id); */
        /* foreach ($category_3_all as $key => $value)
          {
          echo $value;
          } */
        $id = get_post_value("id");
        if (get_post_value('order') != null) {
            $order = get_post_value('order');
        } else {
            $order = '';
        }
        if (get_post_value('page') != null) {
            $pagea = get_post_value('page');
            //echo "pagea=".$pagea;
            //print_r(get_post_value('page'));
        } else {
            $pagea = 0;
            //echo "pagea=".$pagea;
        }
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
        if (empty($order)) {
            $m = new Products();
            $m->clear();
            $m->setTable('vcb_product');     //设置表名
            $m->setField($field);
            $m->setWhere('category_1_id', '=', $id);
            $count = $m->getRowsCount();         
            $page = new Page($count, 1);
            $parameter = array(
            );
            $page->setParameter($parameter);
            $showPage = $page->showPage();
            $showTotal = $page->showTotal();          
            $m->setPage();
            $page->setListRows(1);
            $m->setLimit($page->listRows);
            $data = $m->select();          
            $this->assign('data', $data);
            $this->assign('showPage', $showPage);   //输出分页
            $this->assign('showTotal', $showTotal);
           
        } else {
            $m = new Products();
            $m->clear();
            $m->setTable('vcb_product');     //设置表名
            $m->setField($field);
            $count = $m->getRowsCount();
            //var_dump($count);
            $page = new Page($count, 1);
            $parameter = array(
            );
            $page->setParameter($parameter);
            $showPage = $page->showPage();
            $showTotal = $page->showTotal();
            //var_dump($showPage);
            //var_dump($showTotal);
            $m->setPage();
            $page->setListRows(1);
            $m->setWhere('category_1_id', '=', $id);
            $m->setLimit($page->listRows);
            $m->setOrderBy(array(
                $order => 'DESC',
            ));
            $data = $m->select();
           
            if ($pagea == 0) {
                $count = count($data);
                for ($i = 0; $i < $count; $i ++) {
                    IF ($i = $count - 1) {
                        $data[$i]['page'] = json_encode($showPage);
                    }
                }
               
               
                $this->assign('json', $data);              
                $this->setReturnType('json');               
            } else {           	
                $this->assign('data', $data);
                $this->assign('showPage', $showPage);   //输出分页
                $this->assign('showTotal', $showTotal);
            }
        }
    }

    //排序
    function get_orders() {

        $id = get_post_value("id");
        $order = get_post_value('order');
        $field = array(
            'product_url',
            'title_cn',
            'title_th',
            'category_3_id',
            'floor_3_id',
            'purchase_price',
            'image_url',
            'sales_price',
            'product_url',
            'shop',
            'shop_id',
            'shop_url',
            'product_id',
            'status',
            'buys',
            'category_1_id',
        );
        $m = new Products();
        $m->clear();
        $m->setTable('vcb_product');     //设置表名
        $m->setField($field);
        $count = $m->getRowsCount();
        //var_dump($count);
        $page = new Page($count, 2);
        $parameter = array(
        );
        $page->setParameter($parameter);
        $showPage = $page->showPage();
        $showTotal = $page->showTotal();
        //var_dump($showPage);
        //var_dump($showTotal);
        $m->setPage();
        $page->setListRows(2);
        $m->setWhere('category_1_id', '=', $id);
        $m->setLimit($page->listRows);
        $m->setOrderBy(array(
            $order => 'DESC',
        ));
        $data = $m->select();
       
        $this->assign('data', $data);
       
    }

    function get_category_2($id) {
        $m = new Category();
        $data = $m->getCategory_2_list($id);
        return $data;
    }

    function get_category_3() {
        $m = new Category();
        $data = $m->getCategory_3_list();
        return $data;
    }

    function dotran($str) {
        $str = str_replace("\\", '', $str);
        $str = str_replace('\\', '\/', $str);
        // $str = str_replace("\\\"",'"',$str);
        //$str = str_replace("\/","/",$str);
        //$str = str_replace("\\\/","aaaaaa",$str);
        return $str;
    }

}

?>
<?php

class ProinfoController extends Controller {

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

    public function index() {
        if (empty(get_post_value('id'))) {
            header("Location:error.php");
        } else {
            $id = get_post_value('id');

            $field = array(
                'product_id',
                'image_url',
                'title_cn',
                'title_th',
                'sales_price',
                'preferential_price',
                'subtitle_cn',
                'category_1_id',
                'floor_3_id',
                'category_1_id',
                'status',
                'shop_url',
                'product_url',
                'shop_site',
                'shop_id',
                'shop',
                'shop_username',
            );
            $m = new Products();
            $m->clear();
            $m->setField($field);
            $m->setTable(' vcb_product ');
            $m->setWhere('product_id', '=', $id);
            $m->setWhere('status', '!=', '60000');
            $data = $m->select();
            $nav = $this->get_floor_3($data[0]['floor_3_id']);
            $this->assign('nav', $nav);
            $field1 = array(
                'id',
                'product_id',
                'image_url',
                'product_color',
            );
            $m1 = new Products();
            $m1->clear();
            $m1->setField($field1);
            $m1->setTable(' vcb_product_kind ');
            $m1->setWhere('product_id', '=', $id);
            $data_kind = $m1->select();
            $this->assign('data_kind', $data_kind);

            $field2 = array(
                'id',
                'size',
                'sku',
                'product_kind_id',
            );
            $count = count($data_kind);
            $m2 = new Products();
            $m2->clear();
            $m2->setField($field2);
            $m2->setTable(' vcb_product_ksize ');
            for ($i = 0; $i < $count; $i++)
                $m2->setWhere('product_kind_id', '=', $data_kind[$i]['id'], 'or');
            $data_size = $m2->select();
            var_dump($data_size);
            $this->assign('data_size', $data_size);



            if (!empty($data)) {
                $this->assign('data', $data);
                //var_dump($data);
            } else {
                // header("Location:error.php");
            }
        }
    }

    //返回size
    function get_size() {

        $id = get_post_value("id");
        $field = array(
            'id',
            'size',
            'sku',
        );
        $m = new Products();
        $m->clear();
        $m->setTable(' vcb_product_ksize ');    //设置表名
        $m->setField($field);
        $m->setWhere('product_kind_id', '=', $id);
        $data = $m->select();
        $this->assign('json', $data);
        $this->setReturnType('json');
    }

    function get_floor_2() {
        $m = new Floor();
        $data = $m->getFloor_2();
        return $data;
    }

    function get_floor_3($id) {
        $m = new Floor();
        $data = $m->getFloor_3_byid($id);
        return $data;
    }

}

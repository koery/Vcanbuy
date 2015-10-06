<?php

/*
 * @author yanghw
 * @access public
 * Model Manage/Model/Survey
 */

class Orders extends Model {
    /*
     * 返回用户订单数据
     *
     */

    function get_userorders($user_id) {
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
        $this->clear();
        $this->setField($field);
        $this->setTable(' vcb_order as ord');
        $this->setJoin(' vcb_product as pr ', 'ord.product_id=pr.product_id');
        $this->setWhere('ord.user_id', '=', $user_id);
        $this->setWhere('ord.status', '!=', 60000);
        $data = $this->select();
        if (!empty($data)) {
            return $data;
        }
    }

    function delete($id) {
        $this->clear();
        $field = array(
            'status' => 60000,
        );
        $this->setField($field);
        $this->setTable(' vcb_order ');
        $this->setWhere('id', '=', $id);
        $this->update();
    }

}

?>
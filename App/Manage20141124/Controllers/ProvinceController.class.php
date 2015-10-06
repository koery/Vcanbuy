<?php

class ProvinceController extends Controller {

    /**
     * 系统函数
     * @access public
     */
    function beforeAction() {
        $m = new Address();
        $data = $m->getCountry();
        $this->assign('country', $data);
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
        $country = get_post_value('country');
        $region = get_post_value('region');
        $province = get_post_value('province');
        $field = array(
            'country.country_id',
            'country.country',
            'region.region_id',
            'region.region',
            'province.province_id',
            'province.province',
            'province.status',
            'province.orders'
        );
        // 排序方法2
        $orderby = array(
            'country.orders',
            'region.orders',
            'province.orders'
        );
        $m = new Address();
        $m->clear();
        $m->setField($field);
        $m->setWhere('country.status', '!=', '50000');
        $m->setWhere('region.status', '!=', '50000');
        $m->setWhere('province.status', '!=', '50000');
        if ($country != '') {
            $m->setWhere('country.country_id', '=', $country);
        }
        if ($region != '') {
            $m->setWhere('region.region_id', '=', $region);
        }
        if ($province != '') {
            $m->setWhere('province.province', 'LIKE', '%' . $province . '%');
        }
        $m->setTable('vcb_address_country AS country');
        $m->setJoin('vcb_address_region as region', 'country.country_id=region.country_id');
        $m->setJoin('vcb_address_province as province', 'region.region_id=province.region_id');
        $m->setOrderBy($orderby);

        $count = $m->getRowsCount();    //合计计录数
        //分页其他参数
        $page = new Page($count);
        $parameter = array(
            'country' => get_post_value('country'),
        );
        $page->setParameter($parameter);
        $showPage = $page->showPage();
        $showTotal = $page->showTotal();

        $m->setPage(get_current_page());

        $data = $m->select();
        //状态标题
        $count = count($data);
        for ($i = 0; $i < $count; $i ++) {
            //已启用
            $status = $data[$i]['status'];
            $data[$i]['status_name'] = $m->getStatus($status);
        }


        $this->assign('data', $data);     //输出数据

        $this->assign('showPage', $showPage);   //输出分页
        $this->assign('showTotal', $showTotal);  //输出分页合计


        $region = $m->getRegion($country);
        $this->assign('region', $region);     //输出数据
    }

    /**
     * 返回新建国家初始信息
     * @access public
     */
    function add() {
        $m = new Address();
        $country = get_post_value('country');
        $region = $m->getRegion($country);
        $this->assign('region', $region);     //输出数据
    }

    /**
     * 保存新建大区信息
     *
     * @access public
     */
    function add_save() {
        $country = get_post_value('country');
        $region = get_post_value('region');
        $province = get_post_value('province');
        $orders = get_post_value('orders');
        $status = get_post_value('status');

        if (!$this->verify()) {
            echo '<br>省  ' . $province . ' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
            return;
        }

        //保存新增数据(设置column及值)
        $field = array(
            'region_id' => $region,
            'province' => $province,
            'orders' => $orders,
            'status' => $status == '10000' ? '10000' : '30000',
        );
        $m = new Address();
        $m->clear();
        $m->setField($field);
        $m->setTable('vcb_address_province');
        $data = $m->insert();

        if (!$data) {
            echo '<br>保存失败<br>';
        } else {
            echo '<br>保存成功，<a href="add?country=' . $country . '&region=' . $region . '&orders=' . ($orders + 1) . '">继续添加</a>,<a href="index">返回</a><br>';
        }
    }

    /**
     * 删除国家
     * @access public
     */
    function delete() {
        $field = array(
            'status' => '50000',
        );

        $m = new Address();
        $m->setField($field);        ///设置更新字段及值，(键值数组)
        $m->setTable('vcb_address_province');     //设置表名
        $m->setWhere('province_id', '=', get_post_value('id'));    //设置Where条件
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
            'country.country_id',
            'country.country',
            'region.region_id',
            'region.region',
            'province.province_id',
            'province.province',
            'province.status',
            'province.orders'
        );

        $m = new Address();
        $m->clear();
        $m->setField($field);
        $m->setWhere('province.province_id', '=', $id);
        $m->setTable('vcb_address_country AS country');
        $m->setJoin('vcb_address_region as region', 'country.country_id=region.country_id');
        $m->setJoin('vcb_address_province as province', 'region.region_id=province.region_id');

        $data = $m->select();
        $this->assign('data', $data);

        $r = $m->getRegion($data[0]['country_id']);
        $this->assign('region', $r);     //输出数据
    }

    /**
     * 更新国家信息
     * @access public
     */
    function update_save() {
        //判断country是否已存在
        $id = get_post_value('id');
        $region = get_post_value('region');
        $province = get_post_value('province');
        $orders = get_post_value('orders');
        $status = get_post_value('status');

        if (!$this->verify($id)) {
            echo '<br>省  ' . $province . ' 已存在，请核对后重新输入。<a href="javascript:history.go(-1)">返回</a><br>';
            return;
        }

        //保存新增数据(设置column及值)

        $field = array(
            'region_id' => $region,
            'province' => $province,
            'orders' => $orders,
            'status' => $status == '10000' ? '10000' : '30000',
        );
        $m = new Address();
        $m->clear();
        $m->setField($field);
        $m->setWhere('province_id', '=', $id);
        $m->setTable('vcb_address_province');
        $data = $m->update();

        //返回
        echo '<br>操作成功,<a href="index" >返回</a><br>';
    }

    function get_region() {
        $m = new Address();
        $country = get_post_value('country');
        $data = $m->getRegion($country);
        $this->assign('json', $data);
        $this->setReturnType('json');       //只返回单值
    }

    /**
     * 返回国家最大序号
     * @access public
     */
    function get_orders() {
        //查询最大序号
        $m = new Address();
        $region = get_post_value('region');
        $m->clear();
        $m->setTable('vcb_address_province');     //设置表名
        $m->setWhere('status', '!=', '50000');     //设置查询条件
        $m->setWhere('region_id', '=', $region);     //设置查询条件
        $data = $m->getFieldValue('MAX(orders) AS orders'); // 直接返回单条记录
        // 设置新的序号
        if (is_null($data)) {
            $data = 1;
        } else {
            $data += 1;
        }
        $this->assign('message', $data);
        $this->setReturnType('message');       //只返回单值
    }

    /**
     * 判断省是否存在
     * @access private
     * @param string $region_id 大区ID
     * @return true|false
     */
    private function verify($province_id = NULL) {
        $region = get_post_value('region');
        $province = get_post_value('province');

        $m = new Address();
        $m->clear();
        $m->setTable('vcb_address_province');
        $m->setWhere('region_id', '=', $region);
        $m->setWhere('province', '=', $province);
        $m->setWhere('status', '!=', '50000');
        if ($province_id != null) {
            $m->setWhere('province_id', '!=', $province_id);
        }
        $data = $m->getFieldValue('COUNT(*)'); // 直接返回单条记录

        return $data > 0 ? false : true;
    }

}

<?php

class IndexController extends Controller {

    /**
     * 系统函数
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
    
   
    function Index() {
    	//echo "session=";
    	// print_r($_SESSION);    	
    	// echo "<br>cookie="; 
    	// print_r($_COOKIE);
    	if (isset($_SESSION['username'])&&!empty($_SESSION['username'])) {  //检测session      		       					   				
    				$this->assign('username', $_SESSION['username'] );   		
    	}
    	
    	else if(!empty($_COOKIE["username"])){//检测cookie
    		$userCookie=$_COOKIE["username"];
    		$this->assign('username', $userCookie);
    	}
        else{//游客登陆
        	$tourists_id = Login::getTouristsId();
        	if ($tourists_id == null) {
            	Login::setTouristsId();        
       		 }       		       		 
//
        }//else结束
//
        $c = new Category();
        $category_1 = $c->getCategory_1_id();
        $this->assign('category_1', $category_1);
        
        $f = new Floor();
        $floor_1 = $f->getFloor_1_id();
        $this->assign('floor_1', $floor_1);
//


        $m = new Category();
        $num = count($m->getCategory_1_id()) * 10000;

        $category_2_all = $this->get_category_2();
        $this->assign('category_2_all', $category_2_all);
        //var_dump($category_2_all);
        //echo $num1."<br>";

        $category_3_all = $this->get_category_3();
        //echo "oh:".$num2."<br>";
        //$this->assign('category_3_'.$i."_".$j.$k, $category_3_1[$k]);
        //var_dump($category_3_all);
        $this->assign('category_3_all', $category_3_all);
        //$a=new Banner();
        $floor_2_all = $this->get_floor_2();
        $floor_3_all = $this->get_floor_3();
        $this->assign('floor_2_all', $floor_2_all);
        $this->assign('floor_3_all', $floor_3_all);

        //********************************

        $type = get_post_value('type');
        $language = get_post_value('language');
        $key = get_post_value('key');
        $field = array(
            'category_id',
            'type',
            'title',
            'created',
            'start_time',
            'end_time',
            'status',
            'language'
        );
        $m = new Banner();
        $m->clear();
        $m->setField($field);
        $m->setTable('vcb_banner_categor');
        //$m->setWhere('status', '!=', '60000');//暂不设置
        if ($type != '') {
            $m->setWhere('type', '=', $type);
        }
        if ($language != '') {
            $m->setWhere('language', '=', $language);
        }
        if ($key != '') {
            $m->setWhere('title', 'LIKE', '%' . $key . '%');
        }
        $m->setOrderBy('type');
        $data = $m->select();


        //状态标题    在每一条数据后加上4个数据
        $count = count($data);
        for ($i = 0; $i < $count; $i ++) {
            $data[$i]['status_cn'] = $m->getStatus('cn', $data[$i]['status']);
            $data[$i]['status_th'] = $m->getStatus('th', $data[$i]['status']);
            //$data[$i]['type'] = $m->getTypeCaption($data[$i]['type']);//返回位置对应描述
            $data[$i]['dataInformation'] = $m->getImage($data[$i]['category_id']);
        }
        //print_r($data);
        $this->assign('dataOfBanner', $data);
    }

//验证是否登陆&&返回登陸的user_name
    private function verify_login($user_id) {
        $m_user = new Login();
        $m_userfield = array(
            'username',
        );
        $m_user->clear();
        $m_user->setField($m_userfield);
        $m_user->setTable(' vcb_user ');
        $m_user->setWhere('user_id', '=', $user_id);
        $data_user = $m_user->select();
        return $data_user;
    }
    
//退出登陆
    function logout() {
        Login::quit();
        header('Location:../login/index');
    }

    function get_category_2() {
        $m = new Category();
        $data = $m->getCategory_2();
        return $data;
    }

    function get_category_3() {
        $m = new Category();
        $data = $m->getCategory_3();
        return $data;
    }

    function get_floor_2() {
        $floor_1 = get_post_value('floor_1');
        $m = new Floor();
        $data = $m->getFloor_2($floor_1);
        return $data;
        //$this->assign('json', $data);
        //$this->setReturnType('json');
    }

    function get_floor_3() {
        $floor_2 = get_post_value('floor_2');
        $m = new Floor();
        $data = $m->getFloor_3($floor_2);
        return $data;
        //$this->assign('json', $data);
        //$this->setReturnType('json');
    }

}

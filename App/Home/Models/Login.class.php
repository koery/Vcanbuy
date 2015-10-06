<?php

class Login extends Model {

    /**
     * loginIn() 用户登陆检测
     * @param var $username  用户名
     * @param var $password  密码
     */
    function loginIn($username, $password) {
        
        $field = array(
            'username',
            'language',
            'user_id',
            'password',
            'vip'
        );
       //echo "username=".$username;
       //echo "password".$password;
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_user');
        
        
        if (strpos($username, '@') > 0) {
            $this->setWhere('email', '=', trim($username));
        } else {
            $this->setWhere('username', '=', trim($username));
        }

        $this->setWhere('status', '=', '10000');
        $data = $this->select();
       //echo "选择结果";
      // print_r($data);
        if (count($data) == 1 && $data[0]['password'] == md5($password)) {
            $username = $data[0]['username'];
            $user_id = $data[0]['user_id'];
            $vip = $data[0]['vip'];
            $language = $data[0]['language'];

            $this->setSession("user_id",$user_id);
            $this->setSession("username",$username);
            $this->setSession("vip",$vip);
            $this->setSession("language",$language);
            //$this->updatacCart();
            //$this->updateCart();
            //echo $username;
            return $username;
        } else {
            return false;
        }
    }

    /**
     * 设置Sesstion
     * @param var str
     * 
     */
    function setSession($name,$val) {
        $_SESSION[$name] = $val;
       
    }

    /**
     * 退出
     */
    static function quit() {
        session_destroy();
        setcookie('tourists_id');
    }

    /**
     * 判断是否已登陆
     * @return bool true:已登陆;false：未登陆
     */
    static function verifyLogin() {
        if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == '') {
            return false;
        } else {
            return true;
        }
    }

//验证是否登陆&&返回登陸的user_name
    static function verify_login($user_id) {
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
    //验证是否登陆&&返回登陸的user_name
    static function verify_login_byn($user) {
    	$m_user = new Login();
    	$m_userfield = array(
    			'user_id',
    			'username'
    	);
    	$m_user->clear();
    	$m_user->setField($m_userfield);
    	$m_user->setTable(' vcb_user ');
    	if (strpos($user, '@') > 0) {
            $m_user->setWhere('email', '=', trim($user));
        } else {
            $m_user->setWhere('username', '=', trim($user));
        }
    	$data_user = $m_user->select();
    	return $data_user;
    }

//退出登陆
    static function logout() {
        Login::quit();
        header('Location:../login/index');
    }

    /**
     * 更新购物车
     */
    function updateCart() {
        $user_id = $this->getUserId();
        $tourists_id = $this->getTouristsId();


        $field = array(
            'user_id' => $user_id,
        );
        $this->clear();
        $this->setField($field);
        $this->setTable('vcb_cart');
        //$this->setWhere('user_id', '=', $user_id);
        $this->setWhere('tourists_id', '=', $tourists_id);
        $this->setWhere('status', '=', '10000');
        $this->update();
    }

//     function updatacCart() {

//         //var_dump($_COOKIE);
//         $user_id = $this->getUserId();
//         if (!empty($_COOKIE['shop_cart_info'])) {
//             $pro = new Products();
//             $mc = new Cart();
//             $cart_array = unserialize(stripslashes($_COOKIE['shop_cart_info']));
//             if($cart_array!=null){
//             foreach ($cart_array as $key => $value) {

//                 // var_dump($cur_cart_array[$key]['price']);
//                 $coo_data = $pro->getproducts_id($cart_array[$key]['product_id']);
//                 $field = array(
//                     'created' => date('Y-m-d H:i:s', time()),
//                     'user_id' => intval($user_id),
//                     'shop_username' => $coo_data[0]['shop_username'],
//                     'shop_url' => $coo_data[0]['shop_url'],
//                     'product_id' => $cart_array[$key]['product_id'],
//                     'product_url' => $coo_data[0]['product_url'],
//                     'shop_url' => $coo_data[0]['shop_url'],
//                     'shop_username' => $coo_data[0]['shop_username'],
//                     'qty' => intval($cart_array[$key]['qty']),
//                     'sku' => $cart_array[$key]['sku'],
//                     'sku_name' => $cart_array[$key]['sku_name'],
//                     'status' => '10000',
//                     'product' => $coo_data[0]['title_cn'],
//                     'image_url' => $cart_array[$key]['image_url'],
//                     'price' => $coo_data[0]['sales_price'],
//                     'shop_id' => $coo_data[0]['shop_id'],
//                     'shop_site' => $coo_data[0]['shop_site'],
//                 );
//                 //$mc->upcoo_toc($field);
//             }
//            }
//             echo "aa";
//             if (!empty($_COOKIE['shop_cart_info'])) {
//                 setcookie("shop_cart_info", "", time() - 3600, "/");
//             }
//         } else {
//             return;
//         }
//    }

    /**
     * 返回用户ID
     * @return Ambigous <NULL, unknown>
     */
    static function getUserId() {
        if (isset($_SESSION ['user_id'])) {
            $user_id = $_SESSION ['user_id'];
        } else {
            $user_id = null;
        }

        return $user_id;
    }

    /**
     * 返回游客ID
     * @return Ambigous <NULL, unknown>
     */
    static function getTouristsId() {
        if (isset($_SESSION ['tourists_id'])) {
            $tourists_id = $_SESSION ['tourists_id'];
        } else {
            $tourists_id = null;
        }
        return $tourists_id;
    }
    
    

    /**
     * 设置游客ID
     */
    static function setTouristsId() {
        if (!isset($_SESSION ['tourists_id'])) {
            $tourists_id = empty($_COOKIE ['tourists_id']) ? time() . rand(1000, 9999) : $_COOKIE ['tourists_id'];
            $_SESSION ['tourists_id'] = $tourists_id;
            if (empty($_COOKIE ['tourists_id'])) {
                setcookie('tourists_id', $tourists_id, time() + 3600 * 24); // 有效期为24小时
            }
        }
    }

}

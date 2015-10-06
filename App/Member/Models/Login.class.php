<?php

class Login extends Model {

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

}

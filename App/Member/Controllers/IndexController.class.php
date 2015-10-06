<?php

class IndexController extends Controller {

    function beforeAction() {

    }

    function afterAction() {

    }

    function index() {
        if (!Login::verifyLogin()) {
            header("Location: ../../home/login/index");
            exit;
        }
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
    }

}

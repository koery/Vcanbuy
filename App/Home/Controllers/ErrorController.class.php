<?php

class ErrorController extends Controller {

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

    function login_error() {
        $this->assign('error', "亲，你还没有登陆哦");
    }

}

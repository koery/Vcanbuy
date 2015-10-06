<?php

class View {

    /**
     * 模板输出变量
     *
     * @var tVar
     * @access protected
     */
    protected $variables = array();
    protected $_controller;
    protected $_action;
    public $returnType = null;

    function __construct($controller, $action) {
        $this->_controller = $controller;
        $this->_action = $action;
        // $this->$returnType = "";
    }

    /**
     * 模板变量赋值
     *
     * @access public
     * @param mixed $name
     * @param mixed $value
     */
    function assign($name, $value) {
        $this->variables [$name] = $value;
    }

    /**
     * 设置返回值
     *
     * @access public
     * @param string xml|message|json
     */
    function setReturnType($value) {
        $this->returnType = $value;
    }

    /**
     * 控制返回视图 *
     */
    function render($doNotRenderHeader = 0) {

        // /**
        // * 如果返回值是xml，则返回
        // * http://localhost/Vcanbuy/app/finance/public/return.php
        // */
        extract($this->variables);

        if (isset($this->returnType)) {
            if ($this->returnType == 'message') {
                $msg = $this->variables ['message'];
                echo $msg;
                return;
            } else if ($this->returnType == 'xml') {

            } else if ($this->returnType == 'json') {
                $json = $this->variables ['json'];
                echo json_encode($json);
                return;
            }
        }

        /**
         * 否则返回相应页面
         */
       


            if (is_file(ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . 'Header.php')) {
                //echo '加载'.ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . 'header.php<br>';
                include (ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . 'Header.php');
            } else {
                //echo "加载".ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Header' . DS . LANGUAGE . DS . 'header.php<br>';
                include (ROOT . DS . APP_PATH . DS . MODULE_NAME . DS .'Resources'. DS. 'Header' . DS . LANGUAGE . DS . 'header.php');
            
            }
            
            if (is_file(ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . 'Search.php')) {
            	//echo '加载'.ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . 'header.php<br>';
            	include (ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . 'Search.php');
            } 
           
        if (is_file(ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . '.php')) {
            $return = ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . '.php';
            include ($return);
            //echo $return;
        }
	        if (is_file(ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . 'sideBar.php')) {
	        	include (ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . 'sideBar.php');
	        } 
	       
            if (is_file(ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . 'Footer.php')) {
                include (ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Views' . DS . $this->_controller . DS . LANGUAGE . DS . $this->_action . 'Footer.php');
            } else {
                include (ROOT . DS . APP_PATH . DS . MODULE_NAME . DS .'Resources'. DS . 'Footer' . DS . LANGUAGE . DS . 'footer.php');
            }
        
    }

}

<?php

class Controller {

	private  $_controller;
	private $_action;
	private $_view;
	//private $_error;
	protected $doNotRenderHeader;
	protected $render;
	/**
	 * 视图实例对象
	 * @var view
	 * @access protected
	 */
	function __construct($controller, $action) {
		$this->_controller = ucfirst($controller);
		$this->_action = $action;

		$this->doNotRenderHeader = 0;
		$this->render = 1;
		
		$this->_view = new View($controller,$action);
		//$this->_error = new Error();
		
	}
	
// 	protected function isError($value) {
// 		//$this->_error->isError($value);
// 	}
	
	protected function getSession($value) {
		
		if (isset($_SESSION[$value])) {
			$value = $_SESSION[$value];
			if (!empty($value)) {			
				return $value;
			}
			else return false;
		}
		else return false;
	}
	
	
	/**
	 * 模板变量赋值
	 * @access protected
	 * @param mixed $name 要显示的模板变量
	 * @param mixed $value 变量的值
	 * @return Action
	 */	
	protected function assign($name,$value) {
		$this->_view->assign($name,$value);
	}
	/**
	 * 设置返回值
	 *
	 * @access protected
	 * @param string xml|message
	 */
	protected function setReturnType($value) {
		$this->_view->setReturnType($value);
	}
	/**
	 * 视图实例对象
	 * @var view
	 * @access public
	*/
	public function __destruct() {
		if ($this->render) {
			$this->_view->render($this->doNotRenderHeader);
		}
	}
	

}
<?php
class TestController extends Controller {
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

	
	/**
	 *
	 * 验证码 
	 */
	function ImgOperate(){
		
		$img = new ImgOperate();  //实例化一个对象
	    $img->setSrcimg("1_800x800.jpg");
	    $img->savaDstimg();
	}
	
	
}

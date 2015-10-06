<?php
/**
 * Shared 引导类
 */
class Shared {
	static public function start() {
		// 注册AUTOLOAD方法
		spl_autoload_register('Shared::autoload');
// 		// 设定错误和异常处理
// 		register_shutdown_function('Shared::fatalError');
// 		set_error_handler('Shared::appError');
// 		set_exception_handler('Shared::appException');

			//语言版本设置
		$lang = get_lang();
		if ($lang !=''){
			define('LANGUAGE', $lang);					
		}
		else if(isset($_COOKIE['LANGUAGE'])){
			define('LANGUAGE', ucfirst(strtolower($_COOKIE['LANGUAGE'])));
		}
		else{
			define('LANGUAGE', DEFAULT_LANGUAGE);					
		}
		
		//读取 controller, action
		if (!isset($_GET['url'])) {
			$controller = DEFAULT_CONTROLLER;
			$action = DEFAULT_VIEW;
			define('MODULE_NAME', DEFAULT_MODULE_NAME);			   		   //当前运行网站名称
		}
		else {
			$url = strtolower(trim($_GET['url']));
			$ext = substr($url, strlen($url)-4);//此处有bug
			//echo $ext;
			//以下文件直接读取
			if (in_array($ext, array('.css','.jpg','.js','.jpge','.htm','.html','.gif','.png'))){
				return ;
			}
			$urlArray = explode("/",$url);
				
			define('MODULE_NAME', ucfirst($urlArray[0]));					//当前运行网站名称
			
			$controller = trim($urlArray[1]);			
			$action = trim($urlArray[2]);
			
		}
		
	
		//公共资源文件
		define ( 'JS_PUBLIC_PATH', '/Public/JS/');			    //js(公共)文件
		define ( 'CSS_PUBLIC_PATH', '/Public/CSS/');			//css(公共)文件
		define ( 'IMAGE_PUBLIC_PATH', '/Public/Img/');	        //image(公共)文件
		define ( 'FONTS_PUBLIC_PATH', '/Public/Fonts/default/'); //font(公共)文件
		//echo CSS_PUBLIC_PATH;
		
		//上传资源文件
		define ( 'IMG_UPLOAD_PATH', '/Upload/');			    //js(公共)文件
		
		
		//APP 公共
		define ( 'APP_JS_PUBLIC_PATH',  '/' .APP_PATH .'/' .MODULE_NAME.'/Resources/JS/Public/');			         //APP 下js(公共)文件
		define ( 'APP_CSS_PUBLIC_PATH',  '/' .APP_PATH .'/' .MODULE_NAME.'/Resources/CSS/Public/');			 //APP 下css(公共)文件
		define ( 'APP_IMAGE_PUBLIC_PATH',   '/'.APP_PATH . '/'.MODULE_NAME.'/Resources/Img/Public/');	         //APP 下image(公共)文件
		define ( 'APP_FONTS_PUBLIC_PATH', '/'.APP_PATH . '/' .MODULE_NAME.'/Resources/Fonts/Public/'); //APP 下font(公共)文件
		
		//APP Model
		define ( 'APP_MODULE_JS_PATH', '/'.APP_PATH .'/' .MODULE_NAME.'/Resources/JS/');			//js(MODULE)文件
		define ( 'APP_MODULE_CSS_PATH','/' .APP_PATH .'/' .MODULE_NAME.'/Resources/CSS/');		//css(MODULE)文件
		define ( 'APP_MODULE_IMAGE_PATH', '/' .APP_PATH .'/' .MODULE_NAME.'/Resources/Img/');	    //image(MODULE)文件
		define ( 'APP_MODULE_FONTS_PATH', '/' .APP_PATH .'/' .MODULE_NAME.'/Resources/Fonts/');	//fonts(MODULE)文件
		
// 		echo APP_MODULE_CSS_PATH;
// 		echo '<br>';
// 		echo APP_MODULE_JS_PATH;
// 		echo '<br>';
// 		echo APP_MODULE_IMAGE_PATH;
// 		echo '<br>';
		//echo APP_MODULE_FONTS_PATH;
		//define('URL_CURRENT_MODULE', $value);						//当前模块URL

		//加载配置文件
		require ROOT . DS . 'Config' . DS . 'config.php';
		require ROOT . DS . 'Library' . DS . 'Page.class.php';
		
		
		// 加载模块配置文件
		if (is_file ( ROOT . DS .APP_PATH .DS .MODULE_NAME. DS .'Resources'. DS . 'Config' . DS . 'config.php' )){
			require ROOT . DS .APP_PATH .DS .MODULE_NAME. DS.'Resources'. DS . 'Config' . DS . 'config.php';
		}
		// 加载模块函数文件
		if (is_file ( ROOT . DS .APP_PATH .DS .MODULE_NAME. DS .'Resources'. DS . 'Common' . DS . 'functions.php' )){
			require ROOT . DS .APP_PATH .DS .MODULE_NAME. DS.'Resources'. DS . 'Common' . DS . 'functions.php';
		}
		
		//获取 controller,及 action名称
		$controllerName = ucfirst($controller).'Controller';		//
		$dispatch = new $controllerName(ucfirst($controller),$action);
		
		if ((int)method_exists($controllerName, $action)) {
			call_user_func_array(array($dispatch,"beforeAction"),array());
			call_user_func_array(array($dispatch,$action),array());
			call_user_func_array(array($dispatch,"afterAction"),array());
		} else {
			/* Error Generation Code Here */
		}	
	}
	/**
	 * 自定义错误处理
	 * @access public
	 * @param int $errno 错误类型
	 * @param string $errstr 错误信息
	 * @param string $errfile 错误文件
	 * @param int $errline 错误行数
	 * @return void
	 */
	
	static public function appError($errno, $errstr, $errfile, $errline) {
		
		// 		switch ($errno) {
		// 			case E_ERROR:
		// 			case E_PARSE:
		// 			case E_CORE_ERROR:
		// 			case E_COMPILE_ERROR:
		// 			case E_USER_ERROR:
		// 				break;
		// 			default:
		// 				break;
		// 		}
		die('error');
	}
	public static function autoload($className) {
		$className = ucfirst($className);
		if (is_file ( ROOT . DS . 'Library' . DS . $className . '.class.php' )) {
			require ROOT . DS . 'Library' . DS . $className . '.class.php';
		} else if (is_file ( ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Controllers' . DS . $className . '.class.php' )) {
			require ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Controllers' . DS . $className . '.class.php';
		} else if (is_file ( ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Models' . DS . $className . '.class.php' )) {
			require ROOT . DS . APP_PATH . DS . MODULE_NAME . DS . 'Models' . DS . $className . '.class.php';
		} else {
		}
	}
}
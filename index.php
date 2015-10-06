<?php

session_start();//链入时开启session
header("Content-type:text/html;charset=UTF-8");

define('APP_PATH', 'App');   //网站入口目录
//define('LANGUAGE','Cn');			//语言版本


require 'Library/bootstrap.php';
?>
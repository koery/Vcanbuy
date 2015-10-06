<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('CURRENT_URL', $_SERVER['REQUEST_URI']);   //当前URL

        const DEFAULT_LANGUAGE = 'Cn';   //默认语言(首字母大写)
        const DEFAULT_CONTROLLER = 'index';  //默认controller
        const DEFAULT_VIEW = 'index';  //默认View
        const DEFAULT_MODULE_NAME = 'home';  //默认 模块名称
        const DEFAULT_LIMIT = 20;   //默认数据查询数目
        const DEFAULT_MAX_LIMIT = 1000;   //默认数据最大返回数



require ROOT . DS . 'Common' . DS . 'functions.php';
require ROOT . DS . 'Library' . DS . 'Shared.class.php';
require ROOT . DS . 'Vendor' . DS . 'taobao' . DS . 'TopSdk.php';
require ROOT . DS . 'Vendor' . DS . 'taobao' . DS . 'top' . DS . 'TopClient.php';

Shared::start();  //运行框架



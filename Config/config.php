<?php

/** Configuration Variables **/

// define ('DEVELOPMENT_ENVIRONMENT',true);


define('DB_HOST', '127.0.0.1');			//linux 不识别localhost
define('DB_USER', 'root');
define('DB_PASSWORD', '');

define('DB_NAME', 'Vcanbuy');
//define('DB_NAME', 'vcb_orders');

//define('BASE_PATH','http://localhost/Vcanbuy');


// define('PAGINATE_LIMIT', '5');

// header("Content-type:text/html;charset=UTF-8");

const TAOBAO_APP_KEY 	='21033356';											//taobao app_key
const TAOBAO_APPSECRET	='fbfa9b2ebea5b15eb47f1b7489838570';					//taobao appsecret
const TAOBAO_SESSIONKEY	='61016244641868a6079e14c3e1a8c51c1165ab5df51e68e404951980';

define('RATE', '5.28');					//汇率
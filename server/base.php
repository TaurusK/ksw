<?php
// 定义应用目录
define('APP_PATH', ROOT_PATH . 'application/');
//定义服务目录
define('SERVER_PATH', ROOT_PATH . 'server/');
//扩展目录
define('EXTEND_PATH', ROOT_PATH . 'extend/');

//服务扩展目录
define('LIB_PATH', SERVER_PATH . 'library/');


require_once LIB_PATH . 'Loader.php';

require_once APP_PATH . 'common.php';
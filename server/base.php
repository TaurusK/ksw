<?php
// 定义应用目录
define('APP_PATH', ROOT_PATH . 'application/');
//定义服务目录
define('SERVER_PATH', ROOT_PATH . 'server/');
//扩展目录
define('EXTEND_PATH', ROOT_PATH . 'extend/');


require_once SERVER_PATH . 'Loader.php';
require_once SERVER_PATH . 'Request.php';
require_once SERVER_PATH . 'Response.php';
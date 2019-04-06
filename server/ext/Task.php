<?php
namespace server\ext;

class Task
{
	public static $server;

	public static function init($server){
		self::$server = $server;
	}

	//普通任务投递
	public static function generalTask($data){
		self::$server->task($data);
	}

	//task数据处理
	public static function taskDataDispose($server,$data){
		if(is_array($data)){
			$module = $data['module'];
			$controller = $data['controller'];
			$method = $data['method'];
			//$callbackUrl = isset($data['callbackUrl'])?$data['callbackUrl']:'';

			$data = $data['post'];

			$className = "\app\\{$module}\\controller\\{$controller}";
			$obj = new $className();
			$obj->$method($serv,$data);
		}
	}
}
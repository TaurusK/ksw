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
		print_r(self::$server);
		self::$server->task($data);
	}
}
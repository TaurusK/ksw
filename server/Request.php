<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		self::$request = $request;
		$pathinfo = self::$request->server['path_info'];
		$pathStr = trim($pathinfo,'/');
		$pathArr = explode('/', $pathStr);

		$className = $pathArr[0] . '\\' . ucfirst($pathArr[1]) . '\\' . $pathArr[2];
		
		print_r($pathStr);
		print_r($pathArr);
		print_r($className);
	}
}
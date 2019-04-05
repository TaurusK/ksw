<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		self::$request = $request;
		$pathinfo = self::$request->server['path_info'];

		$className = self::getClassName($pathinfo);
		
	}

	public static function getClassName($pathinfo){
		$pathStr = trim($pathinfo,'/');
		$pathArr = explode('/', $pathStr);

		if(empty($pathArr) || count($pathArr) != 3){
			Response::send('调用错误，请使用pathinfo路径调用');
		}

		$className = $pathArr[0] . '\\' . ucfirst($pathArr[1]) . '\\' . $pathArr[2];


		print_r($pathStr);
		print_r($pathArr);
		print_r($className);

		Response::send('ok');
	}
}
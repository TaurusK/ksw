<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		self::$request = $request;
		$pathinfo = self::$request->server['path_info'];

		$className = self::getClassName($pathinfo);

		if(iseet($className['error'])){
			return $className['error'];
		}

		return $className;
		
		
	}

	public static function getClassName($pathinfo){
		$pathStr = trim($pathinfo,'/');
		$pathArr = explode('/', $pathStr);

		if(empty($pathArr) || count($pathArr) != 3){
			return ['error'=>'调用错误，请使用pathinfo路径调用'];
		}

		$className = $pathArr[0] . '\\' . ucfirst($pathArr[1]) . '\\' . $pathArr[2];


		print_r($pathStr);
		print_r($pathArr);
		print_r($className);

		return $className;
	}
}
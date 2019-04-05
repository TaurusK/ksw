<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		self::$request = $request;
		$pathinfo = self::$request->server['path_info'];

		//获取调用信息
		$classInfo = self::getClassInfo($pathinfo);

		if(isset($classInfo['error'])){
			return $classInfo['error'];
		}

		//调用指定方法
		$className = $classInfo['className'];
		$action = $classInfo['action'];
		$res = (new $className())->$action();

		return $res;
	}

	//解析pathinfo路径获取调用信息
	public static function getClassInfo($pathinfo){
		$pathStr = trim($pathinfo,'/');
		$pathArr = explode('/', $pathStr);

		if(empty($pathArr) || count($pathArr) != 3){
			return ['error'=>'调用错误，请使用pathinfo路径调用'];
		}

		$className = '\application\\' . $pathArr[0] . '\controller\\' . ucfirst($pathArr[1]);

		return [
			'className' => $className,
			'action'    => $pathArr[2],
		];
	}
}
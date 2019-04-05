<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		self::$request = $request;
		$pathinfo = self::$request->server['path_info'];
		$pathArr = explode('/', $pathinfo);
		print_r($pathArr);
	}
}
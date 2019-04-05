<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		print_r($request);
		self::$request = $request;
	}
}
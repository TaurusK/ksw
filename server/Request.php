<?php
namespace server;

class Request
{
	public static $request;

	public static function init($request){
		pritn_r($request);
		self::$request = $request;
	}
}
<?php
namespace server\library;

class Response
{
	public static $response;

	public static function init($response){
		self::$response = $response;
	}

	//响应处理
	public static function send($data){
		self::$response->end($data);
	}
}
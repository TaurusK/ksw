<?php
namespace server\library;

class Loader
{
	public function __construct(){

	}

	//自定义静态加载方法
	public static function k_autoload($className){

		$className = trim($className,'\\');
		$pathArr = explode('\\', $className);
		$filePath = '';

		//解析路径
		foreach($pathArr as $key => $v){
			if($key == 0 && $v == 'app'){
				$filePath .= 'application/';
			}else{
				$filePath .= $v . '/';
			}
		}

		$filePath = rtrim($filePath,'/');
		$file = $filePath . '.php';

		//print_r($pathArr);
		//print_r($file);

		if(file_exists($file)){
			require_once ROOT_PATH . $file;
		}else{
			require_once EXTEND_PATH . $file;
		}

	}

	public static function run(){
		echo 'run...';
	}
}

//注册自动加载类
spl_autoload_register('\server\library\Loader::k_autoload');
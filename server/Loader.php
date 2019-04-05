<?php
namespace server;

class Loader
{
	public function __construct(){

	}

	//自定义静态加载方法
	public static function k_autoload($className){
		print_r($className);
		$className = trim($className,'\\');
		$pathArr = explode('\\', $className);
		print_r($pathArr);
		

		/*$baseClassName = basename(str_replace('\\', '/',$className));
		
		if(substr($baseClassName, -10) == 'Controller'){   //确定是否是一个控制器类
			//拼接控制器类文件全路径
			$filePath = APP_PATH.$GLOBALS['p'].'/controller/'.$baseClassName.'.php';
			//引入这个控制器类文件
			require $filePath;
		}elseif(substr($baseClassName, -5) == 'Model'){  //确定是否是一个模型类
			//拼接模型类文件全路径
			$filePath = APP_MODEL_PATH.$baseClassName.'.php';
			//引入这个模型类文件
			require $filePath;
			
		}elseif(substr($baseClassName, -4) == 'Validate'){  //确定是否是一个模型类
			//拼接工具类文件全路径
			$filePath = PLUGINS_PATH.$baseClassName.'.class.php';
			//引入这个工具类文件
			require $filePath;
			
		}else{
			//如果调用没有后缀的类时统一到extend目录下找
			$arr = explode('\\', $className);
			if(count($arr)==1){    //判断是否有定义命名空间，如没有则数组元素为1
				//拼接工具类文件全路径
				$filePath = EXTEND_PATH.$className.'.php';
				//引入这个工具类文件
				require $filePath;
			}else{
				
				//如果元素数量大于1，则表示定义了命名空间
				$className = implode('/', $arr);  //为了兼容window与linux使用'/'重新拼接数组成新字符串
				
				//拼接工具类文件全路径
				$filePath = EXTEND_PATH.$className.'.php';
				//引入这个工具类文件
				require $filePath;
			}
		}*/
			
	}

	public static function run(){
		echo 'run...';
	}
}

//注册自动加载类
spl_autoload_register('\server\Loader::k_autoload');
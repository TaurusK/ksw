<?php
class Server 
{
	
	public $server = null;
	public function __construct(){
		$this->server = new Swoole\WebSocket\Server("0.0.0.0", 8801);
		
		//设置选项
		$this->server->set([
			//启用进程数
			'worker_num' => 4,    //worker process num
			//启用task进程数
			'task_worker_num' => 10
		]);

		//+----------------------事件注册----------------------
		//http
		//请求
		$this->server->on('request',[$this,'onRequest']);

		//WebSocket
		//连接打开事件
		$this->server->on('open', [$this,"onOpen"]);
		//接收消息事件
		$this->server->on('message', [$this,'onMessage']);
		//连接关闭事件
		$this->server->on('close', [$this,'onClose']);

		//task
		$this->server->on('task',[$this,'onTask']);
		$this->server->on('finish',[$this,'onFinish']);
		

		//开启服务
		$this->server->start();
	}


	//+-----------------事件处理-----------------------
	//http请求处理
	public function onRequest($request,$response){
		print_r($request);

		//$response->end('123');
	}

	//WebSocket处理
	public function onOpen($server,$request){
		
	}

	public function onMessage($server,$frame){
		
	}

	public function onClose($server,$fd){
		
	}
	
	//task处理
	public function onTask($server,$task_id,$src_worker_id,$data){

	}

	public function onFinish($server,$task_id,$data){

	}

}

new Server();
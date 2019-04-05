<?php
class Server 
{
	
	public $server = null;
	public function __construct(){
		$this->server = new Swoole\WebSocket\Server("0.0.0.0", 6000);
		//设置选项
		$this->ws->set([
			//启用进程数
			'worker_num' => 4,    //worker process num
			//启用task进程数
			'task_worker_num' => 10
		]);

		//+----------------------事件注册----------------------
		
		




		//开启服务
		$this->ws->start();
	}
}
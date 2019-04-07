<?php
namespace app\Api\controller;

use server\library\Task;
use server\library\Request;
use Khttps;

class TaskMission
{

	//任务转发
	public function transpond(){
		$post = Request::post();
		$data = [
			'module' => 'Task',
			'controller' => 'TaskDispose',
			'method'     => 'transpond',
			'post'       => $post,
		];
		print_r($data);
		//任务转发处理
		Task::generalTask($data);

		return json_encode([
			'post' => $post,
		]);
	}

	//延时任务
	public function setTimeout(){
		$data = Request::post();
		print_r($data);
		if(isset($data['callBackUrl'])){
			$url = $data['callBackUrl'];
			$millisec = $data['millisec'];

			$https = new Khttps();
			swoole_timer_after($millisec,function () use ($https,$url,$data,$millisec){
				saveLog('TaskMission/setTimeout','延时任务: '.$url. ' | 设置的时间：'.$millisec);
				$https->send_post($url,$data);
				
			});
		}
		return 'setTimeout ok';
	}

	//定时任务
	public function setInterval(){
		$data = Request::post();

		if(isset($data['callBackUrl'])){
			$url = $data['callBackUrl'];
			$millisec = $data['millisec'];

			$https = new Khttps();
			swoole_timer_tick($millisec,function () use ($https,$url,$data,$millisec){
				saveLog('TaskMission/setInterval','定时任务: '.$url. ' | 设置的时间：'.$millisec);
				//$https->send_get('http://www.bilibili.com/');
				$https->send_post($url,$data);
			});
		}
		return 'setInterval ok';
	}



	public function callback_test(){
		$post = Request::post();
		
		saveLog('TaskMission',json_encode($post));
	}


	public function curl_1(){
		
		$https = new Khttps();
		$https->setOption([
			CURLOPT_NOSIGNAL => 1,
			CURLOPT_TIMEOUT_MS => 100,
		]);

		$url = 'http://182.61.46.108:8801/Api/TaskMission/curl_2';
		$t1 = microtime(true);
		$res = $https->send_post($url);
		$t2 = microtime(true);
		echo '响应数据：'.json_encode($res).' 耗时'.round($t2-$t1,3).PHP_EOL;
	}

	public function curl_2(){

		//sleep(10);
		saveLog('TaskMission','curl_2');
		//return 'ok';
	}

}
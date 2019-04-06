<?php
namespace app\Api\controller;

use server\ext\Task;
use server\Request;
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
		
		//任务转发处理
		Task::generalTask($data);

		return json_encode([
			'post' => $post,
		]);
	}

	//延时任务
	public function setTimeout(){
		$data = Request::post();

		if(isset($data['callBackUrl'])){
			$url = $data['callBackUrl'];
			$after_time_ms = $data['millisec'];

			$https = new Khttps();
			swoole_timer_after($after_time_ms,function () use ($https,$url,$data){
				$res = $https->send_post($url,$data);
				saveLog('TaskDispose',json_encode($res));
			});
		}

		print_r('123');
		return 'afterTask';
	}

	//定时任务
	public function setInterval(){
		$data = Request::post();

		if(isset($data['callBackUrl'])){
			$url = $data['callBackUrl'];
			$after_time_ms = $data['millisec'];

			$https = new Khttps();
			swoole_timer_tick($after_time_ms,function () use ($https,$url,$data){
				$res = $https->send_post($url,$data);
				saveLog('TaskDispose',json_encode($res));
			});
		}

		print_r('123');
		return 'afterTask';
	}



	public function callback_test(){
		$post = Request::post();
		print_r($post);
		saveLog('TaskMission',json_encode($post));

		return 'afterTask ok';
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
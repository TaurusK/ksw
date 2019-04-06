<?php
namespace app\Api\controller;

use server\ext\Task;
use server\Request;

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

	public function callback_test(){
		$post = Request::post();
		print_r($post)
		saveLog('TaskMission',json_encode($post));
	}

}
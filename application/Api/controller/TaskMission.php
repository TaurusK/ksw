<?php
namespace app\Api\controller;

use server\ext\Task;
use server\Request;

class TaskMission
{

	//任务转发
	public function transpond(){

		$get = Request::get();
		$post = Request::post();
		$data = 'task，哈哈';
		//任务转发处理
		//Task::transpond($data);

		return json_encode([
			'get' => $get,
			'post' => $post,
		]);
	}

}
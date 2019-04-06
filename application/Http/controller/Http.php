<?php
namespace app\Http\controller;

use server\ext\Task;

class Http
{
	public function test(){
		return '哈哈';
	}

	public function testTask(){
		$data = 'task，哈哈';
		Task::generalTask($data);

		return 'task ok';
	}
}
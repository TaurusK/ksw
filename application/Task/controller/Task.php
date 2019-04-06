<?php
namespace app\Task\controller;

use server\ext\Task;

class Task
{
	public function transpond(){
		$data = 'task，哈哈';
		Task::generalTask($data);

		return 'task ok';
	}
}
<?php
namespace app\Task\controller;

use Khttps;

class TaskDispose
{
	public function transpond($server,$data){
		
		//print_r($data);

		if(isset($data['callBackUrl'])){
			$url = $data['callBackUrl'];
			$https = new Khttps();
			$res = $https->send_post($url,$data);

			saveLog('TaskDispose',json_encode($res));
		}

		return true;
	}
}
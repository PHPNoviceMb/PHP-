<?php

namespace app\cmodule;

use \app\test\model\Set;

class Tool{

	public $set = false;

	public function get($key){

		if($this->set === false){

				$s = new Set();

				$row = [];

				//重建数组，获取数据
				$s->select()->each(function($s,$key)use(&$row){
					$row[$s['key']] = $s;
				});

			}

			//返回表单值
			return isset($row[$key]) ? $row[$key]['value'] : null;
	}
}

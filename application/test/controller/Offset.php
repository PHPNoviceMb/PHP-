<?php

namespace app\test\controller;

use \app\test\model\Set;

class Offset extends Basis{

	//设置页面
	public function page(){

		//获取数据库中的系统设置

		$date = new Set();

		$set = $date->select();

		$a = [
			'set' => $set,
		];

		return view(null,$a);
	}

	//获取设置
	public function save(){

		$SetDate = [
			'date' => $this->request->post('date'),
			'__token__' => $this->request->post('__token__'),
		];

		$vali = new \app\test\validate\ValiSet();

		if(!$vali->check($SetDate)){

			return $this->error($vali->getError());
		}

		$set = new Set();
		
		//重组数据，遍历对象，批量更新.
		$row = [];

		$D = $set->select();

		foreach ($D as $key) {

			$row[] = [
				'id' => $key['id'],
				'value' => $SetDate['date'][$key['key']],
			];
		}

		$set->saveAll($row);

		//每次获取数据，清空缓存
		\think\facade\Cache::rm('setting');
		
		return $this->success('提交成功','test/offset/page');
	}
}


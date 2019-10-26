<?php

namespace app\test\validate;

use app\test\model\Neirong;

class ValiContent extends \think\Validate{

	protected $rule = [
		'title' => 'require|token',
		'content' => 'require',
		'state' => 'integer',
	];

	protected $message = [
		'title.require' => '标题不能为空',
		'title.chckTitle' => '标题不能重复',
		'content.require' => '内容不能为空',
		'state.integer' => '状态无效',
	];

	//添加场景的验证
	public function sceneAdd(){
	}

	//修改场景的验证
	public function sceneModfiy(){
	}
}
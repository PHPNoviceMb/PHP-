<?php

namespace app\index\validate;

class ValiLeave extends \think\Validate{

	public $rule = [
		'content' => 'require|token'
	];

	public $message = [
		'content.require' => '请填写内容'
	];
}
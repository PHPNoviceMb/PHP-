<?php

namespace app\test\validate;

class ValiComments extends \think\Validate{

	public $rule = [
		'content' => 'require|token'
	];

	public $message = [
		'content.require' => '请填写内容'
	];
}
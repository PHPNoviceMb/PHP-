<?php

namespace app\test\validate;

class ValiSet extends \think\Validate{

	protected $rule = [
		'date' => 'require|token',
	];

	protected $message = [
		'date.require' => '表单不能为空',
	];
}
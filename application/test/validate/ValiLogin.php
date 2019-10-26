<?php

namespace app\test\validate;

class ValiLogin extends \think\Validate{

	protected $rule = [

		'user' => 'require|token',
		'password' => 'require',
	];

	protected $message = [
		'user.require' => '用户不能为空',
		'password.require' => '密码不能为空',
	];
}
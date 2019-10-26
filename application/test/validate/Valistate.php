<?php

namespace app\test\validate;

use \app\test\model\Token;

class Valistate extends \think\Validate{

	protected $rule = [
	
		'nickname' => 'require|token',
		'phone' => 'require|mobile',
		'email' => 'require|email',
		'password' => 'require|min:10',
		'state' => 'integer',
	];

	protected $message = [

		'yonghu.require' => '用户不能为空',
		'yonghu.chsAlphaNum' => '用户名只能是汉字、字母、数字，作为开头',
		'yonghu.checkUser' => '此用户已注册',
		'nickname.require' => '昵称不能为空',
		'phone.require' => '手机不能为空',
		'phone.mobile' => '请输入正确的手机号',
		'email.require' => '邮箱不能为空',
		'email.email' => '请输入正确的邮箱',
		'password.require' => '密码不能为空',
		'password.min' => '密码不能小于10个字符',
		'state.integer' => '状态必须为有效的数字',
	];

	//添加场景的验证
	public function sceneAdd(){

		return $this->append('yonghu','checkUser|require|chsAlphaNum');
	}

	//修改场景的验证
	public function sceneModfiy(){

		return $this->append('yonghu','checkUser')
					->remove('password','require');
	}

	//个人资料场景的验证
	public function sceneProfile(){

		return $this->remove('password','require')
					->remove('state','require|integer')
					->remove('yonghu','require|chsAlphaNum|checkUser');
	}

	//验证用户的唯一性
	 protected function checkUser($token,$rule,$all){

	 	$ns = new Token();

	 	$only = $ns->where('yonghu',$all['yonghu'])->find();

	 	if($only){
	 		return false;
	 	}else{
	 		return true;
	 	}

	}
}	
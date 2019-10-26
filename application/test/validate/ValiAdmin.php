<?php

namespace app\test\validate;

use \app\test\model\Login;

class ValiAdmin extends \think\Validate{

	protected $rule = [
		'user' => 'require|token',
		'password' => 'require',
	];

	protected $message = [
		'user.require' => '管理员名字不能为空',
		'user.checkUser' => '管理员名字不能重复',
		'password.require' => '密码不能为空',
	];

	//验证场景，添加
	 public function sceneAdd(){

	 	return $this->append('user','checkUser');
	 }

	 //验证场景，添加
	 public function sceneModfiy(){

	 	return $this->remove('password','require')
	 				->append('user','checkUser');
	 }

	//验证用户的唯一性
	 protected function checkUser($date,$rule,$user){

	 	$ns = new Login();

	 	$only = $ns->where('user',$user['user'])->where('id','<>',$user['id'])->find();

	 	if($only){
	 		return false;
	 	}else{
	 		return true;
	 	}

	} 

}
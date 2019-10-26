<?php 

namespace app\test\model;

//登录模型
class Login extends System{

	public function get($user){

		$scene = $user['id'] ? 'modfiy' : 'add';

		$vali = new \app\test\validate\ValiAdmin();

		if(!$vali->scene($scene)->check($user)){

			return exception($vali->getError(), 10001);
		}

		if($user['password']){

			$user['password'] = password_hash($user['password'],PASSWORD_DEFAULT);
		}else{

			unset($user['password']);
		}

		$u = $this;

		if($user['id']){

			$u = $this->where('id',$user['id'])->find();
		}
		
		$u->save($user);

	}

}
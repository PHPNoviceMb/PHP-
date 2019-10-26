<?php

namespace app\test\model;

class Token extends System{

	public function get($all,$scene = null){




		//验证表单
		$vali = new \app\test\validate\Valistate();

		//动态获取验证场景
		if(!$scene){
			$scene = $all['id'] ? 'modfiy' : 'add';
		}

		if(!$vali->scene($scene)->check($all)){

			return exception($vali->getError(),10002);
		}

		//定义密码
		if($all['password']){

			$all['password'] = password_hash($all['password'],PASSWORD_DEFAULT);
		}else{

			unset($all['password']);
		}

		//更新数据
		$t = $this;

		if($all['id']){

			$t = $this->where('id',$all['id'])->find();
		}

		$t->save($all);
	}

	public function HomeUrl($id){

		$id = $this->where('id',$id)->find();

		if($id){
			return $id;
		}else{

			$id = null;
		}
	}

	//获取器，增加博主链接字段
	public function getHurlAttr(){

		return url("index/home/index",['id'=>$this->id]);	
	}
}
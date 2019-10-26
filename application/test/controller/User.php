<?php

namespace app\test\controller;

use \app\test\model\Token;

class User extends Basis{

	//构造方法,执行配置方法
	public function initialize(){

		parent::initialize();	

		//获取用户状态配置，输出
		$config = config('state2.state');

		$this->assign('config',$config);

	}

	//用户首页
	public function home(){

		$search = $this->request->get('search');

		$token = new Token();

		//数据搜索
		if($search){
			$token = $token->where('yonghu','like',"%{$search}%");
			$token = $token->whereOr('nickname','like',"%{$search}%");
			$token = $token->whereOr('phone',$search);
			$token = $token->whereOr('email',$search);
		}

		$date = $token->order('id','desc')->paginate(3);

		$information = [
			'date' => $date,
			'search' => $search,
		];

		return view(null,$information);
	}

	//用户添加
	public function add(){

		$type = [
			'name' => '添加',
		];

		return view(null,$type);
	}

	//保存用户
	public function save(){

		$all = [
			'id' => (int)$this->request->post('id'),
			'nickname' => $this->request->post('nickname'),
			'phone' => $this->request->post('phone'),
			'email' => $this->request->post('email'),
			'password' => $this->request->post('password'),
			'state' => (int)$this->request->post('state'),
			'__token__' => $this->request->post('__token__'),	
		];

		//根据id，获取用户名
		if( $all['id'] < 1){

			$all['yonghu'] = $this->request->post('user');
		}

		//实例化模型，调用方法
		$t = new Token();

		try{

			$t->get($all);

		}catch(\Exception $e){
			return $this->error($e->getMessage());
		}

		

		return $this->success('提交成功','test/user/home');
	}

	//修改用户
	public function modfiy(){

		$id = (int)$this->request->get('id');

		$token = new Token();

		$uid = $token->where('id',$id)->find();

		$type = [
			'name' => '修改',
			"disabled" => "disabled",
			'uid' => $uid,
		];

		return view('user/add',$type);
	}

	//用户状态
	public function state(){

		$state = [
			'id' => (int)$this->request->get('id'),
			'state' => (int)$this->request->get('state'),
		];

		//更新状态，并保存
		$newState = $state['state'] == 0 ? 1 : 0;

		//取出数据，保存到数据表中更新
		$d = new Token();

		$date = $d->where('id',$state['id'])->find();

		$date->save([
			'state' => $newState,	
			]);

		return $this->success('切换成功','test/user/home');
	}
}
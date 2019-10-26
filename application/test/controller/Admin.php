<?php

namespace app\test\controller;

use \app\test\model\Login;

class Admin extends Basis{

	//管理员首页
	public function home(){

		$date = new Login();

		$admin = $date->select();

		$in = [
			'admin' => $admin,
		];

		return view(null,$in);
	}

	//添加管理员
	public function add(){

		$type = [

			'name' => '添加',
		];

		return view(null,$type);
	}

	//获取管理员
	public function save(){

		$user = [
			'user' => $this->request->post('user'),
			'password'  => $this->request->post('password'),
			'__token__' => $this->request->post('__token__'),
			'id' => (int)$this->request->post('id'),
		];

		$info = new Login();

		try {

   			$info->get($user);

		}catch (\Exception $e) {

		    //这是进行异常捕获
		    return $this->error($e->getMessage());
		}

		return $this->success('提交成功','test/admin/home');
	}

	//修改管理员
	public function modfiy(){

		$AdminId = (int)$this->request->get('id');

		$id = new Login();

		$aid = $id->where('id',$AdminId)->find();
		if(!$aid){

			return $this->error('数据不存在');
		}

		$type = [

			'name' => '修改',
			'id' => $aid,

		];

		return view('admin/add',$type);
	}

	//删除管理员
	public function del(){

		$delId = (int)$this->request->get('id');

		$del = new Login();

		$delete = $del->where('id',$delId)->find();
		$delete->delete();

		return $this->redirect('test/admin/home');
	}
}
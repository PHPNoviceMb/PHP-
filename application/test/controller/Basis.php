<?php 

namespace app\test\controller;

use \app\test\model\Login;

//后台基础控制器
class Basis extends \think\Controller{

	public function initialize(){

		//获取登录状态
		$id = \think\facade\Session::get('UserId');

		$Id = new Login();

		//验证登录状态
		$user = $Id->where('id',$id)->find();

		if(!$user){
			return $this->error('当前网页需要登录','test/index/login');
		}

		//验证登录用户
		if(!$user['user']){
			return $this->error('当前用户不存在');
		}

		$this->assign('user',$user);

		$this->user = $user;
		
		$webset = \app\facade\Tool::get('webset');

		$this->assign('webset',$webset);

	}

}
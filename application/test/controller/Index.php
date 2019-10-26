<?php
namespace app\test\controller;

use \app\test\model\Login;

//后台登录
class Index extends \think\Controller
{
	//后台登录页面
    public function login()
    {   
        return view();
    }

    //获取数据
    public function save(){

    	//获取表单
    	$date = [

    		'user' => $this->request->post('user'),
    		'password' => $this->request->post('password'),
    		'__token__' => $this->request->post('__token__'),
 
    	];

    	$vali = new \app\test\validate\ValiLogin();

    	if(!$vali->check($date)){
    		return $this->error($vali->getError());
    	}

    	//数据匹配
    	$login = new login();

    	$user = $login->where('user',$date['user'])->find();

    	if(!$user){
    		return $this->error('用户不存在');
    	}

    	//密码验证
    	if(password_verify($date['password'],$user['password']) === false){

    		return $this->error('密码错误，请重新输入');
    	}

    	//写入登录状态
    	\think\facade\Session::set('UserId',$user['id']);
    	
    	return $this->redirect('test/page/home');
    }

    //退出登录
    public function out(){

    	//清空session，实现退出
    	\think\facade\Session::delete('UserId');

    	return $this->redirect('test/index/login');
    }
}

<?php

namespace app\test\controller;

use app\test\model\Neirong;

class Content extends Basis{

	public function initialize(){

		parent::initialize();

		$cState = config('state2.content_state');

		$this->assign('cState',$cState);
	}

	//内容首页
	public function home(){

		$search = $this->request->get('search');

		//关联预载入
		$content = Neirong::with('Login,token');

		//搜索功能
		if($search){
			$content = $content->where('title','like',"%{$search}%");	
		}

		$date = $content->order('id','desc')->paginate(4);

		$cDate = [
			'date' => $date,
			'search' => $search,
		];

		return view(null,$cDate);
	}

	//内容添加
	public function add(){

		$type = [
			'name' => '添加',
		];

		return view(null,$type);
	}

	//保存内容
	public function save(){

		$date = [

			'title' => $this->request->post('title'),
			'content' => $this->request->post('content'),
			'state' => (int)$this->request->post('state'),
			'__token__' => $this->request->post('__token__'),
			'login_id' => $this->user->id,
			'id' => (int)$this->request->post('id'),

 		];

 		$vali = new \app\test\validate\ValiContent();

 		$scene = $date['id'] ? 'modfiy' : 'add';

 		if(!$vali->scene($scene)->check($date)){

 			return $this->error($vali->getError());
 		}

 		$c = new Neirong();

 		if($date['id']){

 			$c = $c->where('id',$date['id'])->find();
 		}

 		$record = $c->save($date);

		return $this->success('提交成功','test/content/home');
	}

	//内容修改
	public function modfiy(){

		$cd = (int)$this->request->get('id');

		$cid = new Neirong();

		$id = $cid->where('id',$cd)->find();

		if(!$id){

			return $this->error('数据不存在');
		}

		$type = [
			'id' => $id,
			'name' => '修改',
		];

		return view('content/add',$type);
	}

	//内容状态
	public function state(){

		$state = [
			'id' => (int)$this->request->get('id'),
			'state' => (int)$this->request->get('state'),
		];

		//修改状态
		$newState = $state['state'] == 0 ? 1 : 0;

		$staus = new Neirong();

		$s = $staus->where('id',$state['id'])->find();

		if(!$s){
			return $this->error('数据不存在');
		}

		$s->save([
			'state' => $newState,
			]);

		return $this->success('切换成功','test/content/home');
	}

	//内容删除
	public function del(){

		$delId = (int)$this->request->get('id');

		$del = new Neirong();

		$delete = $del->where('id',$delId)->find();

		$delete->delete();

		return $this->redirect('test/content/home');
	}	

	//文件上传
	public function upload(){

		//获取上传文件
		$file = request()->file('file');

		//保存目录,验证文件
		$info = $file->validate(['size'=>1024*1024*1,'ext'=>'jpg,png,gif,jpeg'])
					 ->rule('uniqid')
					 ->move('./photo/pt');

		//定义数组
		$json = [];

		if($info){

			$json['success'] = true;
			$json['file_path'] = url('photo/pt/'.$info->getSaveName());

		}else{

			$json['success'] = false;
			//上传失败输出错误信息
			$json['msg'] = $file->getError();
		}

		return json($json);
	}
}
<?php

namespace app\test\controller;

use \app\test\model\Leave;

class Comments extends Basis{

	//评论页
	public function home(){

		$leave = new Leave();

		$date = $leave->order('id','desc')->paginate(4);

		$Cdate = [
			'date' => $date
		];

		return view(null,$Cdate);
	}

	//修改
	public function modfiy(){

		$id = (int)$this->request->get('id');

		$leave = new Leave();

		$alter = $leave->where('id',$id)->find();

		$date = [
			'alter' => $alter
		];

		return view(null,$date);
	}

	//删除
	public function del(){

		$DeleteId = (int)$this->request->get('id');

		$leave = new Leave();

		$delete = $leave->where('id',$DeleteId)->find();

		if(!$delete){

			return $this->error('数据不存在');
		}

		$delete->delete();

		return $this->redirect('test/comments/home');
	}

	//上传
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

	//接收
	public function save(){

		$date = [
			'content' => $this->request->post('content'),
			'id' => (int)$this->request->post('id'),
			'__token__' => $this->request->post('__token__')
		];

		$vali = new \app\test\validate\ValiComments();

		if(!$vali->check($date)){

			$this->error($vali->getError());
		}

		$leave = new Leave();

		$leave = $leave->where('id',$date['id'])->find();

		if(!$leave){

			return $this->error('数据不存在');
		}

		$leave->save($date);

		return $this->success('修改成功','test/comments/home');
	}
}
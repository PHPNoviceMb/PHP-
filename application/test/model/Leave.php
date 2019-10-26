<?php

namespace app\test\model;

//留言本模型类
class Leave extends System{

	public function token(){

		return $this->belongsTo('Token');
	}

	public function login(){

		return $this->belongsTo('Login');
	}

	public function neirong(){

		return $this->belongsTo('Neirong');
	}

	//查询范围，获取当前内容
	public function scopeMy($query,$token_id){

		$query->where('token_id',$token_id);
	}

	//获取器，增加博主链接字段
	public function getLurlAttr(){

		return url("index/home/index",['id'=>$this->token_id]);	
	}

	//获取器，增加评论简介字段
	public function getCommentsAttr(){

		$content = strip_tags(mb_substr($this['content'],0,50));

		return $content;
	}


}
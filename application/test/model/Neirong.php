<?php

namespace app\test\model;

//内容模型
class Neirong extends System{


	public function login(){

		return $this->belongsTo('Login');
	}

	public function token(){

		return $this->belongsTo('Token');
	}

	//查询范围，获取当前用户
	public function scopeMy($query,$token_id){

		$query->where('token_id',$token_id);
	}

	//获取器，增加简介字段
	public function getBriefAttr(){

		$content = strip_tags(mb_substr($this['content'],0,250));

		return $content;
	}

	//获取器，增加图片字段
	public function getImgAttr(){

		$mag = preg_match("/<img.*?src=('|\")(.*?)('|\")/i",$this->content,$img);

		if($mag){

			return $img[2];
		}else{

			return url("photo/user/1.jpg");
		}
	}

	public function BlogUrl($id){

		$id = $this->where('id',$id)->find();

		if($id){
			return $id;
		}else{

			$id = null;
		}
	}

	//获取器，增加博文链接字段
	public function getBurlAttr(){

		return url("index/blog/read",['id'=>$this->id]);	
	}


}
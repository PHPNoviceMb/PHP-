<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//第一次编写首页
//网站首页
Route::get('/', 'index/index/home');

Route::group('read',function(){

	//博文阅读
	Route::get('/:id', 'index/blog/read')->pattern(['id' => '\d+']);

	//评论修改
	Route::get('/modfiy','index/blog/modfiy');

	//评论删除
	Route::get('/del','index/blog/del');

	//上传
	Route::post('/up', 'index/blog/up');

	//接收表单
	Route::post('/comments', 'index/blog/save');	

});

//个人主页
Route::get('home/:id', 'index/home/index')->pattern(['id' => '\d+']);

//数据测试
Route::get('test', 'index/test/test');


//网站用户注册
Route::get('signup','index/sign/up');

//网站用户检查
Route::post('signcheck','index/sign/check');

//网站用户昵称检查
Route::post('signnickname','index/sign/check_nickname');

//网站用户手机检查
Route::post('signphone','index/sign/check_phone');

//网站用户邮箱检查
Route::post('signemail','index/sign/check_email');

//接收注册表单
Route::post('signup','index/sign/save');


//网站用户登录
Route::get('signin','index/sign/in');

//接收登录表单
Route::post('signin','index/sign/in_check');

//网页退出
Route::get('signout','index/sign/out');

//个人中心
Route::group('u',function(){

		//个人中心页面
		Route::get('index','index/UserCenter/home');

		//个人资料表单
		Route::get('profile','index/UserCenter/add');

		//获取表单
		Route::post('profile','index/UserCenter/save');

		//个人博客页
		Route::get('blog','index/UserBlog/home');

		//博客添加页
		Route::get('blog/add','index/UserBlog/add');

		//博客修改页
		Route::get('blog/modfiy','index/UserBlog/modfiy');

		//博客删除页
		Route::get('blog/del','index/UserBlog/del');

		//博客状态
		Route::get('blog/state','index/UserBlog/state');

		//文件上传
		Route::post('blog/up','index/UserBlog/up');

		//获取表单
		Route::post('blog/save','index/UserBlog/save');
	
	});

//后台系统
Route::group('test',function(){

	//后台首页
	Route::get('page/home','test/page/home');

	//后台登录
	Route::group('index',function(){

		//登录页面
		Route::get('login','test/index/login');

		//保存
		Route::post('save','test/index/save');

		//退出登录
		Route::get('out','test/index/out');
	});

		//系统设置
		Route::group('offset',function(){

			//设置页面
			Route::get('page','test/offset/page');

			//保存设置
			Route::post('save','test/offset/save');
			
		});

			//管理员
			Route::group('admin',function(){
				//管理员首页
				Route::get('home','test/admin/home');
				//管理员添加
				Route::get('add','test/admin/add');
				//保存管理员
				Route::post('save','test/admin/save');
				//修改管理员
				Route::get('modfiy','test/admin/modfiy');
				//删除管理员	
				Route::get('del','test/admin/del');
			});

				//用户
				Route::group('user',function(){
					//用户首页
					Route::get('home','test/user/home');
					//用户添加
					Route::get('add','test/user/add');
					//保存用户
					Route::post('save','test/user/save');
					//修改用户
					Route::get('modfiy','test/user/modfiy');
					//用户状态
					Route::get('state','test/user/state');
				});

				//内容
				Route::group('content',function(){
					//内容首页
					Route::get('home','test/content/home');
					//内容添加
					Route::get('add','test/content/add');
					//保存内容
					Route::post('save','test/content/save');
					//修改内容
					Route::get('modfiy','test/content/modfiy');
					//内容状态
					Route::get('state','test/content/state');
					//删除内容
					Route::get('del','test/content/del');
					//文件上传
					Route::post('upload','test/content/upload');
				});

					//评论
					Route::group('comments',function(){
						//评论首页
						Route::get('home','test/comments/home');

						//评论修改
						Route::get('modfiy','test/comments/modfiy');

						//评论删除
						Route::get('del','test/comments/del');

						//接收表单
						Route::post('save','test/comments/save');

						//文件上传
						Route::post('upload','test/comments/upload');

					});
});

return [

];

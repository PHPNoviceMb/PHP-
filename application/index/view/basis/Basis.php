<!-- 前台基础模板 -->
<!DOCTYPE html>
<html>
<head>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>{$webset}</title>

	{block name='head'}{/block}

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo url('index/index/home'); ?>">{$webset}</a>
			</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
						{if !$uid}
						<li><a href="{:url('index/sign/up')}">注册</a></li>
						<li><a href="{:url('index/sign/in')}">登录</a></li>	
						{else}
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎 {$uid->nickname}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="{:url('index/usercenter/home')}">个人中心</a></li>
							<li><a href="{$uid->hurl}">个人主页 </a></li>
							<li><a href="{:url('index/sign/out')}">退出</a></li>
						</ul>
					</li>
					{/if}
				</ul>
			</div>
		</div>
	</nav>
<div class='container'>
<div class="row">
	{if $typeName == 'one'}
	<div class="col-md-12">
		{block name='page'}{/block}
	</div>
	{/if}
	{if $typeName == 'two'}
	{block name='menu'}
	<div class="col-md-3">
		<div class="list-group">
			<a class="list-group-item active">
			优秀博文
			</a>
			{volist name='Cdate' id='item'}
			<a href="{$item->burl}" class="list-group-item">{$item->title}</a>
			{/volist}
		</div>
		<div class="list-group">
			<a class="list-group-item active">
			优秀博主
			</a>
			{volist name='GoodUser' id='item'}
			<a href="{$item->hurl}" class="list-group-item">{$item->nickname}</a>
			{/volist}
		</div>
	</div>
	{/block}
  <div class="col-md-9">{block name='content'}{/block}</div>
  {/if}
</div>
</div>
<div class='well text-center' style='height:140px;margin-top:20px'>
        版权所有 陆凯峰
</div>
</body>
</html>

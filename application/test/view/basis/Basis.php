<!-- 后台基础模板 -->
<!DOCTYPE html>
<html>
<head>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<title>{$webset}{block name='title'}{/block}</title>

	{block name='head'}{/block}

</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<a class="navbar-brand" href="<?php echo url('test/page/home'); ?>">Admin cp</a>
			</div>
				<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">欢迎 {$user->user}<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="#">暂留</a></li>
							<li><a href="{:url('test/index/out')}">退出</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</body>
<div class='container-fluid'>
<div class="row">
	<div class="col-md-2">
		<div class="list-group">
			<a class="list-group-item active">
			管理员
			</a>
			<a href="{:url('test/offset/page')}" class="list-group-item">系统设置</a>
			<a href="{:url('test/admin/home')}" class="list-group-item">管理员用户</a>
		</div>
		<div class="list-group">
			<a class="list-group-item active">
			用户
			</a>
			<a href="{:url('test/user/home')}" class="list-group-item">所有用户</a>
		</div>
		<div class="list-group">
			<a class="list-group-item active">
			内容
			</a>
			<a href="{:url('test/content/home')}" class="list-group-item">所有内容</a>
		</div>
		<div class="list-group">
			<a class="list-group-item active">
			评论
			</a>
			<a href="{:url('test/comments/home')}" class="list-group-item">所有评论</a>
		</div>
	</div>
  <div class="col-md-10">{block name='content'}{/block}</div>
</div>
</div>
</html>

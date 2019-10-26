<!DOCTYPE html>
<html>
<head>
	<!-- 最新版本的 Bootstrap 核心 CSS 文件 -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.slim.js"></script>

	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<title>后台登录</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<form class="col-md-6 col-md-offset-3 well" style="margin-top: 150px;" action="{:url('test/index/save')}" method='post'>
			{:token()}
				<div class="form-group">
					<label for="exampleInputEmail1">用户</label>
					<input name="user" type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">密码</label>
					<input name=password type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
				</div>
				<button type="submit" class="btn btn-default">登录</button>
			</form>
		</div>
	</div>
</body>
</html>
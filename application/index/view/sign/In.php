{extend name='basis/basis'}

{block name='page'}
<!-- 用户登录 -->
<div class="container">
		<div class="row">
			<form class="col-md-6 col-md-offset-3 well" style="margin-top: 150px;" action="{:url('index/sign/in_check')}" method='post'>
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
{/block}
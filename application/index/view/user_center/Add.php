{extend name='basis/basis'}

{block name='menu'}
{include file='basis/UserBasis'}
{/block}

{block name='content'}
<!-- 用户模板 -->
<h1>个人资料</h1>
<form action='{:url("index/usercenter/save")}' method='post'>
	{:token()}
	<div>
		<input name='id' type='hidden' value='{$user->id|default=""}' >
	</div>
  <div class="form-group">
    <label for="exampleInputEmail1">用户名</label>
    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名" disabled value='{$user->yonghu|default=""}'> 
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">昵称</label>
    <input name='nickname' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员昵称" value='{$user->nickname|default=""}'>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">手机</label>
    <input name='phone' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员手机" value='{$user->phone|default=""}' >
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">邮箱</label>
    <input name='email' type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员邮箱" value='{$user->email|default=""}'>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码(如使用原密码，请留空)</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="如使用原密码，请留空">
  </div>
  <button type="submit" class="btn btn-success pull-right">提交</button>
</form>
{/block}
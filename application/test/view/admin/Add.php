{extend name='basis/basis'}

{block name='content'}
<!-- 管理员表单 -->
<h1>{$name}</h1>
<form action='{:url("test/admin/save")}' method='post'>
	{:token()}
	<div>
		<input name='id' type='hidden' value='{$id->id|default=""}'>
	</div>
  <div class="form-group">
    <label for="exampleInputEmail1">管理员名字</label>
    <input name='user' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员名字" value="{$id->user|default=''}">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
  </div>
  <button type="submit" class="btn btn-success">提交</button>
</form>
{/block}
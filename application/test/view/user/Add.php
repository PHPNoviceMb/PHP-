{extend name='basis/basis'}

{block name='content'}

<!-- 用户模板 -->
<h1>{$name}</h1>
<form action='{:url("test/user/save")}' method='post'>
	{:token()}
	<div>
		<input name='id' type='hidden' value='{$uid->id|default=""}' >
	</div>
  <div class="form-group">
    <label for="exampleInputEmail1">用户名</label>
    <input name='user' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入用户名" {$disabled|default=''} value='{$uid->yonghu|default=""}' >
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">昵称</label>
    <input name='nickname' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员昵称" value='{$uid->nickname|default=""}' >
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">手机</label>
    <input name='phone' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员手机" value='{$uid->phone|default=""}' >
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">邮箱</label>
    <input name='email' type="email" class="form-control" id="exampleInputEmail1" placeholder="请输入管理员邮箱" value='{$uid->email|default=""}' >
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="请输入密码">
  </div>
  <div>
  状态：
  	<select name='state' id='zhuangtai'>
  		{volist name='config' id='state'}
  		<option value='{$key}'><?php echo $state; ?></option>
  		{/volist}
  	</select>
  	<script>
		$('#zhuangtai').val({$uid->state|default=1});
	 </script>
  </div>
  <button type="submit" class="btn btn-success pull-right">提交</button>
</form>


{/block}
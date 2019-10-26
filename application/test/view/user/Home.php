{extend name='basis/basis'}

{block name='content'}
<!-- 用户首页 -->
<h1>用户</h1>
<form class="form-inline" action='{:url("test/user/home")}' method='get'>
  <div class="form-group">
    <label for="exampleInputName2">用户搜索</label>
    <input name='search' type="text" class="form-control" id="exampleInputName2" placeholder="用户名，昵称，手机，邮箱" value="{$search}">
  </div>
  <button type="submit" class="btn btn-default">搜索</button>
</form>

 <a class="btn btn-primary pull-right" style='margin-bottom: 20px;' href="{:url('test/user/add')}" role="button">添加</a>

<table class="table">
<tr>
	<th>#</th>
	<th>用户</th>
	<th>昵称</th>
	<th>手机</th>
	<th>邮箱</th>
	<th>状态</th>
	<th>设置</th>
</tr>
{volist name='date' id='msg'}
<tr>
	<td>{$msg->id}</td>
	<td>{$msg->yonghu}</td>
	<td>{$msg->nickname}</td>
	<td>{$msg->phone}</td>
	<td>{$msg->email}</td>
	<td><?php echo $config[$msg['state']]; ?></td>
	<td>
		<a class="btn btn-warning"  href="{:url('test/user/modfiy',['id'=>$msg->id])}" role="button">修改</a>
		<a class="btn btn-danger"  href="{:url('test/user/state',['id'=>$msg->id,'state'=>$msg['state']])}" role="button">切换状态</a>
	</td>
</tr>
{/volist}
</table>
{$date|raw}
{/block}
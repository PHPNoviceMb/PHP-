{extend name='basis/basis'}

{block name='content'}
<!-- 内容首页 -->
<h1>内容</h1>
<form class="form-inline" action='{:url("test/content/home")}' method='get'>
  <div class="form-group">
    <label for="exampleInputName2">标题搜索</label>
    <input name='search' type="text" class="form-control" id="exampleInputName2" placeholder="标题" value='{$search}' >
  </div>
  <button type="submit" class="btn btn-default">搜索</button>
</form>

 <a class="btn btn-primary pull-right" style='margin-bottom: 20px;' href="{:url('test/content/add')}" role="button">添加</a>

<table class="table">
<tr>
	<th>#</th>
	<th>管理员</th>
	<th>用户</th>
	<th>标题</th>
	<th>创建时间</th>
	<th>修改时间</th>
	<th>状态</th>
	<th>设置</th>
</tr>
{volist name='date' id='d'}
<tr>
	<td>{$d->id}</td>
	<td>{$d->login->user|default='不是当前登录管理员提交'}</td>
	<td>{$d->token->nickname|default="未查找到相应的用户"}</td>
	<td>{$d->title}</td>
	<td><?php echo $d['create_time']; ?></td>
	<td><?php echo $d['update_time']; ?></td>
	<td><?php echo $cState[$d['state']]; ?></td>
	<td>
		<a class="btn btn-warning"  href="{:url('test/content/modfiy',['id'=>$d->id])}" role="button">修改</a>
		<a class="btn btn-danger"  href="{:url('test/content/state',['id'=>$d->id,'state'=>$d->state])}" role="button">切换状态</a>
		<a class="btn btn-warning"  href="{:url('test/content/del',['id'=>$d->id])}" onclick='return confirm("亲，确认删除，请点击确认！")' role="button">删除</a>
	</td>
</tr>
{/volist}
</table>
{$date|raw}
{/block}
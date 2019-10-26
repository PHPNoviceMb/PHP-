{extend name='basis/basis'}

{block name='menu'}
{include file='basis/UserBasis'}
{/block}

{block name='content'}
<!-- 内容首页 -->
<form class="form-inline" action='{:url("index/userblog/home")}' method='get'>
  <div class="form-group">
    <label for="exampleInputName2">标题搜索</label>
    <input name='search' type="text" class="form-control" id="exampleInputName2" placeholder="请输入标题，搜索文章" value='{$search}' >
  </div>
  <button type="submit" class="btn btn-default">搜索</button>
</form>

 <a class="btn btn-primary pull-right" style='margin-bottom: 20px;' href="{:url('index/userblog/add')}" role="button">发布</a>

<table class="table">
<tr>
	<th>#</th>
	<th>标题</th>
	<th>创建/修改时间</th>
	<th>状态</th>
	<th>设置</th>
</tr>
{volist name='date' id='d'}
<tr>
	<td>{$d->id}</td>
	<td>{$d->title}</td>
	<td><?php echo $d['create_time']; ?></br><?php echo $d['update_time']; ?></td>
	<td><?php echo $cState[$d['state']]; ?></td>
	<td>
		<a class="btn btn-warning"  href="{:url('index/userblog/modfiy',['id'=>$d->id])}" role="button">修改</a>
		<a class="btn btn-danger"  href="{:url('index/userblog/state',['id'=>$d->id,'state'=>$d->state])}" role="button">切换状态</a>
		<a class="btn btn-warning"  href="{:url('index/userblog/del',['id'=>$d->id])}" onclick='return confirm("亲，确认删除，请点击确认！")' role="button">删除</a>
	</td>
</tr>
{/volist}
</table>
{$date|raw}{/block}
{extend name='basis/basis'}

{block name='content'}
<!-- 管理员页面 -->
<h1>管理员</h1> <a class="btn btn-primary pull-right" style='margin-bottom: 20px;' href="{:url('test/admin/add')}" role="button">添加</a>
<table class="table">
<tr>
	<th>#</th>
	<th>管理员</th>
	<th>设置</th>
</tr>
{volist name='admin' id='ad'}
<tr>
	<td>{$ad->id}</td>
	<td>{$ad->user}</td>
	<td>
		<a class="btn btn-warning"  href="{:url('test/admin/modfiy',['id'=>$ad->id])}" role="button">修改</a>
		<a class='btn btn-danger'  href='{:url("test/admin/del",["id"=>$ad->id])}' onclick='return confirm("亲，确认删除，请点击确认！")' role="button">删除</a>
	</td>
</tr>
{/volist}
</table>
{/block}
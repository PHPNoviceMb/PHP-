{extend name='basis/basis'}

{block name='content'}
<!-- 评论首页 -->
<h1>评论</h1>

<table class="table">
<tr>
	<th>#</th>
	<th>用户</th>
	<th>评论</th>
	<th>创建时间</th>
	<th>修改时间</th>
	<th>设置</th>
</tr>
{volist name='date' id='d'}
<tr>
	<td>{$d->id}</td>
	<td>{$d->token->nickname|default=''}</td>
	<td style="color:#3CB371">{$d->comments|default='该评论为纯图片'}</td>
	<td>{$d->create_time}</td>
	<td>{$d->update_time}</td>
	<td>
		<a class="btn btn-warning"  href="{:url('test/comments/modfiy',['id'=>$d->id])}" role="button">修改</a>
		<a class="btn btn-danger"  href="{:url('test/comments/del',['id'=>$d->id])}" onclick='return confirm("亲，确认删除，请点击确认！")' role="button">删除</a>
	</td>
</tr>
{/volist}
</table>
{$date|raw}
{/block}
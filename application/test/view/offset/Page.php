{extend name='basis/basis'}

{block name='title'} - 系统设置 {/block}

{block name='content'}
<!-- 系统设置模板 -->
<div class="container">
		<div class="row">
			<form class="col-md-6 col-md-offset-2 well" style="margin-top: 100px;" action="{:url('test/offset/save')}" method='post'>
			{:token()}
			{volist name='set' id='s'}
				<div class="form-group">
					<label for="exampleInputEmail1">{$s->name}</label>
					<input name="date[<?php echo $s['key']; ?>]" type="text" class="form-control" id="exampleInputEmail1" value='{$s->value}'>
				</div>
			{/volist}	
				<button type="submit" class="btn btn-default">提交</button>
			</form>
		</div>
	</div>
{/block}
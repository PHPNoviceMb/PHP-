{extend name='basis/basis'}

{block name='head'}
  <link rel="stylesheet" type="text/css" href="{:url('/static/styles')}/simditor.css" />

  <script type="text/javascript" src="{:url('/static/scripts')}/module.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/hotkeys.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/uploader.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/simditor.js"></script>
{/block}

{block name='content'}
<!-- 博文阅读 -->
<h1>{$blog->title}</h1>


<div class="media-left pull-right">
	<p class='text-muted'>
		作者: <a href='{$blog->token->hurl|default=""}'>{$blog->token->nickname|default='管理员发布'}</a>
		时间: {$blog->create_time}
	</p>	
</div>
</br>
<div class="media-body well text-left">
	<h4 class="media-heading" style='font-size:1.2em;font-variant:small-caps; letter-spacing:1.5px'>
		<?php echo $blog['content']; ?>
	</h4>
</div>
<div style='margin-top:20px' class='well'>
<form class="form-horizontal" action="{:url('index/blog/save',['id'=>$blog->id])}" method="post">
{:token()}
<div>
	评论内容：
	<textarea id='text' name='content' class="form-control" rows="20"></textarea>
</div>
</br>
  <div class="form-group">
    <div class="pull-right">
      <button type="submit" class="btn btn-default">提交</button>
    </div>
  </div>
</form>
	<script type="text/javascript">

		var editor = new Simditor({
	      textarea: $('#text'),
	      toolbar:[
	        'title',
	        'bold',
	        'italic',
	        'underline',
	        'strikethrough',
	        'fontScale',
	        'color',
	        'ol',         
	        'ul',            
	        'blockquote',
	        'code',           
	        'table',
	        'link',
	        'image',
	        'hr',            
	        'indent',
	        'outdent',
	        'alignment'
	    ],
	    upload:{
	      url: '{:url("index/blog/up")}',
	      params: null,
	      fileKey: 'file',
	      connectionCount: 2,
	      leaveConfirm: '上传未完成，确定离开吗？'
	      },
	      pasteImage:true
		});
	</script>
	<div class="container-fluid">
		{volist name='date' id='leave'}
		<div class="row well">
			<a href='{$leave->lurl}'>
				<span class="pull-left" style="margin-right:20px;color:#696969">{$leave->token->nickname|default=''}</span>
			</a>
			<span class="pull-right" style="color:#999">{$leave->create_time}
				<a class="btn btn-warning" href="{:url('index/blog/modfiy',['id'=>$leave->id])}" role="button">修改</a>
				<a class="btn btn-danger" href="{:url('index/blog/del',['id'=>$leave->id])}" onclick='return confirm("亲，确认删除，请点击确认！")' role="button">删除</a>
			</span>

			<div class='text-center' style="color:#3CB371">
				<span><?php echo $leave['content']; ?></span>
			</div>	 
		</div>
		{/volist}
		{$date|raw}
	</div>
</div>
{/block}
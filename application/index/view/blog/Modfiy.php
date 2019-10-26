{extend name='basis/basis'}

{block name='head'}
  <link rel="stylesheet" type="text/css" href="{:url('/static/styles')}/simditor.css" />

  <script type="text/javascript" src="{:url('/static/scripts')}/module.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/hotkeys.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/uploader.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/simditor.js"></script>
{/block}

{block name='content'}
<form class="form-horizontal" action="{:url('index/blog/save',['id'=>$id->neirong->id])}" method="post">
{:token()}
<div>
	<input type="hidden" name='id' value='{$id->id}'>
</div>
<div>
	评论内容：
	<textarea id='text' name='content' class="form-control" rows="20">{$id->content}</textarea>
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
</div>
{/block}
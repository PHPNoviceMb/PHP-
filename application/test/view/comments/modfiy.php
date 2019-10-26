{extend name='basis/basis'}

{block name='head'}
<link rel="stylesheet" type="text/css" href="{:url('/static/styles')}/simditor.css" />

  <script type="text/javascript" src="{:url('/static/scripts')}/module.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/hotkeys.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/uploader.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/simditor.js"></script>
{/block}

{block name='content'}
<!-- 评论模板 -->
<h1>修改</h1>
<form action='{:url("test/comments/save")}' method='post'>
	{:token()}
	<div>
		<input name='id' type='hidden' value='{$alter->id|default=""}' >
	</div>
   <div class="form-group">
    <label for="exampleInputEmail1">评论内容:</label>
	<textarea id='text' name='content' class="form-control" rows="20">{$alter->content}</textarea>
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
      url: '{:url("test/comments/upload")}',
      params: null,
      fileKey: 'file',
      connectionCount: 2,
      leaveConfirm: '上传未完成，确定离开吗？'
      },
      pasteImage:true
    });
    </script>
  </div>
  <button type="submit" class="btn btn-success pull-right">提交</button>
</form>
{/block}
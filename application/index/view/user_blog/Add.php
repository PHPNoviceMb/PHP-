{extend name='basis/basis'}

{block name='menu'}
{include file='basis/UserBasis'}
{/block}

{block name='head'}
  <link rel="stylesheet" type="text/css" href="{:url('/static/styles')}/simditor.css" />

  <script type="text/javascript" src="{:url('/static/scripts')}/module.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/hotkeys.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/uploader.js"></script>
  <script type="text/javascript" src="{:url('/static/scripts')}/simditor.js"></script>
{/block}

{block name='content'}
<!-- 内容表单 -->
<h1>{$name}</h1>
<form action='{:url("index/userblog/save")}' method='post'>
	{:token()}
	<div>
		<input name='id' type='hidden' value='{$id->id|default=""}' >
	</div>
  <div class="form-group">
    <label for="exampleInputEmail1">标题</label>
    <input name='title' type="text" class="form-control" id="exampleInputEmail1" placeholder="请输入标题" value='{$id->title|default=""}'>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">内容</label>
	<textarea id='text' name='content' class="form-control" rows="20">{$id->content|default=""}</textarea>
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
      url: '{:url("index/userblog/up")}',
      params: null,
      fileKey: 'file',
      connectionCount: 2,
      leaveConfirm: '上传未完成，确定离开吗？'
      },
      pasteImage:true
    });

    </script>
  </div>
  <div>
  状态：
  	<select name='state' id='zhuangtai'>
  	{volist name='cState' id='c'}
  		<option value={$key}><?php echo $c; ?></option>
  	{/volist}
  	</select>
  	<script>
		$('#zhuangtai').val({$id->state|default=0});
	</script>
  </div>
  <button type="submit" class="btn btn-success pull-right">提交</button>
</form>
{/block}
{extend name='basis/basis'}

{block name='content'}
<!-- 内容首页 -->
<h1>博文展示</h1>

{volist name='Gdate' id='blog'}
<div class="media">
  <div class="media-left">
    <a href="{$blog->burl}">
      <img style='width:100px;' class="media-object" src="{$blog->img}" >
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href='{$blog->burl}'>{$blog->title}</a></h4>
    {$blog->brief}...作者: <a href="{$blog->token->hurl|default=''}">{$blog->token->nickname|default='管理员发布'}</a>
  </div>
</div>
{/volist}
{$Gdate|raw}

{/block}

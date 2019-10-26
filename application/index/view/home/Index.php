{extend name='basis/basis'}

{block name='content'}
<!-- 内容首页 -->

<div class="jumbotron">
  <h1>{$blogUser->nickname}的个人博客</h1>
</div>

<h1>我的博文</h1>

{volist name='NewDate' id='cDate'}
<div class="media">
  <div class="media-left">
    <a href="{$cDate->burl}">
      <img style='width:100px;' class="media-object" src="{$cDate->img}" >
    </a>
  </div>
  <div class="media-body">
    <h4 class="media-heading"><a href='{$cDate->burl}'>{$cDate->title}</a></h4>
    {$cDate->brief}...作者: <a href='{$blogUser->Hurl}'>{$cDate->token->nickname|default='管理员发布'}</a>
  </div>
</div>
{/volist}
{$NewDate|raw}

{/block}
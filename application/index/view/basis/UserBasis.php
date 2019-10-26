<div class="col-md-3">
	<div class="list-group">
		<a class="list-group-item active">
		用户信息
		</a>
		<a href="{:url('index/usercenter/add',['id'=>$uid->id])}" class="list-group-item">用户资料</a>
	</div>
	<div class="list-group">
		<a class="list-group-item active">
		博客管理
		</a>
		<a href="{:url('index/UserBlog/home')}" class="list-group-item">用户博客</a>
		<a href="{:url('index/UserBlog/add')}" class="list-group-item">发布博客</a>
	</div>
</div>
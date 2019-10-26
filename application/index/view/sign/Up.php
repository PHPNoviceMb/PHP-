{extend name='basis/basis'}

{block name='page'}
<!-- 用户模板 -->
<h1>注册</h1>
<script>
  //定义开始使用jQuery
  $(document).ready(function(){
      //获取表单
      var user = $('#user');
      var nickname = $('#nickname');
      var phone = $('#phone');
      var email = $('#email');
      var pwd = $('#password');
      var pwd2 = $('#password2');
      var sign = $('#sign');

      //定义变量，接收表单事件的值
      var user_btn = false;
      var nickname_btn = false;
      var phone_btn = false;
      var email_btn = false;
      var pwd_btn = false;
      var pwd2_btn = false;

   //表单事件   
  user.blur(function(){

    //事件触发后的输出
    var UserText = $(this).val();

    if(UserText.length<1){

      $('.UserDate').html('用户不能为空');

      user_btn = false;

    }else{

       $('.UserDate').html('');

       //验证用户是否已存在
       $.ajax({
        url:'{:url("index/sign/check")}',
        type:'post',
        dataType:'json',
        data:{
          'user':UserText
        },
        success:function(data){

          if(data == 1){

             $('.UserDate').html('用户已存在');
          }else{

             $('.UserDate').html('');
             user_btn = true;
          }
        
        },

       })

    }
  })

  nickname.blur(function(){

    var NickText = $(this).val();

    if(NickText.length<1){

      $('.NickDate').html('昵称不能为空');

       nickname_btn = false;
    }else{

       $('.NickDate').html('');

       //验证昵称是否已存在
       $.ajax({
        url:'{:url("index/sign/check_nickname")}',
        type:'post',
        dataType:'json',
        data:{
          'nickname':NickText
        },
        success:function(data2){

          if(data2 == 1){

             $('.NickDate').html('昵称已存在');
          }else{

             $('.NickDate').html('');
             nickname_btn = true;
          }
        
        },

       })
    }
  })

  phone.blur(function(){

    var PhoneText = $(this).val();

    var rex = /^1[3-9]+\d{9}$/;

    if(PhoneText.length<1 || !rex.test(PhoneText)){

      $('.PhoneDate').html('请输入有效的手机号');

      phone_btn = false;

    }else{

       $('.PhoneDate').html('');

       //验证手机是否已存在
       $.ajax({
        url:'{:url("index/sign/check_phone")}',
        type:'post',
        dataType:'json',
        data:{
          'phone':PhoneText
        },
        success:function(data3){

          if(data3 == 1){

             $('.PhoneDate').html('手机已存在');
          }else{

             $('.PhoneDate').html('');
               phone_btn = true;
          }
        
        },

       })

    }
  })

  email.blur(function(){

    var EmailText = $(this).val();

    var rexEmail = /^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

    if(EmailText.length<1 || !rexEmail.test(EmailText)){

      $('.EmailDate').html('请输入有效的邮箱');

      email_btn = false;

    }else{

      //验证邮箱是否已存在
       $.ajax({
        url:'{:url("index/sign/check_email")}',
        type:'post',
        dataType:'json',
        data:{
          'email':EmailText
        },
        success:function(data4){

          if(data4 == 1){

             $('.EmailDate').html('邮箱已存在');
          }else{

             $('.EmailDate').html('');
               email_btn = true;
          }
        
        },

       })

    }
  })

   pwd.blur(function(){

    if($(this).val() == ''){

      $('.PasswordDate').html('密码不能为空');

      pwd_btn = false;

    }else{

       $('.PasswordDate').html('');

       pwd_btn = true;

    }
  })

    pwd2.blur(function(){

     var Pwd2Text = $(this).val();

     if(pwd.val() != Pwd2Text){

      $('.Password2Date').html('密码不符，请重新输入');

      pwd2_btn = false;

     }else{
       $('.Password2Date').html('');

       pwd2_btn = true;
     }

    })

    sign.submit(function(){

      user.trigger('blur');
      nickname.trigger('blur');
      phone.trigger('blur');
      email.trigger('blur');
      pwd.trigger('blur')

      if(user_btn == false || nickname_btn == false || phone_btn == false || email_btn == false || pwd_btn == false || pwd2_btn == false){

        return false;

      }

        return true;    
      
    })
   
  });
</script>
<form action='{:url("index/sign/save")}' method='post' id='sign'>
	{:token()}
	<div>
		<input name='id' type='hidden' value='{$uid->id|default=""}' >
	</div>
  <div class="form-group">
    <label for="exampleInputEmail1">用户名</label>
    <input name='user' type="text" class="form-control" id="user" placeholder="请输入用户名" >
    <span class='UserDate text-danger'></span>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">昵称</label>
    <input name='nickname' type="text" class="form-control" id="nickname" placeholder="请输入管理员昵称">
     <span class='NickDate text-danger'></span>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">手机</label>
    <input name='phone' type="text" class="form-control" id="phone" placeholder="请输入管理员手机" >
     <span class="PhoneDate text-danger" class='PhoneDate'></span>
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">邮箱</label>
    <input name='email' type="email" class="form-control" id="email" placeholder="请输入管理员邮箱">
     <span class='EmailDate text-danger '></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">密码</label>
    <input name="password" type="password" class="form-control" id="password" placeholder="请输入密码">
     <span class='PasswordDate text-danger'></span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">再次输入密码</label>
    <input name="password" type="password" class="form-control" id="password2" placeholder="请再次输入密码，密码必须符合第一次密码">
    <span class='Password2Date text-danger'></span>
  </div>
  <button type="submit" class="btn btn-success pull-right">注册</button>
</form>
{/block}
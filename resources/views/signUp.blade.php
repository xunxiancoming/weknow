<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
	<title>登录</title>
	<script src="./js/jquery-3.1.1.min.js"></script>
	<style>
		*{
			margin: 0;
			padding: 0;
		}
		#mask{
			background-color:#000;
		    opacity:0.5;
		    filter: alpha(opacity=50); 
		    position:absolute; 
		    left:0;
		    top:0; 
		    z-index:9998;
		    display:none;
		}
		#login{ 
		    position:fixed;
		    width:400px;
		    z-index:9999;
		    background-color:#fff;
		    border: 0px solid #000000;
		    border-radius:5px;
		    box-shadow:0 0px 1px #eee;
		    display:none;
		    padding-bottom: 50px;
		}

		#signUp{
			position:fixed;
		    width:400px;
		    z-index:9999;
		    background-color:#fff;
		    border: 0px solid #000000;
		    border-radius:5px;
		    box-shadow:0 0px 1px #eee;
		    display:none;
		    padding-bottom: 50px;
		}

		.loginTitle{
			text-align: center;
			font-family: "微软雅黑";
			font-weight: bold;
			font-size:2rem;
			clear: both;
		}
		.signUpTitle{
			text-align: center;
			font-family: "微软雅黑";
			font-weight: bold;
			font-size:2rem;
			clear: both;
		}
		.close{
			background: none;
			border: 0px;
			float: right;
			margin: 10px 10px 0 0;
			font-size: 30px;
			color: #ccc;	
		}
		.loginCon{
			margin-top: 10px;
		}
		#formLogin{
			width: 80%;
			margin: 0 10%;
		}
		#formLogin input{
			width: 100%;
			margin: 5px 0;
			height:40px;
			line-height: 40px;
			border: 1px solid #ccc;
			border-radius: 5px;
			padding-left: 10px;
			font-size: 1.2rem;
			font-family: 微软雅黑;
		}
		.footerLogin{
			width: 80%;
			margin: 10px 10%;
		}
		.forgotPassword{
			float: left;
		}
		a{
			text-decoration: none;
			color: #fd4e5c;
		}
		.goToSignUp{
			float: right;
		}
		#btnLogin{
			padding: 5px;
			font-size: 1rem;
			font-family: '微软雅黑';
			border: none;
			background: white;
			color: #fd4e5c;
			font-weight: bold;
			margin: 0 auto;
			width: 100%;
		}
		.slogn{
			position: absolute;
			width: 80%;
			text-align: center;
			margin: 0 10%;
			top: 10%;
			font-family: Perpetua;
		}
		.checkname{
			color: red;
			font-size: 0.6rem;
		}
		.checkmail{
			color: red;
			font-size: 0.6rem;
		}
		.checkpassword{
			color: red;
			font-size: 0.6rem;
		}
		.checkpascon{
			color: red;
			font-size: 0.6rem;
		}
		.checkloginemail{
			color: red;
			font-size: 0.6rem;
		}
	</style>
</head>
<body>
	<div class="wrapper">
		
		<p class="slogn">TO THE WORLD YOU MAY BE JUST ONE PERSON.TO THE PERSON YOU MAY BE THE WORLD.</p>
		<img src="images/earth.jpg" alt="" width="90%" style="margin: 40% 5% 2% 5%;display:block;border-radius: 10px">
		<div id="mask"></div>
		<div id="login">
			<button type="button" class="close">&times;</button>
			<div class="loginTitle">登录</div>
			<div class="loginCon">
				<form action="signin" method="post" id="formLogin">
					{{csrf_field()}}
					<input type="text" name="loginemail" id='loginemail' placeholder="输入邮箱">
					<p class="checkloginemail"></p>
					<input type="password" name="loginpassword" id="loginpassword" placeholder="密码">
					<input type="submit" value="登录" style="background: #fd4e5c;color: white;">
				</form>
			</div>
			<div class="footerLogin">
				<p class="forgotPassword"><a href="#" >忘记密码>></a></p>
				<p class="goToSignUp">还没账号？<a href="#" id="goToSignUp">点此去注册>></a></p>
			</div>
		</div>

		<div id="signUp">
			<button type="button" class="close">&times;</button>
			<div class="signUpTitle">注册</div>
			<div class="signUp">
				<form action="/sign" method="post" id="formLogin" onsubmit="return formcheck()">
					{{csrf_field()}}
					<input type="text" name="name" id="name" placeholder="用户名" value="{{old('name')}}">
					<p class="checkname"></p>
					<input type="text" name="mail" id="mail" placeholder="输入邮箱" value="{{old('mail')}}">
					<p class="checkmail"></p>
					<input type="password" name="password" id="password" placeholder="密码" value="{{old('password')}}">
					<p class="checkpassword"></p>
					<input type="password" name="password_confirmation" id="password_confirmation" placeholder="验证密码" value="{{old('password_confirmation')}}">
					<p class="checkpascon"></p>
					<input type="submit" value="注册" style="background: #fd4e5c;color: white;">
				</form>
			</div>
			<div class="footerLogin">
				<p class="goToSignUp">已有账号，<a href="#" id="goToLogin">点此去登录>></a></p>
			</div>
		</div>
		<div class="nav">
			<button id="btnLogin" type="button" >登录</button>
		</div>

	</div>
	
	<script>
		function openDialog(id,className)
		{
		    var mask = $('#mask');
		    var login = $('#'+id);
		    var sWidth = $(document).outerWidth(true);   //获取窗口文档body的总宽度，包括border和padding
		    var sHeight = $(document).outerHeight(true);   //获取窗口文档body的总高度，包括border和padding
		    var cHeight = $(window).height();                 //获取浏览器窗口的可视区高度
		    var lWidth = login.width();                     //登录框的宽度
		    var lHeight = login.height();                  //登录框的高度
		    var left = (sWidth - lWidth) / 2;              //计算登录框的left值：等于总宽度减去登录框宽度再除以2
		    var top = (cHeight - lHeight) / 2;             //计算登录框的top值：等于可视区高度减去登录框高度再除以2
		    mask.css({
		        'display': 'block',
		        'width': sWidth + 'px',
		        'height': sHeight + 'px'
		    });
		    login.css({
		        'display': 'block',
		        'top': top + 'px',
		        'left': left + 'px'
		    });          //添加动画类

		    $('.' + className).click(function () {  
		        close();
		    });
		    mask.click(function () {
		        close();
		    });

		    //隐藏遮罩层和登录框
		    function close() {
		        mask.css('display', 'none');
		        login.css('display', 'none');
		    }
		    return false;
		}

		$('#btnLogin').click(function () {
		    openDialog('login', 'close');
		    return false;
		});
		$("#goToSignUp").click(function(){
			
			$("#login").attr('style','display:none');
			openDialog('signUp','close');
			return false;
		});

		$("#goToLogin").click(function(){
			$("#signUp").attr('style','display:none');
			$("#login").attr('style','display:block');
			openDialog('login','close');
			return false;
		});

		function check(inputname,cname){
			$("#"+inputname).blur(function(){
				$.ajaxSetup({
					headers:{
						'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
					}
				});
				var data = {
					[inputname]:$("#"+inputname).val()
				};
				$.ajax({
					url:'check'+inputname,
					data:data,
					type:'post',
					success:function(data){
						$(".check"+inputname).html("<span style='color:green'>"+cname+"</span>");
					},
					error:function(data){
						$(".check"+inputname).html("*"+data.responseJSON.errors[inputname][0]);
						return false;
					}
				})
			})
		};

		check('name','*该用户名可以注册');
		check('mail','*该邮箱未注册');
		check('password','*密码可以使用');

		$("input[name='password_confirmation']").keyup(function(){
			password = $("#password").val(),
			password_confirmation = $("input[name='password_confirmation']").val()
			if(password_confirmation==""){
				$(".checkpascon").html('*请再次输入密码');
				return false;
			}
			if(password_confirmation!=password){
				$('.checkpascon').html('*两次密码不一致');
				return false;
			}else{
				$('.checkpascon').html('<span style="color:green">*验证通过</span>');
				return true;
			}
		});

		function formcheck(){
			if($("#name").val()==""){
				$(".checkname").html("*请填写用户名");
				return false;
			}
			if($("#mail").val()==""){
				$(".checkmail").html("*请填写邮箱");
				return false;
			}
			if($("#password").val()==""){
				$(".checkpassword").html("*请输入密码");
				return false;
			}
			if($("#password_confirmation").val()==""){
				$(".checkpascon").html("*请再次输入密码");
				return false;
			}
			if($("#password").val()!=$("#password_confirmation").val()){
				$(".checkpascon").html("*两次密码不一致");
				return false;
			}
		}

		$("#loginemail").blur(function(){
			$.ajaxSetup({
				headers:{
					'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
				}
			});
			var data = {
				'loginemail':$("#loginemail").val()
			};
			$.ajax({
				url:'loginemail',
				data:data,
				type:'post',
				success:function(data){
					$(".checkloginemail").html(data);
				},
				error:function(data){
					$(".checkloginemail").html(data);
				}
			})
		});


	</script>					
</body>
</html>
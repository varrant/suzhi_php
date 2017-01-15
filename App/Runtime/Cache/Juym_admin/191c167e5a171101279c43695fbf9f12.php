<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>管理系统</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="alternate icon" type="image/png" href="/Public/assets/i/favicon.png">
    <link rel="stylesheet" type="text/css" href="/Public/layer/skin/layer.css">
    <link rel="stylesheet" href="/Public/assets/css/amazeui.min.css" />
    <link rel="stylesheet" type="text/css" href="/Public/mycss/my.css">
    <script type="text/javascript" src="/Public/assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="/Public/layer/layer.js"></script>
   
    <style>

    body{
		background:url(/Public/image/login.jpg) top center no-repeat; background-size:cover;



    }
    .header {
        text-align: center;
    }
    
    .header h1 {
        font-size: 200%;
        color: #333;
        margin-top: 30px;
    }
    
    .header p {
        font-size: 14px;
    }
    </style>
</head>

<body>
<div class="logo">
	<div class="logobox">
		<div class="logo_title" >
			<span>管理系统</span>
		</div>
		<form method="post" id="form_a" action="<?php echo U('Login/doLogin');?>">
			<div class="user" >
			<div class="i_user  "><i class="am-icon-user am-icon-fw am-icon-sm" style="display:block" ></i></div>
			<div style="float:left"><input class="input_user"  type="text" id="username" name="username" placeholder="  用户名"></div>

			</div>
			<div class="lock" >
			<div class="i_user  "><i class="am-icon-lock am-icon-fw am-icon-sm" style="display:block" ></i></div>
			<div style="float:left"><input class="input_user"  type="password" name="password"  id="password" placeholder="  密码"></div>

			</div>

			<!--<div class="lock" >-->
			<!--<div class="i_user" ><i class="am-icon-code am-icon-fw am-icon-sm" style="display:block" ></i></div>-->
			<!--<div style="float:left ;padding-left:4px;" ><input class="input_code"  type="text" name="code" id="code" placeholder="  验证码">-->
			<!--</div>-->
			<!--<div class="div_code">-->
			<!--<img src="<?php echo U("login/code");?>" class="code" >-->
			<!--</div>-->
			<!--<div class="a_code"><a style="font-size:10px" href="">看不清，换一张</a></div>-->
			<!--</div>-->

			<div class="jzw" >
			<div class="" style="font-size: 8px;"> <i style="float: left;"><!-- <input  id="remember-me" name="checkbox"  minlength="3" type="checkbox"></i><span style="float:left;">记住密码</spa> --></div>

			</div>
			<div class="jzw" >
			<button style="width:250px; margin-left:25px;background-color:#F76E42; margin-top:20px" type="submit" type="button" id="button" class="am-btn am-btn-warning am-round">提交</button>

			</div>
		</form>
	</div>
	<div class="logobg">
	</div>
</div>
   
</body>
<script type="text/javascript" src="/Public/myjs/my.js"></script>
</html>
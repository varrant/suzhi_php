<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js fixed-layout">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VIPETA宠物健康管理系统</title>
  <script type="text/javascript" src="/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/layer/layer.js"></script>
  <script src="/Public/uploadifive/jquery.uploadifive.min.js" type="text/javascript"></script>
  <link rel="stylesheet" type="text/css" href="/Public/uploadifive/uploadifive.css">
</head>

<body>
    <form id="ii" action="<?php echo U('Register/re2');?>" method="post" >
          <input  type="text" id="phone"  name="phone">
          <input  type="text" id="code_put" name="code">
          <button id="code" type="button"  >获取验证码</button>
          <button id="queren" type="button">确定</button>
    </form>
</body>
<script type="text/javascript">
/**/
$(document).ready(function(){ 
　　/*获取手机验证码*/
	$("#code").click(function(){
		var phone=$('#phone').val();
		var url="<?php echo U('Register/Sensms');?>"
		if(phone==""){
			alert('请输入手机号码');
			return false
		}else{
			  $.ajax({
		        type:"post",
		        url:url,
		        data:{'phone':phone},
		        dataType:"json",
		        success:function(data){
		        	if(data=="Sensmsok")
		        	alert('发送成功');
		        	return false;
             	}

            });
		}	
	})
	/*注册认证*/
	$("#queren").click(function(){
		var phone=$('#phone').val();
		var code_put =$('#code_put').val();
		var url="<?php echo U('Register/Verif');?>"
		if(phone==""){
			alert('请输入手机号码');
			return false;
		}
		if(phone=="sjyzc"){
			alert('该手机号码已经注册 ');
			return false;
		}
		if(code_put==""){
			alert('请输入验证码');
			return false;
		}

		$.ajax({
		        type:"post",
		        url:url,
		        data:{'phone':phone,"code":code_put},
		        dataType:"json",
		        success:function(data){
		        	if(data=="ok"){
		        		$('#ii').submit();
		        		
		        		 return false;
		        	}
		        	
		        	if(data=="no"){

		        		alert('验证码或手机号码错误');
		        		return false;
		        	}	
		        	if(data=="ophoneno"){
		        		alert('该手机已经绑定');
		        		return false;
		        	}

             	}

        });
	})

	
}); 	

</script>
<html>
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


<style type="text/css">
</style>

<body>
    <form  id="form_1" action="<?php echo U('Register/dore3');?>" method="post">
          <input type="hidden" name="Hephone" value="<?php echo ($data['Hephone']); ?>">
          <input type="hidden" name="HeName" value="<?php echo ($data['HeName']); ?>">
          <input type="hidden" name="Heidimg" value="<?php echo ($data['Heidimg']); ?>">
          <input type="hidden" name="Hecardid" value="<?php echo ($data['Hecardid']); ?>">
          <input type="hidden" name="Henickname" value="<?php echo ($data['Henickname']); ?>">
          <input type="hidden" name="Hesex" value="<?php echo ($data['Hesex']); ?>">
          <input type="hidden" name="Hebirthday" value="<?php echo ($data['Hebirthday']); ?>">
          <input type="hidden" name="Heoccupation" value="<?php echo ($data['Heoccupation']); ?>">
          <input type="hidden" name="Heeducation" value="<?php echo ($data['Heeducation']); ?>">
          <input type="hidden" name="Heshcool" value="<?php echo ($data['Heshcool']); ?>">
          <input type="hidden" name="Hetype" value="1">
          <input type="hidden" name="Hegrade" value="<?php echo ($data['Hegrade']); ?>">
          <button id="Sub" type="button"   >确定 模拟支撑成功按钮</button>
    </form>
</body>
<script type="text/javascript">
/**/
$(document).ready(function(){ 
	/*提交手机号码身份证图片*/
	$("#Sub").click(function(){
	  $("#Sub").attr('disabled',true)
		var data=$("#form_1").serialize();
		var url=$("#form_1").attr('action');
		$.ajax({
		        type:"post",
		        url:url,
		        data:data,
		        dataType:"json",
		        success:function(data){
		        	console.log(data);
		        	if(data=='1'){
		        		  alert('注册成功');
                 
                   window.location.href="<?php echo U('Login/index');?>";
                  return false; 
		        	}
              if(data=='0'){
                 alert('注册失败');
                  window.location.href="<?php echo U('Register/re');?>";
                  return false; 
              }
            }
    });

	})

}); 	

</script>
<html>
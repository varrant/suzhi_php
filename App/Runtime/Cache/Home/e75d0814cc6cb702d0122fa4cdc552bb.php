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
    <form  id="form_1" action="<?php echo U('Register/Alipay');?>" method="post">
   			 	<input  type="hidden" value="<?php echo ($id); ?>"  name="id">
          <input  type="hidden" value="<?php echo ($data['phone']); ?>"  name="Hephone">
          <input  type="hidden" value="<?php echo ($data['HeName']); ?>"  name="HeName">
          <input  type="hidden" value="<?php echo ($data['Hecardid']); ?>"  name="Hecardid">
          <input  type="hidden" value="<?php echo ($data['img'][0]); ?>"  name="Heidimg">
          昵称<input  type="text" id="HeName"  name="Henickname">
          性别 <select name="Hesex">
                  <option value="0" selected="">男</option>
                  <option value="1" selected="">女</option>
                </select>
           生日<input type="text" name="Hebirthday">
           职业<input type="text" name="Heoccupation">
           学历<select name="Heeducation">
                  <option value="1" selected="">博士</option>
                  <option value="2" selected="">研究生</option>
                  <option value="3" selected="">本科</option>
                  <option value="4" selected="">专科</option>
                  <option value="5" selected="">高中</option>
                  <option value="6" selected="">小学</option>
                </select>
              学校<input type="text" name="Heshcool">
              专业<input type="text" name="Hetype">
              年级<select name="Hegrade">
                  <option value="1" selected="">博士</option>
                  <option value="2" selected="">研究生</option>
                  <option value="3" selected="">本科</option>
                  <option value="4" selected="">专科</option>
                  <option value="5" selected="">高中</option>
                  <option value="6" selected="">小学</option>
                </select>
          <button id="Sub" type="button"   >确定</button>
    </form>
</body>
<script type="text/javascript">
/**/
$(document).ready(function(){ 
	/*提交手机号码身份证图片*/
	$("#Sub").click(function(){
    $("#form_1").submit();
	 });
}); 	

</script>
<html>
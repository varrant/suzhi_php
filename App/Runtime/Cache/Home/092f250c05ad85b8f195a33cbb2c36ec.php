<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>任务详情已领取</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="stylesheet" href="/Public/home/assets/css/amazeui.css">
  <link rel="stylesheet" href="/Public/home/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="/Public/home/css/style.css">
  <link rel="stylesheet" href="/Public/home/css/common.css">
  <script src="/Public/home/assets/js/jquery.min.js"></script>
  <script src="/Public/home/assets/js/amazeui.min.js"></script>
  <script src="/Public/home/js/function.js"></script>
</head>
<body style="">
	<div class="main" style="padding-bottom:60px;">
		<img src="/Public/home/images/background.png" class="background">
		<div class="code_title">
			<h3 class=""><?php echo ($data['pos_name']); ?></h3>
			<ul class="title_list">
				<li><h3>薪资待遇</h3><?php echo ($data['pos_salary']); ?></li>
				<li><h3>福利待遇</h3><?php echo ($data['pos_welfarebenefits']); ?></li>
			</ul>
		</div>
	</div>
	<!--二维码-->
	<div class="code_view">
		<div class="code_img" style="width: 150px;">
            <img src="<?php echo ($codelink); ?>" width="152px" height="152px" />
            <p>长按识别 一起速职</p></div>
	</div>
</body>
</html>
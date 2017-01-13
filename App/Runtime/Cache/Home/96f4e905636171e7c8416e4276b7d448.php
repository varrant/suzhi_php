<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>任务</title>
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
  <script src="/Public/home/js/TouchSlide.1.1.js"></script>
</head>
<body style="background:#eee;">
	<div class="main" style="padding-bottom:50px;">
		<div class="index_list" style="margin-top:0px;">
			<div class="tast_hd">
				<ul>
					<li><a onclick="fclick(1)">兼职</a></li>
					<li><a onclick="fclick(2)">实习</a></li>
					<li><a onclick="fclick(3)">全职</a></li>
				</ul>
			</div>
			
		
			<div class="list_li">
				<ul>
					<li><a href="tast_detail.html">
						<div class="list_img"><img src="images/alipay3.png" width="100%" /></div>
						<div class="list_word">
							<h3><span class="full">全职</span>物流教练员<span class="price">300元</span></h3>
							<p>此处填写工作简单介绍</p>
							<div class="list_num">
								<span>需求：10人</span>
								<div class="list_view">
									<span><img src="images/taskico1.png" />99</span>
									<span><img src="images/taskico2.png" />99999</span>
								</div>
							</div>
						</div></a>
					</li>
					<li><a href="tast_detail.html">
						<div class="list_img"><img src="images/alipay3.png" width="100%" /></div>
						<div class="list_word">
							<h3><span class="part">兼职</span>物流教练员<span class="price">300元</span></h3>
							<p>此处填写工作简单介绍</p>
							<div class="list_num">
								<span>需求：10人</span>
								<div class="list_view">
									<span><img src="images/taskico1.png" />99</span>
									<span><img src="images/taskico2.png" />99999</span>
								</div>
							</div>
						</div></a>
					</li>
					<li><a href="tast_detail.html">
						<div class="list_img"><img src="images/alipay3.png" width="100%" /></div>
						<div class="list_word">
							<h3><span class="fieldwork">实习</span>物流教练员<span class="price">300元</span></h3>
							<p>此处填写工作简单介绍</p>
							<div class="list_num">
								<span>需求：10人</span>
								<div class="list_view">
									<a><img src="images/taskico1.png" />99</a>
									<a><img src="images/taskico2.png" />99999</a>
								</div>
							</div>
						</div></a>
					</li>
				</ul>
			</div>
		</div>
		<!--加载-->
		<div id="view" style="display:none;">
			<a href="javascript:void(0);" />查看更多</a>
		</div>
	</div>
</body>
</html>
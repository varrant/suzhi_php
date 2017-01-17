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
<body style="background:#eee;">
	<div class="main" style="padding-bottom:60px;">
		<div class="mission_top">
			<div class="top_head">
				<div style="overflow:hidden;">
					<h3><?php echo ($data['pos_name']); ?>
						<?php if($data['pos_task_type'] == 1){?>
						<span>兼职</span>
						<?php }elseif($data['pos_task_type'] == 2){?>
						<span>实习</span>
						<?php }else{?>
						<span>全职</span>
						<?php }?>
					</h3>
					<span style=" color: #ff8903;"><?php echo ($data['pos_brokerage']); ?></span>
				</div>
				<div class="t_adress" style="overflow:hidden;">
					<h1>地点：<?php
 $where['pos_id']=$data['pos_county']; $db=M('pos'); $res=$db->where($where)->find(); echo $res['pos_name']; ?></h1>
					<div class="list_view">
						<span><img src="/Public/home/images/taskico2.png" /><?php echo ($data['total_liulan']); ?></span>
						<span><img src="/Public/home/images/taskico1.png" /><?php echo ($data['total_toudi']); ?></span>
					</div>
				</div>
			</div>
			<div class="top_foot">
				<p>工作时间：<?php echo ($data['pos_worktime']); ?></p>
				<p>上班时段：<?php echo ($data['pos_hours']); ?></p>
			</div>
		</div>
		<ul class="t_deal">
			<li><h3>薪资待遇</h3><span><?php echo ($data['pos_salary']); ?></span></li>
			<li><h3>招聘人数</h3><span><?php echo ($data['pos_recruitmun']); ?></span></li>
			<li><h3>工作类型</h3><span>
				<?php
 $where['pos_id']=$data['pos_joptype']; $db=M('pos'); $res=$db->where($where)->find(); echo $res['pos_name']; ?>
			</span></li>
		</ul>
		<div class="detail_list">
			<ul>
				<li>
					<h3>工作描述<img src="/Public/home/images/icon_6.png" width="12" class="" /></h3>
					<div class="slide_main" style="display:block;">
						<ul>
							<li><?php echo ($data['pos_jobdescription']); ?></li>

						</ul>
					</div>
				</li>
				<li>
					<h3>职责要求<img src="/Public/home/images/icon_5.png" width="12" class="on" /></h3>
					<div class="slide_main">
						<ul>
							<li><?php echo ($data['pos_responsibilities']); ?></li>

						</ul>
					</div>
				</li>
				<li>
					<h3>福利待遇<img src="/Public/home/images/icon_5.png" width="12" class="on" /></h3>
					<div class="slide_main">
						<ul>
							<li><?php echo ($data['pos_welfarebenefits']); ?></li>

						</ul>
					</div>
				</li>
			</ul>
		</div>
		<!--公司介绍-->
		<div class="csompany_introduction">
			<input type="hidden" id="ord_id" value="<?php echo ($data['ord_id']); ?>">

			<div class="csompany_introduction_main">
				
				<div class="csompany_introduction_word">
					<h3>公司名称：<?php echo ($data['pos_company_name']); ?></h3>
					
				</div>
			</div>
			<div class="csompany_introduction_p">
				<h3>详细地址：<?php echo ($data['pos_company_address']); ?></h3>
				
			</div>
		</div>
		<div class="tast_footer">
			<a href="javascript:void(0);" class="customer_service_consulting"><img src="/Public/home/images/icon_4.png" />客服咨询</a>
			<a href="javascript:void(0);" class="receive_task">已报名</a>
		</div>
	</div>
</body>
</html>
<script>
	$(function(){
		$(".detail_list li h3").click(function(){
			if($(this).find("img").hasClass("on")){
				$(this).find("img").attr('src','/Public/home/images/icon_6.png');
				$(this).siblings(".slide_main").slideDown();
				$(this).find("img").removeClass("on");
			}else{
				$(this).find("img").attr('src','/Public/home/images/icon_5.png');
				$(this).siblings(".slide_main").slideUp();
				$(this).find("img").addClass("on");
			}
		});
	})


</script>
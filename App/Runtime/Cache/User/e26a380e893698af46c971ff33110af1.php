<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>首页</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp"/>
  <link rel="stylesheet" href="/Public/home/assets/css/amazeui.css">
  <link rel="stylesheet" href="/Public/home/assets/css/font-awesome.min.css">
  <link rel="stylesheet" href="/Public/home/css/style.css">
  <link rel="stylesheet" href="/Public/home/css/common.css">
	<link rel="stylesheet" type="text/css" href="/Public/home/foot/iconfont.css">
	<link rel="stylesheet" href="/Public/home/css/taskList.css">
  <script src="/Public/home/assets/js/jquery.min.js"></script>
  <script src="/Public/home/assets/js/amazeui.min.js"></script>
  <script src="/Public/home/js/function.js"></script>
  <script src="/Public/home/js/TouchSlide.1.1.js"></script>
</head>
<body style="background:#eee;">
	<div class="main" style="padding-bottom:50px;">
		<div id="banner" class="banner">
			<div class="hd">
				<ul><li class=""></li><li class=""></li><li class="on"></li></ul>
			</div>
			<div class="bd">
				<ul>
					<?php if(is_array($data)): foreach($data as $key=>$v): ?><li><a href="<?php echo ($v['rl_link']); ?>"><img src="<?php echo ($v['rl_image']); ?>" width="100%" /></a></li><?php endforeach; endif; ?>
				</ul>
			</div>
		</div>
		<div class="index_nav">
			<ul>
				<li><a href="<?php echo U('task/lists',array('pos_task_type'=>1));?>"><img src="/Public/home/images/group-15.png" width="40" /><h3>兼职</h3></a></li>
				<li><a href="<?php echo U('task/lists',array('pos_task_type'=>2));?>"><img src="/Public/home/images/group-16.png" width="40" /><h3>实习</h3></a></li>
				<li><a href="<?php echo U('task/lists',array('pos_task_type'=>3));?>"><img src="/Public/home/images/group-17.png" width="40" /><h3>全职</h3></a></li>
			</ul>
		</div>
		<div class="index_list">
			<div class="list_top">
				<h3>你可能感兴趣的</h3>
				<a href="<?php echo U('task/lists');?>">更多<img src="/Public/home/images/icon_3.png" /></a>
			</div>
			<div class="list_li">
				<ul>
					<?php if(is_array($res)): foreach($res as $key=>$v): ?><li><a href="<?php echo U('task/details',array('pos_id'=>$v['pos_id']));?>">
							<div class="list_img"><img src="<?php echo ($v['pos_img']); ?>" width="100%" /></div>
							<div class="list_word">
								<h3>
									<?php if($v['pos_task_type'] == 1){?>
									<span class="part">兼职</span>
									<?php }elseif($v['pos_task_type'] == 2){?>
									<span class="fieldwork">实习</span>
									<?php }else{?>
									<span class="full">全职</span>
									<?php }?>
									<?php echo ($v['pos_name']); ?><span class="price"><?php echo ($v['pos_salary']); ?>元</span></h3>
								<p></p>
								<div class="list_num">
									<span>需求：<?php echo ($v['pos_recruitmun']); ?>人</span>
									<div class="list_view">
										<span><img src="/Public/home/images/taskico1.png" /><?php echo ($v['total_toudi']); ?></span>
										<span><img src="/Public/home/images/taskico2.png" /><?php echo ($v['total_liulan']); ?></span>
									</div>
								</div>
							</div></a>
						</li><?php endforeach; endif; ?>
				</ul>
			</div>
			<footer class="nav_bottom am-topbar am-topbar-inverse am-topbar-fixed-bottom">
				<ul>
					<li class="on" onclick="window.location.href='/index.php?m=user&c=index&a=index'">
						<div class="img"><i class="iconfont icon-shouyeshouye"></i></div>
						<div class="title">首页</div>
					</li>
					<li onclick="window.location.href='/index.php?m=user&c=task&a=lists'">
						<div class="img"><i class="iconfont icon-renwu"></i></div>
						<div class="title">任务</div>
					</li>
					<li onclick="window.location.href='/index.php?m=user&c=User&a=index'">
						<div class="img"><i class="iconfont icon-wode"></i></div>
						<div class="title">我的</div>
					</li>
				</ul>
			</footer>
		</div>
	</div>
</body>
</html>
<script type="text/javascript">
	TouchSlide({ 
		slideCell:"#banner",
		titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
		mainCell:".bd ul", 
		effect:"leftLoop", 
		autoPlay:true,//自动播放
		autoPage:true, //自动分页
		switchLoad:"_src" //切换加载，真实图片路径为"_src" 
	});
</script>
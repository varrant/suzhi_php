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
	<link rel="stylesheet" type="text/css" href="/Public/home/foot/iconfont.css">
	<link rel="stylesheet" href="/Public/home/css/taskList.css">
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
					<li ><a onclick="flclicks(1)" id="jz" class="on">兼职</a></li>
					<li><a onclick="flclicks(2)" id="sx">实习</a></li>
					<li><a onclick="flclicks(3)" id="qz">全职</a></li>
				</ul>
			</div>
			
		
			<div class="list_li">
				<input type="hidden" id="type" value="">
				<input type="hidden" id="page" name="page" value="2">
				<ul id="good_ul">
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
				<!--<input type="button" onclick="jjclicks()" value="查看更多">-->
			</div>
			<footer class="nav_bottom am-topbar am-topbar-inverse am-topbar-fixed-bottom">
				<ul>
					<li  onclick="window.location.href='/index.php?m=user&c=index&a=index'">
						<div class="img"><i class="iconfont icon-shouyeshouye"></i></div>
						<div class="title">首页</div>
					</li>
					<li class="on" onclick="window.location.href='/index.php?m=user&c=task&a=lists'">
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

	function jjclicks(){
		//获取是否传递参数
		var id=$('#type').val();
		//获取页数
		var page=$('#page').val();
		var pos_task_type = id;

		var data={'fhtype':'json','pos_task_type':pos_task_type,'page':page};
		$.ajax({
			type: "post",
			url:"<?php echo U('task/lists');?>",
			data: data,
			dataType: "json",
			success: function(data){
				if(data.data.length > 0){
					var ghtml='';
					var shtml='';
					$.each(data.data,function(index,item){
						if(item['pos_task_type'] == 1){
							shtml ="<span class='part'>兼职</span>";
						}else if(item['pos_task_type'] == 2){
							shtml ="<span class='fieldwork'>实习</span>";
						}else{
							shtml ="<span class='full'>全职</span>";
						}
						ghtml +="<li><a href=\"/index.php/user/task/details?pos_id="+item['pos_id']+"\"><div class='list_img'><img src="+item['pos_img']+" width='100%' /></div><div class='list_word'><h3>"+shtml+""+item['pos_name']+"<span class='price'>"+item['pos_salary']+"元</span></h3><p></p><div class='list_num'><span>需求："+item['pos_recruitmun']+"人</span><div class='list_view'><span><img src='/Public/home/images/taskico1.png' />"+item['total_toudi']+"</span><span><img src='/Public/home/images/taskico2.png' />"+item['total_liulan']+"</span></div></div></div></a></li>";

					});

					if(page >1){
						$("#good_ul").append(ghtml);
					}else{
						$("#good_ul").html(ghtml);
					}
						var page1=parseInt(page)+1;
						$('#page').val(page1);

				}else{
					//暂无数据 页面没写
				}
			}
		});

	}
	function flclicks(id){
		if(id == 1){
			$('#jz').addClass('on');
			$('#sx').removeClass('on');
			$('#qz').removeClass('on');
		}else if(id == 2){
			$('#jz').removeClass('on');
			$('#sx').addClass('on');
			$('#qz').removeClass('on');
		}else{
			$('#jz').removeClass('on');
			$('#sx').removeClass('on');
			$('#qz').addClass('on');
		}

		//赋值
		$('#type').val(id);
		//将页数赋值为1
		$('#page').val(2);
		var pos_task_type = id;
		var data={'fhtype':'json','pos_task_type':pos_task_type};
		$.ajax({
			type: "post",
			url:"<?php echo U('task/lists');?>",
			data: data,
			dataType: "json",
			success: function(data){
				if(data.data.length > 0){
					var ghtml='';
					var shtml='';
					$.each(data.data,function(index,item){
						if(item['pos_task_type'] == 1){
							shtml ="<span class='part'>兼职</span>";
						}else if(item['pos_task_type'] == 2){
							shtml ="<span class='fieldwork'>实习</span>";
						}else{
							shtml ="<span class='full'>全职</span>";
						}
						ghtml +="<li><a href=\"/index.php/user/task/details?pos_id="+item['pos_id']+"\"><div class='list_img'><img src="+item['pos_img']+" width='100%' /></div><div class='list_word'><h3>"+shtml+""+item['pos_name']+"<span class='price'>"+item['pos_salary']+"元</span></h3><p></p><div class='list_num'><span>需求："+item['pos_recruitmun']+"人</span><div class='list_view'><span><img src='/Public/home/images/taskico1.png' />"+item['total_toudi']+"</span><span><img src='/Public/home/images/taskico2.png' />"+item['total_liulan']+"</span></div></div></div></a></li>";

					});
						$("#good_ul").html(ghtml);
				}else{
					//暂无数据 页面没写
				}
			}
		});

	}






</script>
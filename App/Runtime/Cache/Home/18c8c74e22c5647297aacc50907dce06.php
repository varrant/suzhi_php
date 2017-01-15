<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>订单中心</title>
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
</head>
<body style="background:#eee;">
	<div class="main" style="padding-bottom:50px;">
		<div class="order_center">
			<ul>
				<?php if(count($data) > 0){?>
				<?php if(is_array($data)): foreach($data as $key=>$v): if($v['ord_status'] == 1){?>
				<li>
					<div class="order_center_top">
						<h3><?=$v['ord_create_time']?></h3>
						<span>已领取</span>
					</div>
					<div class="order_center_main">
						<div class="order_center_main_img"><img src="<?=$v['poscha']['pos_img']?>" width="100%" /></div>
						<div class="order_center_main_word">
							<h3><span class="full"><?php if($v['poscha']['pos_task_type'] == 1){?>全职<?php }elseif($v['poscha']['pos_task_type'] == 2){?>实习<?php }else{?>全职<?php }?></span><?=$v['poscha']['pos_name']?></h3>
							<p>地区：<?php
 $where['pos_id']=$v['poscha']['pos_county']; $db=M('pos'); $res=$db->where($where)->find(); echo $res['pos_name']; ?><span>需求：<?=$v['poscha']['pos_recruitmun']?>人</span></p>
						</div>
						<span><?=$v['poscha']['pos_brokerage']?>元</span>
					</div>
					<?php if($v['poscha']['pos_online'] == 0){?>
						<div class="order_center_foot">
							已下架
						</div>
					<?php }else{?>
					<div class="order_center_foot">
						<a href="/index.php/home/task/extend">查看二维码</a>
						<a id="<?=$v['ord_id']?>" onclick="receive_task(this)" >取消任务</a>
					</div>
						<?php }?>
				</li>
				<?php }else{?>
				<li>
					<div class="order_center_top">
						<h3><?=$v['ord_create_time']?></h3>
						<span>已取消</span>
					</div>
					<div class="order_center_main">
						<div class="order_center_main_img"><img src="<?=$v['poscha']['pos_img']?>" width="100%" /></div>
						<div class="order_center_main_word">
							<h3><span class="fieldwork"><?php if($v['poscha']['pos_task_type'] == 1){?>全职<?php }elseif($v['poscha']['pos_task_type'] == 2){?>实习<?php }else{?>全职<?php }?></span><?=$v['poscha']['pos_name']?></h3>
							<p>地区：<?php
 $where['pos_id']=$v['poscha']['pos_county']; $db=M('pos'); $res=$db->where($where)->find(); echo $res['pos_name']; ?><span>需求：<?=$v['poscha']['pos_recruitmun']?>人</span></p>
						</div>
						<span><?=$v['poscha']['pos_brokerage']?>元</span>
					</div>
					<?php if($v['poscha']['pos_online'] == 0){?>
					<div class="order_center_foot">
						已下架
					</div>
					<?php }?>
				</li>
					<?php } endforeach; endif; ?>
				<?php }else{?>
				<div style="text-align:center;color:#666;font-size:14px;"><img src="/Public/home/images/zusj.png" style="height: 100px;width: 100px;margin-top: 50%"><p style="margin:30px 0px;">暂无数据</p><p>快去寻找心仪的职位吧</p></div>
				<?php }?>

			</ul>
		</div>
		<!--弹框-->
		<div class="receive_task_bg" id="receive_task_bg" style="display:none;">
			<div class="receive_task_box">
				<h3>确定取消任务吗？</h3>
				<div class="receive_task_link">
					<input type="hidden" id="ord_id" value="">
					<a href="javascript:cancel()">取消</a>
					<a onclick="queren()">确认</a>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
<script>
	function receive_task(dom){
		$("#receive_task_bg").show();
		//获取订单ID
		var ord_id=dom.id;
		$('#ord_id').val(ord_id);
	}
	function cancel(){
		$("#receive_task_bg").hide();
	}
	function queren() {
		var ord_id=$('#ord_id').val();
		var data={'ord_id':ord_id};
		$.ajax({
			url:"<?php echo U('task/cancle');?>",
			data:data,
			type:'post',
			dataType:"json",
			success:function(data){
//				if(data.status){
//					window.history.go(0);
//				}else{
//					alert(data.message);
//				}
			}
		});
	}
</script>
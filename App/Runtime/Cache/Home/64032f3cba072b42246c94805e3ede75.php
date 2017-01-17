<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>个人中心</title>
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
    </head>
    <body style="background:#eee;">
        <div class="main" style="padding-bottom:50px;">
            <div class="center_top">
                <div class="center_top_head">
                    <a href="<?php echo U('pinfo');?>">
                    <div class="center_img"><img src="/Public/home/images/head1.png" width="100%" /></div>
                    <div class="center_word">
                        <h3><?php echo ($user["he_nickname"]); ?></h3>
                        <p><?php echo ($user["he_phone"]); ?></p>
                    </div>
                    <img src="/Public/home/images/right.png" class="center_top_head_icon" width="14" />
                </a>
                </div>

                <div class="center_top_foot">
                    <h3 class="">余额：<?php echo ($user["he_accounttotal"]); ?>元</h3>
                    <a href="<?php echo U('balance');?>">账户安全保障中 <img src="/Public/home/images/right.png" class="" width="14" /></a>
                </div>
            </div>
            <div class="center_link">
                <ul>
                    <li><a href="<?php echo U('porder');?>"><h3>我的订单<img src="/Public/home/images/icon_3.png" /></h3></a></li>
                    <li><a href="<?php echo U('humres');?>"><h3>我的人才库<img src="/Public/home/images/icon_3.png" /></h3></a></li>
                    <li><a href="<?php echo U('recom');?>"><h3>推荐有奖<img src="/Public/home/images/icon_3.png" /></h3></a></li>
                    <!--<li><a href="javascript:void(0);"><h3>任务意向设置<img src="/Public/home/images/icon_3.png" /></h3></a></li>-->
                    <li><a href="<?php echo U('pexchset');?>"><h3>提现设置<img src="/Public/home/images/icon_3.png" /></h3></a></li>
                    <li><a href="<?php echo U('feedback');?>"><h3>意见反馈<img src="/Public/home/images/icon_3.png" /></h3></a></li>
                </ul>
            </div>
        </div>
		<!--<footer class="nav_bottom am-topbar am-topbar-inverse am-topbar-fixed-bottom">-->
		  <!--<ul>-->
			<!--<li onclick="window.location.href='/index.php?m=home&c=index&a=index'">-->
			  <!--<div class="img"><img src="/Public/home/images/mycenterbottomicon1.png" alt=""></div>-->
			  <!--<div class="title ">首页</div>-->
			<!--</li>-->
			<!--<li onclick="window.location.href='/index.php?m=home&c=task&a=lists'">-->
			  <!--<div class="img"><img src="/Public/home/images/mycenterbottomicon2over.png" alt=""></div>-->
			  <!--<div class="title ">任务</div>-->
			<!--</li>-->
			<!--<li onclick="window.location.href='/index.php?m=Home&c=User&a=index'">-->
			  <!--<div class="img"><img src="/Public/home/images/mycenterbottomicon3.png" alt=""></div>-->
			  <!--<div class="title cur">我的</div>-->
			<!--</li>-->
		  <!--</ul>-->
		<!--</footer>-->
        <footer class="nav_bottom am-topbar am-topbar-inverse am-topbar-fixed-bottom">
            <ul>
                <li  onclick="window.location.href='/index.php?m=home&c=index&a=index'">
                    <div class="img"><i class="iconfont icon-shouyeshouye"></i></div>
                    <div class="title">首页</div>
                </li>
                <li  onclick="window.location.href='/index.php?m=home&c=task&a=lists'">
                    <div class="img"><i class="iconfont icon-renwu"></i></div>
                    <div class="title">任务</div>
                </li>
                <li class="on" onclick="window.location.href='/index.php?m=Home&c=User&a=index'">
                    <div class="img"><i class="iconfont icon-wode"></i></div>
                    <div class="title">我的</div>
                </li>
            </ul>
        </footer>
    </body>
</html>
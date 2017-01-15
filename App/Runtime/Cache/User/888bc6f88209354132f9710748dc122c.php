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
                    <a href="<?php echo U('info');?>">
                        <div class="center_img">
                            <img src="/Public/home/images/head1.png" width="100%"/>
                            <!--<img src="<?php echo ($user["he_image_link"]); ?>" width="100%"/>-->
                        </div>
                        <div class="center_word">
                            <h3><?php echo ($user["he_nickname"]); ?></h3>
                            <p><?php echo ($user["he_phone"]); ?></p>
                        </div>
                        <img src="/Public/home/images/right.png" class="center_top_head_icon" width="14"/>
                    </a>
                </div>
                <div class="center_top_foot" style="background:#eee;">

                </div>
            </div>
            <div class="center_link" style="margin-top:-45px;">
                <ul>
                    <li>
                        <a href="<?php echo U('order');?>">
                            <h3>订单中心
                                <img src="/Public/home/images/icon_3.png"/>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('resume');?>">
                            <h3>我的简历
                                <img src="/Public/home/images/icon_3.png"/>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('bcmhs');?>">
                            <h3>成为猎头
                                <img src="/Public/home/images/icon_3.png"/>
                            </h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo U('feedback');?>">
                            <h3>意见反馈
                                <img src="/Public/home/images/icon_3.png"/>
                            </h3>
                        </a>
                    </li>
                </ul>
            </div>
            <footer class="nav_bottom am-topbar am-topbar-inverse am-topbar-fixed-bottom">
                <ul>
                    <li  onclick="window.location.href='/index.php?m=user&c=index&a=index'">
                        <div class="img"><i class="iconfont icon-shouyeshouye"></i></div>
                        <div class="title">首页</div>
                    </li>
                    <li  onclick="window.location.href='/index.php?m=user&c=task&a=lists'">
                        <div class="img"><i class="iconfont icon-renwu"></i></div>
                        <div class="title">任务</div>
                    </li>
                    <li class="on" onclick="window.location.href='/index.php?m=user&c=User&a=index'">
                        <div class="img"><i class="iconfont icon-wode"></i></div>
                        <div class="title">我的</div>
                    </li>
                </ul>
            </footer>
        </div>
    </body>
</html>
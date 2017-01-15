<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>我的余额</title>
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
    </head>
    <body style="background:#eee;">
        <div class="main" style="padding-bottom:50px;">
            <div class="balance_top">
                <h3>当前余额（元）</h3>
                <p><?php echo ($user["he_accounttotal"]); ?></p>
            </div>
            <a href="<?php echo U('pwthdraw');?>" class="balance_link">提现<img src="/Public/home/images/icon_3.png" /></a>
        </div>
    </body>
</html>
<?php if (!defined('THINK_PATH')) exit();?><!-- 登陆 -->
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>注册成功-猎头</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp"/>
        <link rel="stylesheet" href="/Public/home/assets/css/amazeui.css">
        <link rel="stylesheet" href="/Public/home/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/Public/home/css/style.css">
        <link rel="stylesheet" href="/Public/home/css/login.css">
        <link rel="stylesheet" href="/Public/home/js/uploadifive/uploadifive.css">
        <script src="/Public/home/assets/js/jquery.min.js"></script>
        <script src="/Public/home/assets/js/amazeui.min.js"></script>
        <script src="/Public/home/js/jquery.uploadifive.js"></script>
        <script src="/Public/home/js/function.js"></script>
        <script src="/Public/home/js/date.js"></script>
    </head>
    <body style="background-color: #eeeeee;">


        <div class="reg_banner">
            <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            <br><span>注册成功</span>
        </div>
        <div class="reg_banner2">
            你已成为猎头，快去领取任务，赚佣金吧！
        </div>

        <div style="padding-top: 270px; padding-bottom: 80px;">
            <div class="btn_box">
                <button class="btn_login_over" id="btn_login" onclick="jump();">领取任务</button>
            </div>
        </div>
        <script type="text/javascript">
            function jump(){
                //m=home&c=task&a=lists
                window.location.href = '<?php echo U("Home/Task/lists");?>';
            }
        </script>
    </body>
</html>
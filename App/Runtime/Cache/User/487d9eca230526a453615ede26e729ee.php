<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>成为猎头</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <link rel="stylesheet" href="/Public/home/css/become-headhunters/become-headhunters.css">
    </head>

    <body>
        <div class="become_headhunters">
            <img src="/Public/home/images/becomeheadhunters.png">
            <div class="immediately_become_headhunters">
                <button onClick="becomeheadhunters()">立即成为猎头</button>
            </div>
        </div>
        <script>
            function becomeheadhunters(){
                // 成为猎头链接
                window.location.href="<?php echo U('Home/Register/index');?>";
            }
        </script>
    </body>
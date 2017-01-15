<?php if (!defined('THINK_PATH')) exit();?><html class="no-js"><head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>VIPETA宠物健康检测</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp">
  <link rel="stylesheet" href="/Public/regis/Template.css">
  <link rel="stylesheet" href="/Public/regis/WXactivity.css">
  <link rel="stylesheet" href="/Public/regis/uploadifive.css">
    <link rel="stylesheet" id="css-front-css" href="/Public/regis/pikaday.css" type="text/css" media="all">
  <link rel="stylesheet" href="/Public/regis/bootstrap.min.css">
  <link rel="stylesheet" href="/Public/regis/main.css">
  <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
   <script type="text/javascript" src="/Public/assets/js/jquery.min.js"></script>
  <script type="text/javascript" src="/Public/layer/layer.js"></script>


</head>
<div class="bmindexbox">
                <!-- <img src="/Public/strat/bmindex_top.jpg"> -->
                <img src="/Public/strat/bmindex_top.jpg">
                <div class="bmindexboxleft" onclick="window.location.href='http://www.vipeta.cn/m/index_vipeta.asp'"></div>
                <div class="bmindexboxright" onclick="window.location.href='"></div>
            </div>

<div class="imglist">
<!-- <img src="/Public/regis/bmIndexbanner2.png"><br> -->
<img src="/Public/strat/sho_zf.jpg"><br>
</div>
<body>

<div id="erwm" style=" display:none; z-index:9999; margin-top:20px; margin-left: auto;
    margin-right: auto; width:250px;height:250px;width= 200px"  >
        <div style="font-size:15px; color: #EEE ;line-height: 50px;
    text-align: center;
    margin-bottom: 10px;  ">具体事项请扫二维码咨询客服</div>
            <img style="width:250px;height:250px;" src="http://card.vipeta.cn/public/image/8113.jpg">

        </div>
<div class="box">
    <div style="text-align:center; line-height:40px; height:40px; color:#FFFFFF; font-size:20px; display:none;">
        第一期报名已结束!<br>
        二期活动即将开始<br>
        具体事项先联系微信号：ydxuhua<br>
        <img src="/Public/regis/qcode.jpg" style=" width:50%;">
    </div>
    <div id="step1">
     <form method="post" id="form_a" action="<?php echo U('Login/doLogin');?>"  onsubmit="return check()">
        <ul class="box_item">
            <li>
                <div class="box_item_title">
                账&nbsp;&nbsp;&nbsp;&nbsp;号：
                </div>
                <div class="box_item_value">
                    <input type="text" style="background-color:#384637 !important"  name="username" id="username" placeholder="请输入账号">
                </div>
                <div class="clearbox"></div>
            </li>
            <li>
                <div class="box_item_title">
                密&nbsp;&nbsp;&nbsp;&nbsp;码：
                </div>
                <div class="box_item_value">
                    <input  type="password" style="" id="password" name="password" placeholder="请输入密码" id="WXAPhone">
                </div>
                <div class="clearbox"></div>
            </li>
        <ul class="box_item">
            <li>
                <div class="box_item_title">
                验证码：
                </div>
                <div class="box_item_value">
                    <input type="text" style="width:50%" placeholder="请输入验证码"   name="code" id="code">
                    <div style="position: absolute; color: #ffffff; -moz-border-radius: 3px;
                     -webkit-border-radius: 3px;border-radius: 3px; height: 36px;line-height: 36px; font-size: 14px;width: 104px;text-align: center; right: 10%;
                     top: 9px;"><img src="<?php echo U('login/code');?>"></div>   
                </div>
                <div class="clearbox"></div>
            </li>
        </ul>
        <div class="box_btn" style="margin-top:20px;">
        
            <a href="javascript:void(0)" class="box_btn1" onclick="addaction_click1()">确认登入</a>
        </div>
        </form>
         <div class="box_btn" style="margin-top:20px;">
        
            <a href="<?php echo U('Login/index_c');?>" class="box_btn1" >申请城市合伙人</a>
        </div>
    </div>


<script type="text/javascript" src="/Public/regis/pikaday.min.js"></script>

<script src="/Public/regis/jquery.uploadifiveBM.js"></script>
<script src="/Public/regis/bootstrap.min.js"></script>
<script src="/Public/regis/cropper.min.js"></script>
<script type="text/javascript" src="/Public/myjs/my.js"></script>
<script type="text/javascript">

    function clickHandler(){

        window.location.href="<?php echo U('Login/index_c');?>";
    }


</script>



<div class="pika-single is-hidden is-bound"></div></body></html>
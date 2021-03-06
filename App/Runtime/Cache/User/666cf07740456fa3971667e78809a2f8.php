<?php if (!defined('THINK_PATH')) exit();?><!-- 登陆 -->
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>我的</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp"/>
        <link rel="stylesheet" href="/Public/home/assets/css/amazeui.css">
        <link rel="stylesheet" href="/Public/home/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/Public/home/css/style.css" />
        <link rel="stylesheet" href="/Public/home/css/myCenterInfo.css" />
        <script src="/Public/home/assets/js/jquery.min.js"></script>
        <script src="/Public/home/assets/js/amazeui.min.js"></script>
        <script src="/Public/home/js/function.js"></script>
        <script src="/Public/home/js/date.js"></script>
        <link rel="stylesheet" type="text/css" href="/Public/home/foot/iconfont.css">
        <link rel="stylesheet" href="/Public/home/css/common.css">
    </head>
    <body>
        <div class="mytopbannerbox">
            <div class="info">
                <div class="head">
                    <img src="/Public/home/images/head1.png" alt="">
                </div>
                <div class="infobox">
                    <div class="name"><?php echo ($user["he_nickname"]); ?></div>
                    <div class="phone"><?php echo ($user["he_phone"]); ?></div>
                </div>
                <div class="ico">

                </div>
                <div class="clearbox"></div>
            </div>
        </div>

        <div class="orderlist" style="margin-top: 0px; height: auto;">
            <div class="ipt_box2" style="border-top: 1px solid #d8d8d8;">
                <div class="left">昵称</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_nickname"]); ?>">
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2" style="border-bottom: 0px;">
                <div class="left">手机号</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_phone"]); ?>">
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
        </div>

        <div class="menu_list">
            <div class="ipt_box2">
                <div class="left">姓名</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_name"]); ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2">
                <div class="left">性别</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php if($user["he_sex"] == 1): ?>女<?php else: ?>男<?php endif; ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2">
                <div class="left">生日</div>
                <div class="right">
                    <div class="ipt_value" id="doc-datepicker">
                        <span><?php echo ($user["he_birthday"]); ?></span>
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2">
                <div class="left">职业</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["job"]); ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2">
                <div class="left">学历</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_topdegreee"]); ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2">
                <div class="left">学校</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_shcool"]); ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2">
                <div class="left">专业</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_major"]); ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
            <div class="ipt_box2" style="border-bottom: 0px solid #d8d8d8;">
                <div class="left">年级</div>
                <div class="right">
                    <div class="ipt_value">
                        <input type="text" class="inp_username" placeholder="" value="<?php echo ($user["he_grade"]); ?>">
                        &nbsp;
                        <i class="fa fa-angle-right" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="clearbox"></div>
            </div>
        </div>

        <!--<footer class="nav_bottom am-topbar am-topbar-inverse am-topbar-fixed-bottom">-->
            <!--<ul>-->
                <!--<li>-->
                    <!--<div class="img">-->
                        <!--<img src="/Public/home/images/mycenterbottomicon1over.png" alt="">-->
                    <!--</div>-->
                    <!--<div class="title">首页</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="img">-->
                        <!--<img src="/Public/home/images/mycenterbottomicon2.png" alt="">-->
                    <!--</div>-->
                    <!--<div class="title">任务</div>-->
                <!--</li>-->
                <!--<li>-->
                    <!--<div class="img">-->
                        <!--<img src="/Public/home/images/mycenterbottomicon3.png" alt="">-->
                    <!--</div>-->
                    <!--<div class="title">我的</div>-->
                <!--</li>-->
            <!--</ul>-->
        <!--</footer>-->
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
    </body>
    <script>
        $(function () {
            $('#doc-datepicker').datepicker().
                    on('changeDate.datepicker.amui', function (event) {
                        $("#doc-datepicker").find("span").html(event.date.Format("yyyy-MM-dd"));
                    });
        })
    </script>
</html>
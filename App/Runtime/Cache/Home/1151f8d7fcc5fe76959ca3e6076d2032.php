<?php if (!defined('THINK_PATH')) exit();?><!-- 余额提现 -->
<!doctype html>
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
        <link rel="stylesheet" href="/Public/home/css/myCenterCash.css">
        <script src="/Public/home/assets/js/jquery.min.js"></script>
        <script src="/Public/home/assets/js/amazeui.min.js"></script>
        <script src="/Public/home/js/function.js"></script>
        <script src="/Public/home/js/date.js"></script>
    </head>
    <body>
        <div id="app">
            <div class="mytopbannerbox">
                <div class="info">
                    <div class="name">提现金额</div>
                    <div class="cashbox">
                        <div class="sign">¥</div>
                        <input v-model="mysetModel.csmoney" type="text" id="he_accounttotal" name="he_accounttotal" value="">
                    </div>
                </div>
                <div class="info2">
                    <div id="divallcash">可提现金额<span><?php echo ($user["he_turn_out_jine"]); ?></span>元</div>
                    <div id="whatiscash">冻结金额<?php echo ($user["he_frozen_amount"]); ?>元 &nbsp;<i class="fa fa-question-circle" aria-hidden="true"></i></div>
                    <div class="allcash"></div>
                </div>
            </div>

            <div class="btn_box" style="margin-top: 304px;">
                <button class="btn_login_over" id="btn_login" onclick="login();">提交申请</button>
            </div>

            <!-- 什么是保证金 -->
            <div class="cashbox2">
                <div class="cashbg"></div>
                <div class="contentbox" style=" overflow: auto;">
                    <div class="title">什么是冻结金额</div>
                    <div class="word" style="font-family: "微软雅黑", "黑体""><br />
                        <span>什么是冻结金？</span><br>
                        存在个人猎头账户中，但是暂时不能使用的金额。<br>
                        <br>
                        <span>冻结金从何而来？</span>
                        <br>
                        1、在个人猎头推成功荐入职者未满十人时，保证金处于冻结状态。
                       <br>
                        2、乙方推荐兼职人员处于待开工状态，未完成兼职任务时，任务佣金处于冻结状态存在于个人猎头账户中。兼职完成，冻结金即可提取。
                        <br>
                        3、乙方推荐入职者面试成功，求职者入职，佣金即转入个人猎头账户。
                        <br>
                        1）求职者入职三个工作日内佣金处于冻结状态，入职者三个工作日内离职，则佣金全额取消。
                        <br>
                        2）求职者入职超过三个工作日未满十个工作日，自动离职个人猎头账户中冻结金可提取25%的佣金；入职者被公司辞退，个人猎头账户中冻
                        结金可提取75%。
                        <br>
                        3）求职者入职满十个工作日（且不包含十个工作日），自动离职或被公司辞退，个人猎头可提取账户中的冻结金。
                        *每笔订单将抽取15%服务费。本条款最终解释权归杭州巨光网络科技有限公司所有。
                        <br /><br />
                    </div>
                </div>
                <div class="cashbtn" onclick="closecashbox()">×</div>
            </div>
        </div>
    </body>
    <script>
        //显示什么保证金提示框
        function whatiscash(w,h,st){
            console.log(w);
            $(".cashbox2").attr("style","top:"+st+"px; display:block;");
            $(".cashbg").attr("style","top:"+st+"px;height:"+h+"px;width:"+w+"px");
        }

        function closecashbox(){
            $(".cashbox2").attr("style","display:none;");
        }
        $(function() {
            var $width=$(window).width();
            var $height=$(window).height();
            $("#whatiscash").click(function(){
                whatiscash($width,$height,0);//什么是保证金
            })
            $(window).scroll(function() {
                whatiscash($width,$height,$(this).scrollTop());//什么是保证金
            });

            //可提现金额全部提现
            $(".allcash").click(function(){
                $("#ipt_allcash").val($("#divallcash").find("span").html());
            })
        });

        function login(){
            var num = $('#he_accounttotal').val();//体现金额
            $.post('<?php echo U("Home/User/wthdraw");?>', {he_accounttotal : num}, function (data) {
                alert(data.errmsg);
            }, 'json');

        }

    </script>
</html>
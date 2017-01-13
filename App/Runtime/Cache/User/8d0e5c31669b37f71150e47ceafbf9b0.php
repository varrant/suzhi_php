<?php if (!defined('THINK_PATH')) exit();?><!-- 登陆 -->
<!doctype html>
<html class="no-js">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>注册</title>
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
    <body>
        <div id="app">

            <!-- 填写手机号步骤 -->
            <div class="liststep1" style="display: block;">
                <div class="logo"></div>
                <div class="ipt_box">
                    <input type="text" class="ipt_username" v-model="registerModel.phone" placeholder="请输入需要绑定的手机号">
                </div>
                <div class="ipt_box">
                    <input type="text" class="ipt_username" v-model="registerModel.code" placeholder="请输入验证码">
                    <div class="ipt_sendCode" @click="register($event)">获取验证码</div>
                </div>
                <div class="tipsbox">
                    <div class="ico">
                        <i class="fa fa-circle-o" aria-hidden="true" id="isYes" onclick="checkYes()"></i>
                    </div>
                    <div class="content">我已经阅读并同意速职用户协议</div>
                </div>
                <div class="margin_box180"></div>
                <div class="btn_box">
                    <button class="btn_login_out" id="btn_login" @click="register1">下一步</button>
                </div>
            </div>

            <!-- 上传身份证步骤 -->
            <div class="liststep2" style="display: none;">
                <div style="margin-top: 50px;"></div>
                <div class="ipt_box">
                    <input type="text" class="ipt_username" v-model="registerModel.he_name" placeholder="请输入真实姓名">
                </div>
                <div class="ipt_box">
                    <input type="text" class="ipt_username" v-model="registerModel.he_carid" placeholder="请输入身份证号">
                </div>
                <div class="ipt_box">
                    <div class="listItem">
                        <div class="title">上传证件照</div>
                        <div class="pic">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            <input id="he_idimg" name="he_idimg" type="hidden">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
                        </div>
                    </div>
                    <div class="listItem">
                        <div class="title">上传证件照</div>
                        <div class="pic">
                            <img src="images/reg_eg1.png" alt="">
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box">
                    <div id="queue"></div>
                </div>
                <div style="margin-top: 120px;"></div>
                <div class="btn_box">
                    <button class="btn_login_over" id="btn_login" @click="register2">下一步</button>
                </div>
            </div>

            <!-- 填写个人信息步骤 -->
            <div class="liststep3" style="display: none;">
                <div class="ipt_box2_top">
                    <div class="left">昵称</div>
                    <div class="right">
                        <input type="text" id="he_nickname" v-model="registerModel.he_nickname" class="inp_username" placeholder="可以填写真实姓名">
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2_line"></div>
                <div class="ipt_box2">
                    <div class="left">性别</div>
                    <div class="right">
                        <div class="ipt_value">
                            <input id="he_sex" class="inp_username" disabled="disabled" v-model="registerModel.he_sex" value="">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2">
                    <div class="left">生日</div>
                    <div class="right">
                        <div class="ipt_value" id="doc-datepicker" @click="showtime()">
                            <input id="he_birthday" class="inp_username" disabled="disabled" v-model="registerModel.he_birthday">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2">
                    <div class="left">职业</div>
                    <div class="right">
                        <div class="ipt_value">
                            <input type="text" v-model="registerModel.he_occupation" class="inp_username" placeholder="产品经理">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2">
                    <div class="left">学历</div>
                    <div class="right">
                        <div class="ipt_value" id="xueli" @click="showbox($event)">
                            <input class="inp_username" disabled="disabled" v-model="registerModel.he_education" placeholder="请选择">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2">
                    <div class="left">学校</div>
                    <div class="right">
                        <div class="ipt_value" id="xuexiao">
                            <input type="text" v-model="registerModel.he_school" class="inp_username" placeholder="请填写">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2">
                    <div class="left">专业</div>
                    <div class="right">
                        <div class="ipt_value" id="zhuanye">
                            <input type="text" v-model="registerModel.he_major" class="inp_username" placeholder="请填写">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2 ipt_box2_bottom">
                    <div class="left">年级</div>
                    <div class="right">
                        <div class="ipt_value" id="nianji" @click="showbox($event)">
                            <input class="inp_username" disabled="disabled" v-model="registerModel.he_grade" placeholder="请选择">
                            <i class="fa fa-angle-right" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="clearbox"></div>
                </div>

                <div style="background-color: #d8d8d8; padding-top: 120px; padding-bottom: 50px;">
                    <div class="btn_box">
                        <button class="btn_login_over" id="btn_login" @click="register3">下一步</button>
                    </div>
                </div>
            </div>

            <!-- 交纳保证金步骤 -->
            <div class="liststep4">
                <div class="ipt_box3_top">
                    <div class="left" id="whatiscash">领队保证金&nbsp;&nbsp;
                        <i class="fa fa-question-circle" aria-hidden="true"></i>
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2">
                    <div class="left">保证金额</div>
                    <div class="right">
                        <div class="ipt_value" style="color: #333333;">500元</div>
                        <input type="hidden" class="inp_username" value="500">
                    </div>
                    <div class="clearbox"></div>
                </div>
                <div class="ipt_box2 ipt_box2_bottom">
                    <div class="left" style="color: #999999;">当推荐成功10个人，全额返还（防止刷单现象）</div>
                    <div class="right">
                    </div>
                    <div class="clearbox"></div>
                </div>

                <div style="background-color: #d8d8d8; padding-top: 300px; padding-bottom: 80px;">
                    <div class="btn_box">
                        <button class="btn_login_pay_over" id="btn_login" data-am-modal="{target: '#mypay'}">立即支付</button>
                    </div>
                </div>
            </div>


            <!-- 提示框架 -->
            <div id="rb1" class="remindbox">
                <div class="icon">
                    <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                </div>
                <div class="content"></div>
            </div>
            <!-- 选择对话框 -->
            <div class="am-modal am-modal-no-btn" tabindex="-1" id="your-modal">
                <div class="am-modal-dialog">
                    <div class="am-modal-hd" style="border-bottom: 1px solid #999999;">
                        <span>标题</span>
                        <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
                    </div>
                    <div class="am-modal-bd">
                        内容。
                    </div>
                </div>
            </div>

            <!-- 支付提示方式 -->
            <div class="am-modal-actions" id="mypay">
                <div class="am-modal-actions-group">
                    <ul class="am-list">
                        <li class="am-modal-actions-header">选择支付方式
                            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close="" style="float: right; line-height: 25px; height: 25px; padding: 0px; font-size: 20px;">×</a>
                        </li>
                        <li>
                            <a href="#" style="color: #05cb04;">
                                <span>
                                    <img src="images/wechat1.png" alt="">
                                </span>
                                &nbsp;微信支付
                                <i class="fa fa-angle-right" style="float: right; color: #999999; margin-right: 16px; line-height: 66px;" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" style="color: #01a9ef;">
                                <span>
                                    <img src="images/alipay1.png" alt="">
                                </span>
                                &nbsp;支付宝
                                <i class="fa fa-angle-right" style="float: right; color: #999999; margin-right: 16px; line-height: 66px;" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- 什么是保证金 -->
            <div class="cashbox">
                <div class="cashbg"></div>
                <div class="contentbox">
                    <div class="title">什么是保证金</div>
                    <div class="word">
                        <span>什么是零钱？</span>
                        <br>
                        零钱是用户在云书APP上的资金，支持支付、提现等功能。
                        <br>
                        <br>
                        <span>如何赚取零钱？</span>
                        <br>
                        用户可以通过积分兑换的形式获得零钱。
                        <br>
                        用户可以通过签到、领取免费教材、商城购买、注册、捐书等行为获得的积分，再通过积分兑换将积分兑换成零钱。
                        <br>
                        积分兑换零钱的公式为：100积分=1元零钱。
                        <br>
                        <br>
                        <span>零钱提现</span>
                        <br>
                        若零钱累积到达一定数量，用户可以申请提现。具体积累金额请参见提现页面说明。
                        <br>
                    </div>
                </div>
                <div class="cashbtn" onclick="closecashbox()">×</div>
            </div>
        </div>
    </body>
    <script src="/Public/home/js/vue.js"></script>
    <script>
        function getcode(t) {
            $(t).html("重新发送");
            $("#btn_login").attr("class", "btn_login_over");
            $("#btn_login").html("下一步");
        }
        /*  function login(){
         showRemindbox("手机号格式错误，请重新输入");
         }*/

        function showRemindbox(content) {
            $("#rb1").slideToggle();
            $("#rb1").find(".content").html(content);
            $("#rb1").unbind("click");
            $("#rb1").bind("click", function () {
                $("#rb1").slideToggle();
            })
            setTimeout('hideRemindbox()', 2000);
        }

        function hideRemindbox() {
            console.log($("#rb1").is(":hidden"));
            if (!$("#rb1").is(":hidden")) {
                $("#rb1").slideToggle();
            }
        }

        function checkYes() 
            else {
                $("#isYes").removeClass("fa-circle-o");
                $("#isYes").addClass("fa-check-circle");
                $("#isYes").addClass("fa-check-circleover");
                //同意协议此处应该返回TRUE
            }
        }

        //显示什么保证金提示框
        function whatiscash(w, h, st) {
            $(".cashbox").attr("style", "top:" + st + "px; display:block;");
            $(".cashbg").attr("style", "top:" + st + "px;height:" + h + "px;width:" + w + "px");
        }

        function closecashbox() {
            $(".cashbox").attr("style", "display:none;");
        }

        function showbox2($yourmodal, $ammodaldialog, $height, id, title, content) {
            $("#" + id).click(function () {

                switch (id) {
                    case "nianji":
                        content = "<ul id='answer'>";
                        // console.log();
                        var curYear = parseInt((new Date()).Format("yyyy"));
                        for (var i = curYear; i > (curYear - 10); i--) {
                            content += "<li><div class='ipt_box2'>" +
                            "<div class='left'>" + i + "年级</div>" +
                            "<div class='right'>" +
                            "<i class='fa fa-angle-right' aria-hidden='true'></i></div>" +
                            "</div>" +
                            "<div class='clearbox'></div>" +
                            "</div></li>";
                        }
                        content += "</ul>";
                        break;
                    case "xueli":
                        content = "<ul id='answer'>";
                        var arr = "中专、高中、高职（大专）、本科、硕士、博士、博士后（最高）".split("、");
                        for (var i = 0; i < arr.length; i++) {
                            content += "<li><div class='ipt_box2'>" +
                            "<div class='left'>" + arr[i] + "</div>" +
                            "<div class='right'>" +
                            "<i class='fa fa-angle-right' aria-hidden='true'></i></div>" +
                            "</div>" +
                            "<div class='clearbox'></div>" +
                            "</div></li>";
                        }
                        content += "</ul>";

                        break;
                }


                //--------------------------------
                $yourmodal.css("height", $height);
                $ammodaldialog.css("height", $height);
                $yourmodal.unbind('open.modal.amui');
                $yourmodal.bind('open.modal.amui', function () {
                    //console.log("打开窗口");
                    $yourmodal.find("span").html(title);//设置标题
                    $yourmodal.find(".am-modal-bd").html(content);//设置显示内容
                    $("#answer li").bind("click", function () {
                        // console.log($(this).find(".left").html());
                        $("#" + id).find("input").val($(this).find(".left").html());
                        // console.log($("#"+id).next("input").attr("id"));
                        // console.log($(this).find(".left").html());
                        // $("#"+id).next("input").val($(this).find(".left").html());
                        $yourmodal.modal('close');
                    })
                    // console.log($yourmodal.find(".am-modal-bd").html());
                });
                $yourmodal.unbind('close.modal.amui');
                $yourmodal.bind('close.modal.amui', function () {
                    //console.log('关闭了窗口');
                });
                $yourmodal.modal();
            })
        }
        $(function () {
            //调用日期组件
            // $('#doc-datepicker').datepicker().
            //   on('changeDate.datepicker.amui', function(event) {
            //     console.log(event.date.Format("yyyy-MM-dd"));
            //     $("#doc-datepicker").find("input").val(event.date.Format("yyyy-MM-dd"));
            //     // $("#he_birthday").val(event.date.Format("yyyy-MM-dd"));
            // });
            var $width = $(window).width();
            var $height = $(window).height();

            var $yourmodal = $('#your-modal');
            var $ammodaldialog = $(".am-modal-dialog");


            //选择职业
            // showbox($yourmodal,$ammodaldialog,$height,"zhiye","可以设置的职业标题","可以设置的内容");
            //选择学历
            // showbox($yourmodal,$ammodaldialog,$height,"xueli","请选择学历","可以设置的内容");
            //选择学校
            // showbox($yourmodal,$ammodaldialog,$height,"xuexiao","可以设置的学校标题","可以设置的内容");
            //选择专业
            // showbox($yourmodal,$ammodaldialog,$height,"zhuanye","可以设置的专业标题","可以设置的内容");
            //选择年级

            // showbox($yourmodal,$ammodaldialog,$height,"nianji","请选择年级","可设置的年级内容");


            $("#whatiscash").click(function () {
                whatiscash($width, $height, 0);//什么是保证金
            })
            // $(window).scroll(function() {
            //   console.log($(this).scrollTop());
            //   whatiscash($width,$height,$(this).scrollTop());//什么是保证金
            // });

            //上传身份证照片
            $('#file_upload').uploadifive({
                'auto': true,
                'checkScript': 'check-exists.php',
                'buttonText': ' ',
                'queueID': 'queue',
                'uploadScript': 'http://suzhi.hzjuym.com/index.php/home/Register/doPhoto',
                'onUploadComplete': function (file, data) {
                    /*$('#both').append("<div class='add'>< img  class='img1' width=100px src='/upimg/lt/"+data+"' >< img class='ico'  src='/Public/img/ywrong.png'><input type='hidden' name='img[]' value="+data+"></div>");*/
                    // console.log(data);
                    var obj = eval('(' + data + ')');
                    console.log(obj);
                    $("#he_idimg").val(obj.pic);
                    if (obj.item.msg == "ok") {
                        console.log($("#doc-datepicker").find("input").length);
                        console.log(obj.item.result.birth);
                        $("#doc-datepicker").find("input").val(obj.item.result.birth);
                        register.registerModel.he_birthday = obj.item.result.birth;
                        register.registerModel.he_nickname = obj.item.result.name;
                        register.registerModel.he_sex = obj.item.result.sex;
                        $("#he_sex").html(obj.item.result.sex);
                        $("#he_nickname").html(obj.item.result.name);
                        $("#he_birthday").html(obj.item.result.birth);
                    }
                }
            });
        });
        var register = new Vue({
            el: '#app',
            data: {
                registerUrl: 'http://suzhi.hzjuym.com/index.php/home/Register/Sensms',
                registerUrl1: 'http://suzhi.hzjuym.com/index.php/home/Register/Verif',
                registerUrl2: 'http://suzhi.hzjuym.com/index.php/home/Register/dore2',
                registerUrl3: 'http://suzhi.hzjuym.com/index.php/home/Register/dore3',
                registerModel: {
                    phone: '',
                    code: '',
                    he_carid: '',
                    he_name: '',
                    he_idimg: '',
                    he_birthday: '',
                    he_occupation: '',
                    he_education: '',
                    he_school: '',
                    he_major: '',
                    he_grade: '',
                    he_sex: '',
                    he_nickname: ''
                }
            },
            created: function () ,
            methods: {
                register: function (event) {
                    var vm = this;
                    var phone = this.registerModel.phone;
                    var code = this.registerModel.code;
                    if (phone == "" || phone == null) {
                        showRemindbox("手机号不能为空！");
                        return;
                    } else {
                        $.ajax({
                            url: vm.registerUrl,
                            type: 'POST',
                            dataType: 'json',
                            data: vm.registerModel,
                            success: function (data) {
                                if (data == 'ok') {
                                    showRemindbox("短信已发送！");
                                } else if (data == 'exist') {
                                    showRemindbox("该手机号已经存在，请重新输入！");
                                } else if (data == 'no') {
                                    showRemindbox("该手机号不存在，请重新输入！");
                                } else if (data == 'error') {
                                    showRemindbox("发送失败！");
                                }


                            },
                            error: function (e) {
                                showRemindbox("连接失败！");
                            }
                        })
                    }
                    getcode(event.currentTarget);
                },
                register1: function () {
                    var vm = this;
                    var phone = this.registerModel.phone;
                    var code = this.registerModel.code;
                    if (phone == "" || phone == null) {
                        showRemindbox("手机号不能为空！");
                        return;
                    } else if (code == "" || code == null) {
                        showRemindbox("验证码不能为空！");
                        return;
                    } else {
                        $.ajax({
                            url: vm.registerUrl1,
                            type: 'POST',
                            dataType: 'json',
                            data: vm.registerModel,
                            success: function (data) {
                                if (data == 'ok') {
                                    $(".liststep1").attr("style", "display:none;");
                                    $(".liststep2").attr("style", "display:block;");
                                } else if (data == 'yorn') {
                                    showRemindbox("手机号码已存在！");
                                } else if (data == 'no') {
                                    showRemindbox("验证码错误");
                                }

                            },
                            error: function (e) {
                                showRemindbox("连接失败！");
                            }
                        })
                    }

                },
                register2: function () {
                    var vm = this;
                    var he_idimg = $("#he_idimg").val();
                    var he_carid = this.registerModel.he_carid;
                    var he_name = this.registerModel.he_name;
                    if (he_carid == "" || he_carid == null) {
                        showRemindbox("身份证不能为空！");
                        return;
                    } else if (he_name == "" || he_name == null) {
                        showRemindbox("姓名不能为空！");
                        return;
                    } else if (he_idimg == null || he_idimg == "") {
                        showRemindbox("请上传身份证照片！");
                        return;
                    } else {
                        this.registerModel.he_idimg = he_idimg;
                        $.ajax({
                            url: vm.registerUrl2,
                            type: 'POST',
                            dataType: 'json',
                            data: vm.registerModel,
                            success: function (data) {
                                if (data == 'ok') {
                                    vm.registerModel.he_birthday = $("#he_birthday").val();
                                    vm.registerModel.he_sex = $("#he_sex").val();
                                    // $("#he_birthday").val(data.he_birthday;);
                                    // $("#he_sex").val(data.he_sex);
                                    //$("#he_sex").val(data.he_sex);
                                    $(".liststep2").attr("style", "display:none;");
                                    $(".liststep3").attr("style", "display:block;");
                                }

                            },
                            error: function (e) {
                                showRemindbox("连接失败！");
                            }
                        })
                    }

                },
                register3: function () {
                    var vm = this;

                    // this.registerModel.he_birthday = $("#he_birthday").val();
                    // // this.registerModel.he_education = $("#he_education").val();
                    // this.registerModel.he_sex = $("#he_sex").val();
                    // this.registerModel.he_grade = $("#he_grade").val();
                    console.log(vm.registerModel.he_education);
                    $.ajax({
                        url: vm.registerUrl3,
                        type: 'POST',
                        dataType: 'json',
                        data: vm.registerModel,
                        success: function (data) {
                            if (data == 'ok') {
                                window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx861438b92b0b0ba9&redirect_uri=http%3A%2F%2Fsuzhi.hzjuym.com%2Findex.php%2FHome%2FWxpay%2Findex&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
                            }

                        },
                        error: function (e) {
                            showRemindbox("连接失败！");
                        }
                    })
                },
                showbox: function (event) {
                    var vm = this;
                    // console.log("showbox");
                    // console.log(event.currentTarget.id);
                    var id = event.currentTarget.id;
                    switch (id) {
                        case "nianji":
                            title = "可选择年级";
                            content = "<ul id='answer'>";
                            // console.log();
                            var curYear = parseInt((new Date()).Format("yyyy"));
                            for (var i = curYear; i > (curYear - 10); i--) {
                                content += "<li><div class='ipt_box2'>" +
                                "<div class='left'>" + i + "年级</div>" +
                                "<div class='right'>" +
                                "<i class='fa fa-angle-right' aria-hidden='true'></i></div>" +
                                "</div>" +
                                "<div class='clearbox'></div>" +
                                "</div></li>";
                            }
                            content += "</ul>";
                            break;
                        case "xueli":
                            title = "可选择学历";
                            content = "<ul id='answer'>";
                            var arr = "中专、高中、高职（大专）、本科、硕士、博士、博士后（最高）".split("、");
                            for (var i = 0; i < arr.length; i++) {
                                content += "<li><div class='ipt_box2'>" +
                                "<div class='left'>" + arr[i] + "</div>" +
                                "<div class='right'>" +
                                "<i class='fa fa-angle-right' aria-hidden='true'></i></div>" +
                                "</div>" +
                                "<div class='clearbox'></div>" +
                                "</div></li>";
                            }
                            content += "</ul>";

                            break;
                    }
                    console.log(title);

                    var $width2 = $(window).width();
                    var $height2 = $(window).height();

                    var $yourmodal2 = $('#your-modal');
                    var $ammodaldialog2 = $(".am-modal-dialog");

                    $yourmodal2.css("height", $height2);
                    $ammodaldialog2.css("height", $height2);
                    $yourmodal2.unbind('open.modal.amui');
                    $yourmodal2.bind('open.modal.amui', function () {
                        //console.log("打开窗口");
                        $yourmodal2.find("span").html(title);//设置标题
                        $yourmodal2.find(".am-modal-bd").html(content);//设置显示内容
                        $("#answer li").bind("click", function () {
                            // console.log($(this).find(".left").html());
                            $("#" + id).find("input").val($(this).find(".left").html());
                            switch (id) {
                                case "xueli":
                                    vm.registerModel.he_education = $(this).find(".left").html();
                                    break;
                                case "nianji":
                                    vm.registerModel.he_grade = $(this).find(".left").html();
                                    break;
                            }
                            $yourmodal2.modal('close');
                        })
                        // console.log($yourmodal.find(".am-modal-bd").html());
                    });
                    $yourmodal2.unbind('close.modal.amui');
                    $yourmodal2.bind('close.modal.amui', function () {
                        //console.log('关闭了窗口');
                    });
                    $yourmodal2.modal("open");

                    // console.log(content);
                },
                showtime()
        {
            var vm = this;
            // $("#doc-datepicker").datepicker({theme:'warning',format: 'yyyy-mm'},'open');
            // $("#doc-datepicker").datepicker('open', function(event) {
            //     console.log(event.date.Format("yyyy-MM-dd"));
            //     $("#doc-datepicker").find("input").val(event.date.Format("yyyy-MM-dd"));
            //     // $("#he_birthday").val(event.date.Format("yyyy-MM-dd"));
            // })
            $('#doc-datepicker').datepicker().unbind('changeDate.datepicker.amui');
            $('#doc-datepicker').datepicker().
                    bind('changeDate.datepicker.amui', function (event) {
                        console.log(event.date.Format("yyyy-MM-dd"));
                        $("#doc-datepicker").find("input").val(event.date.Format("yyyy-MM-dd"));
                        vm.registerModel.he_birthday = event.date.Format("yyyy-MM-dd");
                        // $("#he_birthday").val(event.date.Format("yyyy-MM-dd"));
                    });
            $('#doc-datepicker').datepicker('open');
        }
        }
        })


    </script>
</html>
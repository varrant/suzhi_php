<?php if (!defined('THINK_PATH')) exit();?><!-- 登陆 -->
<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>注册-成为猎头</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="stylesheet" href="/Public/home/assets/css/amazeui.css">
    <link rel="stylesheet" href="/Public/home/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/Public/home/css/style.css">
    <link rel="stylesheet" href="/Public/home/css/login.css">
    <link rel="stylesheet" href="/Public/home/css/common.css">
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
                <i class="fa fa-circle-o" aria-hidden="true" id="isYes" onclick="checkYes();"></i>
            </div>
            <div class="content" onclick="yuedu()">我已经阅读并同意速职用户协议</div>
        </div>
        <div class="margin_box180"></div>
        <div class="btn_box">
            <button class="btn_login_out" id="btn_login" @click="register1" >下一步</button>
        </div>
    </div>
    <div id="agreements" style ="display: none"class="main" style="padding-bottom:50px;position:fixed;background:rgba(0,0,0,0.5);width:100%;height:100%;top:0px;left:0px;z-index:1;">
        <div class="agreement" style="position:fixed;background:#fff;width:100%;height:100%;top:0px;left:0px;z-index:2;overflow:scroll;">
            <a href="javascript:guanbi()" style="position:absolute;top:5px;right:10px;font-size:16px;font-weight:600;">X</a>
            <h3>速职用户使用协议</h3>
            <p>本协议服务条款(以下简称“服务条款”)是由用户(您)与杭州巨光网络科技有限公司(以下简称"速职")就速职提供的招聘服务所订立的相关权利义务规范，本服务条款对您及速职均具有法律效力。</p>
            <p>前言：速职是一个以个人猎头为核心的人才供给平台。速职提供包括兼职/招聘信息浏览、发布和接取招募任务等服务（以下称“速职服务”）。速职上的信息是由速职（联系付费企业用户）自行发布，所有内容均由发布者对信息的真实性负责，速职有义务对其真实性进行审核、监督。</p>
            <p style="font-weight:600;">1.定义</p>
            <p>用户，包含注册用户和非注册用户。注册用户是指通过速职完成全部注册程序后，使用速职服务的用户。非注册用户指未进行注册，直接登录速职或通过直接联系速职工作人员使用速职服务的用户。</p>
            <p style="font-weight:600;">2.用户协议的接受和修改</p>
            <p>用户应当在使用速职服务之前认真阅读本协议全部内容。如用户对本协议有任何疑问的，应向速职咨询。无论用户以任何方式使用速职服务，包括但不限于发布信息，浏览信息，发布招聘，均被认为用户已经阅读且接受本协议。无论用户是否在使用速职服务之前认真阅读了本协议内容，只要用户使用速职服务成为了速职个人猎头，则本协议即产生约束力，届时用户不应以未阅读本协议内容为由，主张本协议无效，或主张撤销本协议。</p>
            <p>如遇国家法律法规变更或速职产品和服务规则发生调整，速职有权根据需要不时地修改本协议，并以网站公示的方式进行公示，如用户不同意相关变更内容，请停止使用速职服务。如果用户继续享用服务，则视为无条件接受本协议条款的变动。</p>
            <p>速职拥有对本协议的最终解释权。</p>
            <p style="font-weight:600;">3.用户资格</p>
            <p>速职的服务仅向18周岁以上有完全民事行为能力人提供，需缴纳500元保证金于速职才成为速职正式用户。</p>
            <p style="font-weight:600;">4.用户账户</p>
            <p>用户完成注册程序时，速职会向用户提供唯一编号的速职账户（内置保证金500元）。速职识别用户的方式是且只是用户完成整个用户注册步骤。对于他人使用任何手段登录速职并实施任何的行为，速职都视为用户本人的行为，用户不得以该登录非其本人所为为理由要求速职为任何行为。除非有法律规定且征得速职的同意，否则，用户账户不得以任何方式转让、赠与或继承（与账户相关的财产权益除外）。</p>
            <p style="font-weight:600;">5.内容</p>
            <p>5.1、用户权利与义务</p>
            <p>5.1.1用户在了解候选人的情况，分析其背景资料，并在此基础上进行筛选后，向速职提交合适候选人的个人资料。</p>
            <p>5.1.2.若出现以下任何一种情况，均视为用户已完成猎头服务全部工作，用户有权要求速职按该笔订单的服务费用，按约定支付周期与方式支付费用。如逾期支付，用户将保留诉诸法律解决的权利：</p>
            <p>（1）用户所推荐的候选人被该笔订单的所属公司全职录用；</p>
            <p>（2）速职对某一岗位所推荐的候选人因某种原因不能成功入职该岗位，但录取该候选人为其他岗位职员。</p>
            <p>（3）企业面试速职所推荐的候选人后表示拒绝聘用，却在面试后一年内聘用速职曾推荐的人选。</p>
            <p>5.1.3.若出现以下任何一种情况，均视为用户完成部分猎头服务全部工作，速职有权要求用户支付协商后的猎头服务费。如逾期支付，速职将保留诉诸法律解决的权利：</p>
            <p>（1）企业面试速职所推荐的候选人后因某种原因不能聘用该候选人，而聘用该候选人做兼职或其他短期服务；</p>
            <p>（2）企业面试速职所推荐的候选人后并没有聘用，而采用咨询、承包等方式与候选人保持合作关系。</p>
            <p>5.2、速职权利与义务</p>
            <p>5.2.1.速职应向用户提供详细、真实的公司背景资料，包括但不限于公司背景、经营状况、发展战略、企业文化等。</p>
            <p>5.2.2.速职须负责在速职所开发的“速职”平台上提供每一社会所需岗位的详细资料，并对薪酬、福利、休假等与应聘者利益相关一切信息之真实性负责。</p>
            <p>5.2.3.收到用户提交的候选人报告资料及个人简历后，速职应在三个工作日内通知用户是否要求候选人面试。如果面试，应提前告知时间和地点。面试结束后，速职应在五个工作日内告知用户面试结果。</p>
            <p>5.2.4.速职应在用户提供的应聘者面试后积极与用户沟通、协调，三天内做出上一轮面试的决议（包括安排下一轮复试或录用）。特殊情况外，每个候选人面试次数最多为四次。</p>
            <p>5.2.5.速职对候选人信息、候选人报告、候选人面试过程等一切可能有损于候选人正当利益或本合同正当履行的信息，负有保密义务。</p>
            <p style="font-weight:600;">6.禁止</p>
            <p>用户不应做出任何法律法规禁止的行为。对于违反国家规定的《互联网违禁信息》的内容，速职一经发现，将立即删除。</p>
            <p>用户使用速职服务时，不得违背社会公共利益或公共道德，不得损害他人的合法权益，不得违反本协议及相关规则。如果违反前述承诺，用户应自行承担所有法律后果，速职不负任何连带责任。</p>
            <p>用户违反本协议及相关规则时，速职有权终止对用户提供的速职服务，且无须征得用户同意或提前通知用户。</p>
            <p>对于用户在速职上的行为，速职有权单方认定用户行为是否构成对本协议及相关规则的违反，并据此采取相应处理措施。</p>
            <p style="font-weight:600;">7.费用与服务</p>
            <p>速职向用户收取500元（人民币）保证金，用户注册完成后，保证金将冻结于用户的账户中。用户在完成十人成功入职后解冻保证金。若用户向速职申请不再拥有速职用户权利，速职应予以恰当解决。因网站自身需要进行改版的，若涉及保证金数目变化，包括但不限于产品取消、服务内容发生增加或减少、登载页面变更、发布城市变更的，速职可提前终止服务并将用户已缴纳的保证金款项退还用户，此类情况不视为速职违约。</p>
            <p style="font-weight:600;">8. 用户利益及收款方式</p>
            <p>8.1.全职和实习生佣金标准：</p>
            <p>该订单约定的固定金额佣金 </p>
            <p>说明：由速职平台后台打款作为支付方式，用户可在速职平台上申请提现</p>
            <p>若速职发出的猎头薪酬是某一区间的，以最后协定为标准。</p>
            <p>付款方式：在用户完成全职或实习生猎头工作的条件下，速职将企业提供的佣金（该佣金指的是企业向速职提供的全额的85％，即速职收取15％的平台费用）冻结在用户速职账户中。情况如下：</p>
            <p>1、 当候选人被企业录用后，三个工作日内候选人本人辞职或企业辞退，该笔佣金不予发放；</p>
            <p>2、当候选人被企业录用后，3-10个工作日内，候选人本人辞职，该笔佣金的25%转入        可转出余额（即用户可提现）；</p>
            <p>3、当候选人被企业录用后，3-10个工作日内，候选人被企业辞职，该笔佣金的75%转入可转出余额（即用户可提现）；</p>
            <p>4、当候选人被企业录用后， 10个工作日后，该笔佣金全部解冻，即100%转入可转出余额（即用户可提现）； </p>
            <p>8.2.兼职佣金标准：</p>
            <p>该订单约定固定金额佣金</p>
            <p>说明：由速职平台后台打款作为支付方式，用户可在速职平台上申请提现若速职发出的猎头薪酬是某一区间的，以最后协定为标准。</p>
            <p>付款方式：兼职猎头佣金在确定工作后一次性全部付清，即转入可转出余额（即用户可提现）。</p>
            <p style="font-weight:600;">9.账户余额</p>
            <p>速职账户余额是速职内部使用的现金账户，方便用户进行个人提现，或者享受更多的优惠。所有账户余额中（除冻结资金）的资金都能提现。</p>
            <p style="font-weight:600;">10.通知与披露</p>
            <p>速职提供服务有关的用户协议和服务条款的修改、服务的变更、收费政策的变更或其它重要事件的通告都会以网站发布的方式通知用户。</p>
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
                    <input id="work" type="file" multiple="true" style="position:absolute;top:0px;left:0px;opacity: 0;width:100%;height:100%;" >
                </div>
            </div>
            <div class="listItem">
                <div class="title">上传证件照</div>
                <div class="pic">
                    <img id="work_image" src="/Public/home/images/reg_eg1.png" style="width:110px;height: 110px;">
                </div>
            </div>
            <div class="clearbox"></div>
        </div>
        <div class="ipt_box">
            <div id="queue"></div>
        </div>
        <div style="margin-top: 120px;"></div>
        <div class="btn_box">
            <button class="btn_login_over" @click="register2">下一步</button>
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
                <div class="ipt_value" id="xingbie" @click="showbox($event)">
                    <input id="he_sex" class="inp_username" disabled="disabled" v-model="registerModel.he_sex" placeholder="请选择">
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
                    <input type="text" id="he_occupation" v-model="registerModel.he_occupation" class="inp_username" placeholder="请填写">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div class="clearbox"></div>
        </div>
        <div class="ipt_box2">
            <div class="left">学历</div>
            <div class="right">
                <div class="ipt_value" id="xueli" @click="showbox($event)">
                    <input id="he_education" class="inp_username" disabled="disabled" v-model="registerModel.he_education" placeholder="请选择">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div class="clearbox"></div>
        </div>
        <div class="ipt_box2">
            <div class="left">毕业学校</div>
            <div class="right">
                <div class="ipt_value" id="xuexiao">
                    <input type="text" id="he_shcool" v-model="registerModel.he_school" class="inp_username" placeholder="请填写">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div class="clearbox"></div>
        </div>
        <div class="ipt_box2">
            <div class="left">专业</div>
            <div class="right">
                <div class="ipt_value" id="zhuanye">
                    <input type="text" id="he_major" v-model="registerModel.he_major" class="inp_username" placeholder="请填写">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div class="clearbox"></div>
        </div>
        <div class="ipt_box2 ipt_box2_bottom">
            <div class="left">入学年份</div>
            <div class="right">
                <div class="ipt_value" id="nianji" @click="showbox($event)">
                    <input class="inp_username" id="he_grade" disabled="disabled" v-model="registerModel.he_grade" placeholder="请选择">
                    <i class="fa fa-angle-right" aria-hidden="true"></i>
                </div>
            </div>
            <div class="clearbox"></div>
        </div>

        <div style="background-color: #d8d8d8; padding-top: 120px; padding-bottom: 50px;">
            <div class="btn_box">
                <button class="btn_login_over" @click="register3">下一步</button>
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
                <button class="btn_login_pay_over" data-am-modal="{target: '#mypay'}">立即支付</button>
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
            <div class="am-modal-bd" style="overflow:scroll;height: 100%">
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
                    <a href="<?php echo U('Home/Wxpay/create_order');?>" style="color: #05cb04;">
                                <span>
                                    <img src="/Public/home/images/wechat1.png" alt="">
                                </span>
                        &nbsp;微信支付
                        <i class="fa fa-angle-right" style="float: right; color: #999999; margin-right: 16px; line-height: 66px;" aria-hidden="true"></i>
                    </a>
                </li>
                <!--<li>-->
                    <!--<a href="#" style="color: #01a9ef;">-->
                                <!--<span>-->
                                    <!--<img src="/Public/home/images/alipay1.png" alt="">-->
                                <!--</span>-->
                        <!--&nbsp;支付宝-->
                        <!--<i class="fa fa-angle-right" style="float: right; color: #999999; margin-right: 16px; line-height: 66px;" aria-hidden="true"></i>-->
                    <!--</a>-->
                <!--</li>-->
            </ul>
        </div>
    </div>

    <!-- 什么是保证金 -->
    <div class="cashbox">
        <div class="cashbg"></div>
        <div class="contentbox">
            <div class="title">保证金</div>
            <div class="word">
                <span>什么是保证金？</span>
                <br>
                为了保证履行双方约定而缴纳的钱，在完成双方履行的承诺之后给予退还。
                <br>
                <br>
                <span>保证金去哪儿了？</span>
                <br>
                保证金存在乙方个人账户中，在乙方推荐成功入职者未满十人之前，保证金处于冻结状态，不可提现，不可使用。
                <br>
                <span>如何退还保证金？</span>
                <br>
                经乙方推荐，成功入职满十人，即可全额退还保证金。若发现刷单、逃单等情况，经平台审核情况属实，保证金不予退还。
                <br>
            </div>
        </div>
        <div class="cashbtn" onclick="closecashbox()">×</div>
    </div>
</div>
</body>
<script src="/Public/home/js/vue.js"></script>
<script src="/Public/myjs/UploadPic.js" type="text/javascript"></script>
<script>
    function yuedu() {
        $('#agreements').css('display','block');
    }
    function guanbi(){
        $('#agreements').css('display','none');

    }
    $(function() {
        upload("work", "work_image"); //上传证件合影
    });
    /*
     * id file input的id
     * thumb 缩略图id
     */
    function upload(id, thumb) {
        //上传证书
        var u = new UploadPic();
        u.init({
            input: document.getElementById(id),
            callback: function(base64, fileType) {
                console.log(base64);
                $("#" + thumb).attr("src", base64);
                $("#" + thumb).attr("filetype", fileType);
            },
            loading: function() {
                //say_error("等待上传...");
            }
        });
    }
    function getcode(t) {
        $(t).html("重新发送");
    }

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
    var agree_si = false;
    function checkYes(){
        //自行添加JS变量，用来标识是否同意协议
        if ($("#isYes").attr("class").indexOf("fa-check-circleover") > -1) {
            $("#isYes").addClass("fa-circle-o");
            $("#isYes").removeClass("fa-check-circle");
            $("#isYes").removeClass("fa-check-circleover");
            //不同意协议此处应该返回FALSE
            $("#btn_login").attr("class", "btn_login_out");
            agree_si = false;
        }
        else {
            $("#isYes").removeClass("fa-circle-o");
            $("#isYes").addClass("fa-check-circle");
            $("#isYes").addClass("fa-check-circleover");
            $("#btn_login").attr("class", "btn_login_over");
            //同意协议此处应该返回TRUE
            agree_si = true;
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
                case "xingbie":
                    content = "<ul id='answer'>";
                    var arr = "男、女".split("、");
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
            registerUrl: "<?php echo U('Home/Register/smsvcode');?>",
            registerUrl1: "<?php echo U('Home/Register/regstep1');?>",
            registerUrl2: "<?php echo U('Home/Register/regstep2');?>",
            registerUrl3: "<?php echo U('Home/Register/regstep3');?>",
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
        created: function (){
            //实例被创建之后被调用
            // `this` 指向 vm 实例
            var vm = this;
            // console.log('a is: ' + this.registerModel.he_name);
        },
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

                                showRemindbox(data.errmsg);

                        },
                        error: function (e) {
                            showRemindbox("连接失败！");
                        }
                    })
                }
                getcode(event.currentTarget);
            },
            register1: function () {
                //检查是否已经同意协议
                if(agree_si == false){

                    showRemindbox('请阅读注册协议');
                    return;
                }
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
                            if (data.errcode == 0) {
                                $(".liststep1").attr("style", "display:none;");
                                $(".liststep2").attr("style", "display:block;");
                            }else{
                                showRemindbox(data.errmsg);
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
                var he_idimg = $("#work_image").attr('src');
                var he_carid = this.registerModel.he_carid;
                var he_name = this.registerModel.he_name;
                if (he_carid == "" || he_carid == null) {
                    showRemindbox("身份证不能为空！");
                    return;
                } else if (he_name == "" || he_name == null) {
                    showRemindbox("姓名不能为空！");
                    return;
                } else if (he_idimg == null || he_idimg == "" || he_idimg == '/Public/home/images/reg_eg1.png' ) {
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
                            if (data.errcode == 0) {
                                $(".liststep2").attr("style", "display:none;");
                                $(".liststep3").attr("style", "display:block;");
                            }else{
                                showRemindbox(data.errmsg);
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
                var he_nickname=$('#he_nickname').val();
                var xingbie=$('#he_sex').val();
                if(xingbie == '男'){
                    var he_sex = '0';
                }else{
                    var he_sex = '1';
                }
                var he_birthday =$('#he_birthday').val();
                var he_occupation=$('#he_occupation').val();
                var he_education=$('#he_education').val();
                var he_shcool=$('#he_shcool').val();
                var he_major=$('#he_major').val();
                var he_grade=$('#he_grade').val();
                if (he_sex == "" || he_sex == null || he_nickname == "" || he_nickname == null || he_birthday == "" || he_birthday == null || he_occupation == "" || he_occupation == null || he_education == "" || he_education == null || he_shcool == "" || he_shcool == null || he_major == "" || he_major == null || he_grade == "" || he_grade == null) {
                    showRemindbox("请填写完整信息");
                    return;
                }else{
                    this.registerModel.he_nickname = he_nickname;
                    this.registerModel.he_sex = he_sex;
                    this.registerModel.he_birthday = he_birthday;
                    this.registerModel.he_occupation = he_occupation;
                    this.registerModel.he_education = he_education;
                    this.registerModel.he_shcool = he_shcool;
                    this.registerModel.he_major = he_major;
                    this.registerModel.he_grade = he_grade;
                    $.ajax({
                        url: vm.registerUrl3,
                        type: 'POST',
                        dataType: 'json',
                        data: vm.registerModel,
                        success: function (data) {
                            if (data.errcode == 0) {
                                vm.registerModel.he_birthday = $("#he_birthday").val();
                                vm.registerModel.he_sex = $("#he_sex").val();
                                // $("#he_birthday").val(data.he_birthday;);
                                // $("#he_sex").val(data.he_sex);
                                //$("#he_sex").val(data.he_sex);
                                $(".liststep3").attr("style", "display:none;");
                                $(".liststep4").attr("style", "display:block;");
                            }else{
                                showRemindbox(data.errmsg);
                            }
//                            if (data == 'ok') {
//                                //window.location.href = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx861438b92b0b0ba9&redirect_uri=http%3A%2F%2Fsuzhi.hzjuym.com%2Findex.php%2FHome%2FWxpay%2Findex&response_type=code&scope=snsapi_base&state=123#wechat_redirect";
//
//                            }

                        },
                        error: function (e) {
                            showRemindbox("连接失败！");
                        }
                    })
                }

            },
            showbox: function (event) {
                var vm = this;
                // console.log("showbox");
                // console.log(event.currentTarget.id);
                var id = event.currentTarget.id;
                switch (id) {
                    case "xingbie":
                        title = "可选择性别";
                        content = "<ul id='answer'>";
                        var arr = "男、女".split("、");
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
                    case "nianji":
                        title = "可选择入学年份";
                        content = "<ul id='answer'>";
                        // console.log();
                        var curYear = parseInt((new Date()).Format("yyyy"));
                        for (var i = curYear; i > (curYear - 20); i--) {
                            content += "<li><div class='ipt_box2'>" +
                                    "<div class='left'>" + i + "</div>" +
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
                            case "xingbie":
                                vm.registerModel.he_sex = $(this).find(".left").html();
                                break;
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
            showtime:function ()
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
    });


</script>
</html>
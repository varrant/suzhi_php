<?php if (!defined('THINK_PATH')) exit();?><!-- 提现设置 -->
<!doctype html>
<html class="no-js">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>提现设置</title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <meta http-equiv="Cache-Control" content="no-siteapp"/>
        <link rel="stylesheet" href="/Public/home/assets/css/amazeui.css">
        <link rel="stylesheet" href="/Public/home/assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="/Public/home/css/style.css">
        <link rel="stylesheet" href="/Public/home/css/myCenterCashSet.css">
        <script src="/Public/home/assets/js/jquery.min.js"></script>
        <script src="/Public/home/assets/js/amazeui.min.js"></script>
        <script src="/Public/home/js/function.js"></script>
        <script src="/Public/home/js/date.js"></script>
        <script src="/Public/home/js/vue.js"></script>
    </head>

    <body>
        <div id="app">
            <div class="mytopbannerbox">
                <div class="tipsbox">
                    <input type="radio" checked="checked" name="pay" id="alipay" value="alipay" onclick="checkYes(this.id)"/>
                    <label for="alipay" class="alipay_bank checked">
                        <i id="alipay_icon" class="fa fa-check-circle fa-check-circleover"></i>
                        <span class="alipay_span">支付宝</span>
                    </label>

                    <input type="radio" name="pay" id="bankCard" value="bankcard" onclick="checkYes(this.id)"/>
                    <label for="bankCard" class="alipay_bank checked">
                        <i id="bank_card_icon" class="fa fa-circle-o"></i>
                        <span class="bank_span">银行卡</span>
                    </label>
                    <input type="hidden" id="cashtype" value="alipay"/>
                    <div class="clearbox"></div>
                </div>
                <form onsubmit="return false;" id="alipayform">
                    <div class="alipay alipay_flag">
                        <div class="ipt_box">
                            <input type="text" class="ipt_username" placeholder="请输入支付宝帐号"
                                   value="<?php if($set["type"] == alipay): echo ($set["account"]); endif; ?>" name="account"/>
                        </div>
                        <div class="ipt_box">
                            <input type="text" class="ipt_username" placeholder="请输入支付宝转账真实姓名"
                                   value="<?php if($set["type"] == alipay): echo ($set["uname"]); endif; ?>" name="uname"/>
                        </div>
                        <input type="hidden" name="type" value="alipay">
                        <input type="hidden" name="id" value="<?php echo ($set["id"]); ?>">
                    </div>
                </form>
                <form onsubmit="return false;" id="bcardform">
                    <div class="bank_card bcard_flag">
                        <input type="hidden" name="type" value="bankCard">
                        <input type="hidden" name="id" value="<?php echo ($set["id"]); ?>">
                        <div class="ipt_box">
                            <input type="text" class="ipt_username" placeholder="请选择所属银行卡"
                                   value="<?php if($set["type"] == bankCard): echo ($set["bankname"]); endif; ?>" name="bankname">
                        </div>
                        <div class="ipt_box">
                            <input type="text" class="ipt_username" placeholder="请输入银行卡号"
                                   value="<?php if($set["type"] == bankCard): echo ($set["account"]); endif; ?>" name="account">
                        </div>
                        <div class="ipt_box">
                            <input type="text" class="ipt_username" placeholder="请输入所属支行"
                                   value="<?php if($set["type"] == bankCard): echo ($set["subbranch"]); endif; ?>" name="subbranch">
                        </div>
                        <div class="ipt_box">
                            <input type="text" class="ipt_username" placeholder="请输入银行卡转账真实姓名"
                                   value="<?php if($set["type"] == bankCard): echo ($set["uname"]); endif; ?>" name="uname">
                        </div>
                    </div>
                </form>
                <div class="ipt_tips">
                    注：因涉及到您的提现资金，请填写您正确的提现信息
                </div>
            </div>

            <div class="btn_box" style="margin-top: 100px;">
                <button class="btn_login_out" id="btn_login" @click="myset">保存</button>
            </div>
        </div>
        <!-- 提示框架 -->
        <div id="rb1" class="remindbox">
            <div class="icon">
                <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
            </div>
            <div class="content"></div>
        </div>
    </body>
    <script>
        /**
         * 更新UI
         */
        var idl = '<?php echo ($set["type"]); ?>' == '' ? 'alipay' : '<?php echo ($set["type"]); ?>';
        checkYes(idl);

        /* 选择银行卡或者支付宝 */
        function checkYes(id) {
            idl = id;
            var alipayOrBankcard = id;
            if (alipayOrBankcard === 'alipay') {
                $('.bank_card').hide();
                $('#bank_card_icon').removeClass('fa-check-circle fa-check-circleover').addClass('fa-circle-o');
                $('#alipay_icon').removeClass('fa-circle-o').addClass('fa-check-circle fa-check-circleover');
                $('.alipay').show();
            } else if (alipayOrBankcard === 'bankCard') {
                $('.alipay').hide();
                $('#alipay_icon').removeClass('fa-check-circle fa-check-circleover').addClass('fa-circle-o');
                $('#bank_card_icon').removeClass('fa-circle-o').addClass('fa-check-circle fa-check-circleover');
                $('.bank_card').show();
            }
        }

        $('.btn_login_out').click(function () {
            var show = idl == 'alipay' ? 'alipayform' : 'bcardform';
            var formdata = $('#' + show).serialize();
            $.post('<?php echo U("exchset");?>', formdata, function (data) {
                showRemindbox(data.errmsg);
            }, 'json');
        });
        function showRemindbox(content) {
            $("#rb1").slideToggle();
            $("#rb1").find(".content").html(content);
            $("#rb1").unbind("click");
            $("#rb1").bind("click", function () {
                $("#rb1").slideToggle();
            })
        }
    </script>

</html>
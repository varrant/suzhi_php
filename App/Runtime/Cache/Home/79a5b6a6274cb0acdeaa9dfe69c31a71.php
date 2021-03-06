<?php if (!defined('THINK_PATH')) exit();?><html>

<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>微信安全支付</title>
    <script type="text/javascript" src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
    <script type="text/javascript">
        //调用微信JS api 支付
        function jsApiCall() {
            WeixinJSBridge.invoke(
                'getBrandWCPayRequest', <?php echo ($pay_param); ?>,
                function(res) {
                    if (res.err_msg == "get_brand_wcpay_request:ok") {
                        // message: "微信支付成功!",
                        alert('微信支付成功!');
                        //window.location.href = '<?php echo U("Home/Register/regstep4");?>';
                        window.open('<?php echo U("Home/Register/regstep4");?>');
                    } else if (res.err_msg == "get_brand_wcpay_request:cancel") {
                        // message: "已取消微信支付!"
                        alert('已取消微信支付!');
                    } else {
                        alert('未知状态！');
                    }
                }
            );
        }

        function callpay() {
            if (typeof WeixinJSBridge == "undefined") {
                if (document.addEventListener) {
                    document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
                } else if (document.attachEvent) {
                    document.attachEvent('WeixinJSBridgeReady', jsApiCall);
                    document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
                }
            } else {
                jsApiCall();
            }
        }
    </script>
</head>

<body>
    <style>
        .call-pay-div {
            display: table-cell;
            vertical-align: middle;
            position: absolute;
            top: 45%;
            width: 98%;
            margin: 0 auto;
        }
    </style>
    <div align="center" class="call-pay-div">
        <button style="width:250px; height:50px; background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white; font-size:16px; border-radius:10px" type="button" onclick="callpay()">去支付</button>
    </div>
</body>
</html>
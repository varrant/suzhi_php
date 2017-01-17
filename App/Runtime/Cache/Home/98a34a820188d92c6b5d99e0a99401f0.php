<?php if (!defined('THINK_PATH')) exit();?><html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
        <title>微信安全支付</title>
        <script type="text/javascript">
            //调用微信JS api 支付
            function jsApiCall() {
                WeixinJSBridge.invoke(
                        'getBrandWCPayRequest',
                        <?php echo ($pay_param); ?>,
                        function (res) {
                            if (res.err_msg == "get_brand_wcpay_request:ok") {
                                window.open('<?php echo U("Home/Register/regstep4");?>');
                            } else if (res.err_msg == "get_brand_wcpay_request:cancel") {
                                // message: "已取消微信支付!"
                                alert('已取消支付!');
                            } else {
                                alert('未知状态！');
                            }
                        }
                )
                ;
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
            $(function () {
                callpay();

            })
        </script>
    </head>
    <body>
        </br></br></br></br>
        <div align="center">
            <button style="width:210px; height:30px; margin-top:200px;background-color:#FE6714; border:0px #FE6714 solid; cursor: pointer;  color:white;  font-size:16px;" type="button" onclick="callpay()">去支付</button>
            <pre>window.open('<?php echo U("Home/Register/regstep4");?>');</pre>
        </div>
    </body>
</html>
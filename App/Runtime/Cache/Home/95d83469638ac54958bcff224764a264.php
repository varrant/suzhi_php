<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html class="no-js">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>您收到一份来自速职猎头的邀请函</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <meta name="renderer" content="webkit">
        <link rel="stylesheet" href="/Public/home/css/recommended-prices/recommended-prices.css">
    </head>

    <body>
        <div class="recommended_bg_img">
            <div class="immediately_recommend">
                <button onClick="_system._guide(true)">立即推荐</button>
            </div>
        </div>
        <div class="recommended_activity_rule">
            <div class="immediately_font">
                <span>活动规则</span>
            </div>
            <div class="activity_rule">
                <p>1、邀请好友注册猎头，您可获得100元红包奖励。</p>
                <p>2、如存在违规行为（包括恶意套现、及其作弊），速职将取消您的参与资格，相关红包将作废。</p>
                <p>3、此活动最终解释权归速职所有。</p>
            </div>
        </div>

        <div id="cover"></div>
        <div id="guide">
            <img src="/Public/home/images/guide.png">
        </div>
        <script>
            //微信分享代码；

            var _system = {
                $: function (id) {
                    return document.getElementById(id);
                },
                _client: function () {
                    return {
                        w: document.documentElement.scrollWidth,
                        h: document.documentElement.scrollHeight,
                        bw: document.documentElement.clientWidth,
                        bh: document.documentElement.clientHeight
                    };
                },
                _scroll: function () {
                    return {
                        x: document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft,
                        y: document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop
                    };
                },
                _cover: function (show) {
                    if (show) {
                        this.$("cover").style.display = "block";
                        this.$("cover").style.width = (this._client().bw > this._client().w ? this._client().bw : this._client().w) + "px";
                        this.$("cover").style.height = (this._client().bh > this._client().h ? this._client().bh : this._client().h) + "px";
                    } else {
                        this.$("cover").style.display = "none";
                    }
                },
                _guide: function (click) {
                    this._cover(true);
                    this.$("guide").style.display = "block";
                    this.$("guide").style.top = (_system._scroll().y + 5) + "px";
                    window.onresize = function () {
                        _system._cover(true);
                        _system.$("guide").style.top = (_system._scroll().y + 5) + "px";
                    };
                    if (click) {
                        _system.$("cover").onclick = function () {
                            _system._cover();
                            _system.$("guide").style.display = "none";
                            _system.$("cover").onclick = null;
                            window.onresize = null;
                        };
                    }
                },
                _zero: function (n) {
                    return n < 0 ? 0 : n;
                }
            }
        </script>
        <script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>

        <script>
            wx.config({
                        appId: '<?php echo ($signPackage["appId"]); ?>',
                        timestamp: <?php echo ($signPackage["timestamp"]); ?>,
                    nonceStr
            :
            '<?php echo ($signPackage["nonceStr"]); ?>',
                    signature
            :
            '<?php echo ($signPackage["signature"]); ?>',
                    jsApiList
            :
            [
                'checkJsApi',
                'onMenuShareTimeline',
                'onMenuShareAppMessage',
                'onMenuShareQQ',
                'onMenuShareWeibo'
            ]
            })
            ;
            wx.ready(function () {
                // 1 判断当前版本是否支持指定 JS 接口，支持批量判断
                wx.checkJsApi({
                    jsApiList: [
                        'getNetworkType',
                        'previewImage',
                        'onMenuShareTimeline',
                        'onMenuShareAppMessage',
                        'onMenuShareQQ',
                        'onMenuShareWeibo'
                    ],
                });
                var shareData = {
                    //标题
                    title: '您收到一份来自速职猎头的邀请函',
                    //摘要
                    desc: '成为个人猎头，来自朋友圈的红包拆不停',
                    //链接,可以换主页
                    link: '<?php echo ($jumpurl); ?>',
                    //缩略图, 修改URL
                    imgUrl: 'http://test.91suzhi.com/Public/image/1248423165.jpg'

                };
                wx.onMenuShareAppMessage(shareData);
                wx.onMenuShareTimeline(shareData);
                wx.onMenuShareQQ(shareData);
                wx.onMenuShareWeibo(shareData);
            });
        </script>
    </body>
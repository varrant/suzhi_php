<?php
namespace Home\Controller;

use Think\Controller;

/**
 * 微信支付；
 * Class WxpayController
 * @package Home\Controller
 */
class WxpayController extends CommonController
{

    /**
     * 测试类；
     */
    public function testpay()
    {
        $oid = time();
        $price = 1;
        $desc = 'Mark Test';
        $nof = "http://test.91suzhi.com/index.php/Home/Wxpay/notify";;
        $json = $this->pay($oid, $price, $desc, $nof);
        $this->assign('json', $json);
        $this->display();

    }

    /**
     * 初始化；
     */
    public function _initialize()
    {

        //引入WxPayPubHelper
        vendor('Weixinpay.WxPayPubHelper');

    }

    /**
     * 注册支付接口；
     */
    public function create_order()
    {
        $notifyurl = "http://" . $_SERVER['HTTP_HOST'] . U('Home/Wxpay/notify');
        $pay_order = M('pay');
        $data['pay_order'] = createOrderId();
        $data['pay_he_id'] = $_SESSION['he_id'];
        $data['pay_price'] = 500;
        $data['create_time'] = time();
        $res = $pay_order->add($data);
        //如果订单创建成功 就调用支付接口
        if ($res !== false && $res > 0) {
            $pay_param = $this->pay($data['pay_order'], $data['pay_price'], '猎头保证金', $notifyurl);
            echo $pay_param;
        } else {
            echo '创建订单失败';
        }

    }

    public function pay($out_trade_no, $price, $desc, $notifyurl)
    {
        header("Content-Type: text/html;charset=utf-8");
        /*获取openid*/
        $openid = $this->get_openid();

        $jsApi = new \JsApi_pub();
        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();
        //设置统一支付接口参数
        //设置必填参数
        //appid已填,商户无需重复填写
        //mch_id已填,商户无需重复填写
        //noncestr已填,商户无需重复填写
        //spbill_create_ip已填,商户无需重复填写
        //sign已填,商户无需重复填写

        $NOTIFY_URL = $notifyurl;
        $unifiedOrder->setParameter("openid", $openid);//openid
        $unifiedOrder->setParameter("body", $desc);//商品描述
        $unifiedOrder->setParameter("out_trade_no", $out_trade_no);//商户订单
        $unifiedOrder->setParameter("total_fee", $price);//总金额 微信的钱1*100等于1
        $unifiedOrder->setParameter("notify_url", $NOTIFY_URL);//通知地址
        $unifiedOrder->setParameter("trade_type", "JSAPI");//交易类型
        //非必填参数，商户可根据实际情况选填
        //$unifiedOrder->setParameter("sub_mch_id","XXXX");//子商户号
        //$unifiedOrder->setParameter("device_info","XXXX");//设备号
        //$unifiedOrder->setParameter("attach","XXXX");//附加数据
        //$unifiedOrder->setParameter("time_start","XXXX");//交易起始时间
        //$unifiedOrder->setParameter("time_expire","XXXX");//交易结束时间
        //$unifiedOrder->setParameter("goods_tag","XXXX");//商品标记
        //$unifiedOrder->setParameter("openid","XXXX");//用户标识
        //$unifiedOrder->setParameter("product_id","XXXX");//商品ID
        //var_dump($unifiedOrder);

        $prepay_id = $unifiedOrder->getPrepayId();
        // var_dump($prepay_id);
        // echo $prepay_id;exit();

        //=========步骤3：使用jsapi调起支付============
        $jsApi->setPrepayId($prepay_id);
        $jsApiParameters = $jsApi->getParameters();
        //$WEB_HOST='http://suzhi.hzjuym.com/index.php/Home/Wxpay/notify';//填写的话 如 http://nicaicai.imwork.net 最后面不用加 /
        //$this->assign('HOSTS',$WEB_HOST);
        return $jsApiParameters;
    }

    // 只完成 返回
    public function notify()
    {

        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);
        $val = json_decode(json_encode($xmlstring), true);

        /**
         * 进入回调处理；
         */
        $return_code = $val['result_code'];
        $out_trade_no = $val['out_trade_no'];
        //修改订单状态；2:已付款
        $model_pay = M('pay');
        $where = array(
            'pay_order' => $out_trade_no
        );
        $data = array('pay_status'=>2);
        $success = $model_pay->data($data)->where($out_trade_no)->save();
        //修改账户状态；
        $pay_info = $model_pay->where($where)->find();
        $he_id = $pay_info['pay_he_id'];
        $model_headerhunter = M('headhunter');
        $model_headerhunter->data(array('he_is_delete' => 1))->where(array('he_id' => $he_id))->save();

        //通知微信操作成功；
        echo <<<o
<xml>
 <return_code><![CDATA[SUCCESS]]></return_code>
 <return_msg><![CDATA[OK]]></return_msg>
</xml>
o;

    }

    /**
     * 获取openid
     */
    public function get_openid(){

        $CODE = $_GET['code'];
        if (empty($CODE)) {
            $url = urlencode('http://' . $_SERVER['HTTP_HOST'] . U(MODULE_NAME . '/' . CONTROLLER_NAME . '/' . ACTION_NAME));
            header("location:https://open.weixin.qq.com/connect/oauth2/authorize?appid=" . C(APPID) . "&redirect_uri={$url}&response_type=code&scope=snsapi_base&state=STATE#wechat_redirect");
        }
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=" . C(APPID) . "&secret=" . trim(C(APPSECRET)) . "&code=" . $CODE . "&grant_type=authorization_code";
        $openid = getopenid($url);

        return $openid;
    }

}
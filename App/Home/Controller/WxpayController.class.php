<?php
namespace Home\Controller;
use Think\Controller;
class WxpayController extends  CommonController {
    public function _initialize(){
    
        //引入WxPayPubHelper
        vendor('Weixinpay.WxPayPubHelper');
    } 
 
    function anniu(){


        $this->display();
    }
   
    public function index(){
        header("Content-Type: text/html;charset=utf-8");
        /*获取openid*/
        $CODE=$_GET['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".C(APPID)."&secret=".trim(C(APPSECRET))."&code=".$CODE."&grant_type=authorization_code";
        
       $openid=getopenid($url);
  
        $jsApi = new \JsApi_pub();
        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();
            //var_dump($unifiedOrder);          
        //设置统一支付接口参数
        //设置必填参数
        //appid已填,商户无需重复填写
        //mch_id已填,商户无需重复填写
        //noncestr已填,商户无需重复填写
        //spbill_create_ip已填,商户无需重复填写
        //sign已填,商户无需重复填写
    

        $NOTIFY_URL="http://suzhi.hzjuym.com/index.php/Home/Wxpay/notify";
        $unifiedOrder->setParameter("openid",$openid);//openid
        $unifiedOrder->setParameter("body",'宠物考级信息费');//商品描述
        $dbbh='12345678'.date("YmdHis").time();                               
        $unifiedOrder->setParameter("out_trade_no",$dbbh);//商户订单
        $unifiedOrder->setParameter("total_fee",100);//总金额 微信的钱1*100等于1
        $unifiedOrder->setParameter("notify_url",$NOTIFY_URL);//通知地址
        $unifiedOrder->setParameter("trade_type","JSAPI");//交易类型
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
        $WEB_HOST='http://suzhi.hzjuym.com/index.php/Home/Wxpay/notify';//填写的话 如 http://nicaicai.imwork.net 最后面不用加 /
        $this->assign('HOSTS',$WEB_HOST);
        // var_dump($jsApiParameters);
        $this->assign('jsApiParameters',$jsApiParameters);
        $this->display();
     
    }

// 只完成 返回
    public function notify(){
        //使用通用通知接口
       $notify = new \Notify_pub();
        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA']; 
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);  
        $val = json_decode(json_encode($xmlstring),true);
        $val['result_code'];
        $db=M('price');
        $map_s['Ddbh']=$val['out_trade_no'];
        // 成功插入改变状态
        if($val['result_code']=="SUCCESS"){
            $map['openid']=$val['openid'];
            $map['ddbh']=$val['out_trade_no'];
            $data['status']=1;
            $db->where($map)->save($data);
        }
        

    }


}
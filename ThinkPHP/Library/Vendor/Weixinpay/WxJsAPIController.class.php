<?php

namespace Home\Controller;
use Think\Controller;

class WxJsAPIController extends Controller{
    public function _initialize()
    {
        //引入WxPayPubHelper
        vendor('Weixinpay.WxPayPubHelper');
    }   

    public function jsApiCall()
    {   

       

        //使用jsapi接口
        $jsApi = new \JsApi_pub();
        
        //=========步骤1：网页授权获取用户openid============
        //通过code获得openid
        //
        //

        if (!isset($_GET['code']))
        {
            //触发微信返回code码
            $rUrl=urlencode(C('WxConfig.JS_API_CALL_URL');  
            /*注意一下这个 id 是为了可以成功的传个 id值才这样写  如果你不需要的话也可以直接写成
			 $rUrl=urlencode(C('WxConfig.JS_API_CALL_URL'));

            $this->redirect('WxJsAPI/jsApiCall',array('id' =>55),0, '页面跳转中...');
            我是这样穿这个id过来的值得你们也可以自己改成其他的来传这个id 或是删除他不要
            */
              

            $url = $jsApi->createOauthUrlForCode($rUrl);
           // echo $url;exit();
            Header("Location: $url");
        }else
        {

            //获取code码，以获取openid
            $code = $_GET['code'];
            $jsApi->setCode($code);
            $openid = $jsApi->getOpenId();//openid  这里是为了获取用户当前的openid 如果你有做微信登陆的话就可以无视他。
        }



        //=========步骤2：使用统一支付接口，获取prepay_id============
        //使用统一支付接口
        $unifiedOrder = new \UnifiedOrder_pub();

            /*此处做数据库的查询  这里操作数据库把产品信息显示出来*/

            /*此处做数据库的查询  这里操作数据库把产品信息显示出来*/


        //设置统一支付接口参数
        //设置必填参数
        //appid已填,商户无需重复填写
        //mch_id已填,商户无需重复填写
        //noncestr已填,商户无需重复填写
        //spbill_create_ip已填,商户无需重复填写
        //sign已填,商户无需重复填写
        //

        $NOTIFY_URL="你的域名/index.php/Home/WxJsAPI/notify";

        $unifiedOrder->setParameter("openid",$openid);//openid
        $unifiedOrder->setParameter("body",'商品的名字');//商品描述
        $unifiedOrder->setParameter("out_trade_no",'1111111111111111111111'.time());//商户订单号
        $unifiedOrder->setParameter("total_fee",1*100);//总金额 微信的钱1*100等于1
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
   

        $prepay_id = $unifiedOrder->getPrepayId();

       // echo $prepay_id;exit();
        //=========步骤3：使用jsapi调起支付============
        $jsApi->setPrepayId($prepay_id);
        
        $jsApiParameters = $jsApi->getParameters();

        $WEB_HOST='http://wjr.hzjuym.com';//填写的话 如 http://nicaicai.imwork.net 最后面不用加 /
        $this->assign('HOSTS',$WEB_HOST);
        $this->assign('jsApiParameters',$jsApiParameters);
        $this->display();
        //echo $jsApiParameters;

    }


    public function notify()
    {
        //使用通用通知接口
       $notify = new \Notify_pub();

        //存储微信的回调
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];      

        $notify->saveData($xml);
        

        //验证签名，并回应微信。
        //对后台通知交互时，如果微信收到商户的应答不是成功或超时，微信认为通知失败，
        //微信会通过一定的策略（如30分钟共8次）定期重新发起通知，
        //尽可能提高通知的成功率，但微信不保证通知最终能成功。
        if($notify->checkSign() == FALSE){

            $notify->setReturnParameter("return_code","FAIL");//返回状态码
            $notify->setReturnParameter("return_msg","签名失败了啊");//返回信息
        }else{
            $notify->setReturnParameter("return_code","SUCCESS");//设置返回码
        }
        $returnXml = $notify->returnXml();
        echo $returnXml;
        
        //==商户根据实际情况设置相应的处理流程，此处仅作举例=======
        
        //以log文件形式记录回调信息
         // $log_ = new Log_();
        $log_name= __ROOT__."/Public/notify_url.log";//log文件路径
        
        
        if($notify->checkSign() == TRUE)
        {
            if ($notify->data["return_code"] == "FAIL") {


                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name,"【通信出错】:\n".$xml."\n");
            }
            elseif($notify->data["result_code"] == "FAIL"){
        

                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name,"【业务出错】:\n".$xml."\n");
            }
            else{ 

				/*查看支付成功的返回值请去 https://pay.weixin.qq.com/wiki/doc/api/jsapi.php?chapter=9_1 */

				$xmlss=$notify->data["out_trade_no"];//订单号
				$total_fee=$notify->data['total_fee'];//订单总金额，单位为分，详见支付金额
			    

			    /*更新订单状态这里写数据库的操作*/
			   
				/*更新订单状态这里写数据库的操作*/


                //此处应该更新一下订单状态，商户自行增删操作
                log_result($log_name,"【支付成功】:\n".$xml."\n");
            }
        
            //商户自行增加处理流程,
            //例如：更新订单状态
            //例如：数据库操作
            //例如：推送支付完成信息
        }$unifiedOrder->setParameter("openid",$openid)
    }

    // 打印log
    public function log_result($file,$word)
    {
        $fp = fopen($file,"a");
        flock($fp, LOCK_EX) ;
        fwrite($fp,"执行日期：".strftime("%Y-%m-%d-%H：%M：%S",time())."\n".$word."\n\n");
        flock($fp, LOCK_UN);
        fclose($fp);
    }

}


?>
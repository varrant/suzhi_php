<?php
namespace Home\Controller;
use Think\Controller;
class WxController extends Controller {
    public function index(){

    	//配置接口
    	//获取signature nonce token timestamp echostr 
    	$nonce =$_GET['nonce'];
    	$token ='woniu';
    	$timestamp=$_GET['timestamp'];
    	$echostr=$_GET['echostr'];
    	//形成数组然后按字典排序
    	$array=array();
    	$array=array($nonce,$timestamp,$token);
    	$str=sort(implode('', $array));
    	//拼接成字符串，sha1加密然后与signature进行校验
    	//第一次传的参数带$_GET['echostr'] 第二次就不会带$_GET['echostr'];
    	if ($str==$signature&&$echostr) {
            ob_clean();
    		echo $_GET['echostr'];
    		die;
    	}else{
    		$this->reponseMsg();
    	}
    }
    //接受事件推送病回复
    public function reponseMsg(){
    	//$GLOBALS['HTTP_RAW_POST_DATA'] 能获取特殊的xml格式数据
    	$postArr=$GLOBALS['HTTP_RAW_POST_DATA'] ;
       
        // var_dump($postArr);
    	//处理消息类型 并设置回复类型内容
  //   	<xml>
		// <ToUserName><![CDATA[toUser]]></ToUserName>
		// <FromUserName><![CDATA[FromUser]]></FromUserName>
		// <CreateTime>123456789</CreateTime>
		// <MsgType><![CDATA[event]]></MsgType>
		// <Event><![CDATA[subscribe]]></Event>
		// </xml>
    	// simplexml_load_string 函数吧xml转成对象形式
    	$postObj=simplexml_load_string($postArr,'SimpleXMLElement', LIBXML_NOCDATA);
    	//判断该数据包是否订阅事件推送
       
                    
      

        

    	if(strtolower($postObj->MsgType)=='event'){
    		//自定义菜单事件
            if(strtolower($postObj->Event)=='click'){
                // key=item1
                if (strtolower($postObj->EventKey)=='item1') {
                    $toUser    =$postObj->FromUserName;
                    $FromUser  =$postObj->ToUserName;
                    $timestamp =time();
                    $MsgType   ='text';
                    $content   ='沿着自己的轨迹 慢慢爬行 这世界永远 让人感到那么不安全 我背着自己的家 慢慢的走 ...就躲在壳里哭';
                    //$template这个是模板
                    $template  ="<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[%s]]></MsgType>
                                    <Content><![CDATA[%s]]></Content>
                                    </xml>";
                        // jie          
                        $info= sprintf($template,$toUser,$FromUser,$timestamp,$MsgType,$content );
                        echo $info; 
                    
                }
                //KEY=songs
                 if (strtolower($postObj->EventKey)=='songs') {
                    $toUser    =$postObj->FromUserName;
                    $FromUser  =$postObj->ToUserName;
                    $timestamp =time();
                    $MsgType   ='text';
                    $content   ='有人说最有可能登上巅峰的动物，应该是鹰和蜗牛。那么最有可能成功的人，
                    应该是有实力的人，以及有毅力的人。
                    飞翔是鹰的本能，而且它飞得比许多鸟类都好，
                    可以搏击长空。凭借这样得天独厚的天赋，鹰能够登上巅峰的可能性是最大的。
                    而蜗牛，背着沉重的壳一点一点地挪动，虽然无法预知它何时才能登顶，
                    但是可以肯定的是只要它还有力气，就不会放弃前进。凭借这种不达目的誓不罢休的韧劲，
                    蜗牛有很大的机会成为登顶的黑马选手。';
                    //$template这个是模板
                    $template  ="<xml>
                                    <ToUserName><![CDATA[%s]]></ToUserName>
                                    <FromUserName><![CDATA[%s]]></FromUserName>
                                    <CreateTime>%s</CreateTime>
                                    <MsgType><![CDATA[%s]]></MsgType>
                                    <Content><![CDATA[%s]]></Content>
                                    </xml>";
                        // jie          
                        $info= sprintf($template,$toUser,$FromUser,$timestamp,$MsgType,$content );
                        echo $info; 
                    
                }

            }


            // 微信用户关注
    		if(strtolower($postObj->Event)==subscribe){

    			//回复消息
                $db=M("wxre");
                $map['id']=1;
                $data=$db->where($map)->select();

                 $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
      
                fwrite($myfile, "1111");
               
                fclose($myfile);die;

                $replycontent=$data[0]['replycontent'];
    			$toUser    =$postObj->FromUserName;
    			$FromUser  =$postObj->toUserName;
    			$timestamp =time();
    			$MsgType   ='text';
    			$content   =$replycontent;
    			//$template这个是模板
    			$template  ="<xml>
									<ToUserName><![CDATA[%s]]></ToUserName>
									<FromUserName><![CDATA[%s]]></FromUserName>
									<CreateTime>%s</CreateTime>
									<MsgType><![CDATA[%s]]></MsgType>
									<Content><![CDATA[%s]]></Content>
									</xml>";
						// jie			
						$info= sprintf($template,$toUser,$FromUser,$timestamp,$MsgType,$content );
						echo $info;	
    		}//subscribe end


    	}//if end
    	
    	// 用户发送的是文本消息 进行回复
    	if ((strtolower($postObj->MsgType)=='text')) {
    		
    	
                    header("Content-Type: text/html;charset=utf-8");

                    $db=M("wxre");
                    
                    $ma['keyword']="$postObj->Content";
                    // $ma['keyword']=$postObj->Content;
                  $data_w=$db->where($ma)->select();
                  // 文本回复
                  if($data_w[0]['guotype']=="1"){

                     $content=$data_w[0]['replycontent'];
                
                    $template="<xml>
                    <ToUserName><![CDATA[%s]]></ToUserName>
                    <FromUserName><![CDATA[%s]]></FromUserName>
                    <CreateTime>%s</CreateTime>
                    <MsgType><![CDATA[%s]]></MsgType>
                    <Content><![CDATA[%s]]></Content>
                    </xml>";
                     $fromUser = $postObj->ToUserName;
                     $toUser   =$postObj->FromUserName;
                     $time     =time();
                     
                     $msgType  ='text';
                     echo $info= sprintf($template,$toUser,$fromUser,$time,$msgType,$content);

                  }
                  // 图文回复
                  if ($data_w[0]['guotype']=="2") {


                         $toUser   =$postObj->FromUserName;
                         $fromUser = $postObj->ToUserName;
                          echo $wb=sprintf($data_w[0]['replycontent'],$toUser,$fromUser,time(),'news');            
                  }
                   
    	}


    	
    }//reponseMsg end
    //get 用户基本信息
    function getBaseInfo(){
        //获取code
        //echo 123;
        $APPID='wx5f19fd76503af819';
        //code 会放在 $REDIRECT_URI 地址里面
        $REDIRECT_URI=urlencode("http://wx.hzjuym.com/index.php/home/Wx/getUserOpenId");
    
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$APPID."&redirect_uri=".$REDIRECT_URI."&response_type=code&scope=snsapi_base&state=12E#wechat_redirect";
       
        header('location:'.$url);
        //2获取页面授权的access_token

        //3 拉去用户的openid

    }
    function getUserOpenId(){
        //echo 123;
        //2获取到网页授权的access_token
        $APPID='wx5f19fd76503af819';
        $SECRET='5a3f4279b7362e1430536385853df163';
        $CODE=$_GET['code'];
        
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$APPID."&secret=".$SECRET."&code=".$CODE."&grant_type=authorization_code";
        $a=file_get_contents($url);
        $a=json_decode($a,ture);
      
        var_dump($a);
        //var_dump($a);
        //3拉取用户的openid 唯一性 可以判断 用户参加活动几次

    } 
    //得到用户详细授权
    function getUserDetail(){

        //获取code
        //echo 123;
        $APPID='wx5f19fd76503af819';
        //code 会放在 $REDIRECT_URI 地址里面
        $REDIRECT_URI=urlencode("http://wx.hzjuym.com/index.php/home/Wx/getUserInfo");
    
        $url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$APPID."&redirect_uri=".$REDIRECT_URI."&response_type=code&scope=snsapi_userinfo&state=12E#wechat_redirect";
        header('location:'.$url);
        

        //3 拉去用户的openid

    }

    function getUserInfo(){
     
        //2获取到网页授权的access_token
        $APPID='wx5f19fd76503af819';
        $SECRET='5a3f4279b7362e1430536385853df163';
        $CODE=$_GET['code'];
        $url="https://api.weixin.qq.com/sns/oauth2/access_token?appid=".$APPID."&secret=".$SECRET."&code=".$CODE."&grant_type=authorization_code";

        $res=file_get_contents($url);

        $res=json_decode($res,ture);
        $access_token=$res['access_token'];  
        $openid=$res['openid'];
        
        $url="https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN" ;
        $www=file_get_contents($url);
        
    }
    //$url 解救 url string
    //$type 请求类型 string 
    //res 返回数据类型
    // $arr post 请求参数
    function http_curl($url,$arr=''){
          //初始化
    $curl = curl_init();
    //设置抓取的url
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0); // FALSE 禁止 cURL 验证对等证书
    // var_dump($url);
    //设置头文件的信息作为数据流输出
    curl_setopt($curl, CURLOPT_HEADER, 0);
    //设置获取的信息以文件流的形式返回，而不是直接输出。
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    //设置post方式提交
    curl_setopt($curl, CURLOPT_POST, 1);
    
    curl_setopt($curl, CURLOPT_POSTFIELDS, $arr);
    
    //执行命令
   $tmpInfo = curl_exec($curl);
    //关闭URL请求
    curl_close($curl);
    //显示获得的数据
    
        return $tmpInfo;
      }

    // //得到accesstoken 存储session里面
    function getWxAccessToken(){

        $APPID='wx5f19fd76503af819';
        $SECRET='5a3f4279b7362e1430536385853df163';
        $url= "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=".$APPID."&secret=".$SECRET;
         $db=M('tokentime');
        $data=$db->select();
        $data1=count($data);
        //在没有存在数据库的情况下
            
            if($data){

                // var_dump($data[0]['tokentime']);
                // var_dump(time());

                // var_dump(time()-$data[0]['tokentime']<7000);
                if((time()-$data[0]['tokentime']<7000)){
                     
                     
                    
                       return $data[0]['access_token'];
                    
                        // var_dump($data[0]['access_token']);
                }else{

                    $res=file_get_contents($url);
                    $res=json_decode($res,true);
                    //获取到access_token
                    $access_token=$res['access_token'];
                    //var_dump($access_token);
                    $data_a['access_token']=$access_token;
                    $data_a['tokentime']=time();
                   
                  
                   $map['id']=1;
                    $do=$db->where($map)->save($data_a);
                    return $access_token; 



                }

                
            }



    }


    function definedItem(){
       header("Content-Type: text/html;charset=utf-8");
        $access_token=$this->getWxAccessToken();
        var_dump($access_token);
       $url="https://api.weixin.qq.com/cgi-bin/menu/create?access_token=".$access_token;
        $postArr=array(
                    'button'=>array(
                                
                                array(
                                    'name'=>urlencode('11'),
                                    'type'=>'click',
                                    'key'=>'item1'
                                    ),
                                 array(
                                    'name'=>urlencode('2222'),
                                    'sub_button'=>array(
                                            array(
                                                    'name'=>urlencode('歌曲'),
                                                    'type'=>'click',
                                                    'key'=>'songs',
                                                ),//第一个二级菜单
                                            array(
                                                    'name'=>urlencode('电影'),
                                                    'type'=>'view',
                                                    'url'=>'http://baidu.com',
                                                ),//第二个二级菜单
                                           ),

                                      ),
                                array(
                                    'name'=>urlencode('333'),
                                    'type'=>'view',
                                    'url'=>'http://www.baidu.com'

                                    )//第三个三级菜单

                            ),
                           
                        );
            $postJson=urldecode(json_encode($postArr));
           
           $res= $this->http_curl($url,$postJson);
            // var_dump($res);
    }
    public function test(){
                    $db=M("wxre");

                    
                    $map_wb['keyword']="蜗牛";
                    $data_w=$db->where($map_wb)->select();
                    // var_dump($data_w);


    }
}
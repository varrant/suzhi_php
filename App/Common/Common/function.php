<?php
/*公共函数*/
function show($status,$message,$data=array()){

	$reuslt=array(
			'status'=>$status,
			'message'=>$message,
			'data'=>$data,
		);

	exit(json_encode($reuslt));

}



	// postSMS('13106403223','你的验证码是：12365')
 function postSMS($mobiel,$data)
{

	$post_data = array();
	$post_data['account'] = "chongwu123";
	$post_data['pswd'] ='Chongwu123';
	$post_data['mobile'] = $mobiel;
	$post_data['msg']=$data;
	$url='http://222.73.117.158/msg/HttpBatchSendSM?';
	$o="";
	foreach ($post_data as $k=>$v)
	{
	   $o.= "$k=".urlencode($v)."&";
	}
	$post_data=substr($o,0,-1);
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_URL,$url);
	curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result ;

}

	

    /*
    *功能：对字符串进行加密处理
    *参数一：需要加密的内容
    *参数二：密钥
    */
    function passport_encrypt($str,$key){ //加密函数
     srand((double)microtime() * 1000000);
     $encrypt_key=md5(rand(0, 32000));
     $ctr=0;
     $tmp='';
     for($i=0;$i<strlen($str);$i++){
      $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
      $tmp.=$encrypt_key[$ctr].($str[$i] ^ $encrypt_key[$ctr++]);
     }
     return base64_encode(passport_key($tmp,$key));
    }


    function passport_decrypt($str,$key){ //解密函数

    	 $str=passport_key(base64_decode($str),$key);
    	 $tmp='';
    	 for($i=0;$i<strlen($str);$i++){
    	  $md5=$str[$i];
    	  $tmp.=$str[++$i] ^ $md5;
    	 }
    	 return $tmp;
    	}

    					/*
    		*辅助函数
    		*/
    	function passport_key($str,$encrypt_key){
    		 $encrypt_key=md5($encrypt_key);
    		 $ctr=0;
    		 $tmp='';
    		 for($i=0;$i<strlen($str);$i++){
    		  $ctr=$ctr==strlen($encrypt_key)?0:$ctr;
    		  $tmp.=$str[$i] ^ $encrypt_key[$ctr++];
    		 }
    		 return $tmp;
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



	
	//微信分享 函数
	
	  //票据
    function getWxAccessToken(){
       
             $url='https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid='.C(APPID).'&secret='.C(SECRET); 
             // var_dump($url) ;

           $data=http_curl($url,$arr='');

             // var_dump($data);
             $AccessToken=json_decode($data,TRUE );
            //var_dump($AccessToken);
             $_SESSION['access_token']=$AccessToken['access_token'];
             $_SESSION['access_token_time']=time()+7000;

            
       //var_dump($_SESSION['access_token']);
        return  $_SESSION['access_token'];
         
    }    


     //得到Ticket;
    function getJsApiTicket(){
            $url='https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token='.getWxAccessToken().'&type=jsapi';  
            // var_dump($url);
            $jsapi_ticket=http_curl($url,$arr='');
             $jsapi_ticket=json_decode($jsapi_ticket,TRUE );
            // var_dump($jsapi_ticket);
            return $jsapi_ticket['ticket'];
            // return $jsapi_ticket['access_token'];

            // return $_SESSION['jsapi_ticket']=$this->getWxAccessToken();
        
           
          

    }


     //获取随机码
    function getRandcode(){
        $array=array(
            'A','B','C','D','E','F','G','H','I','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
            'a','b','c','d','e','f','g','h','i','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
            '0','1','2','3','4','5','6','7','8','9','0'
            );
        $max=count($array);
        for ($i=0; $i <=15 ; $i++) { 
            $key=rand(0,$max-1);
            $tmpstr.=$array[$key];
        }
        return  $tmpstr;

    }


function put_file_from_url_content($url, $saveName, $path) {
    // 设置运行时间为无限制
    set_time_limit ( 0 );
    $url = trim ( $url );
    $curl = curl_init ();
    // 设置你需要抓取的URL
    curl_setopt ( $curl, CURLOPT_URL, $url );
    // 设置header
    curl_setopt ( $curl, CURLOPT_HEADER, 0 );
    // 设置cURL 参数，要求结果保存到字符串中还是输出到屏幕上。
    curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
    // 运行cURL，请求网页
    ob_clean();
    $file = curl_exec ( $curl );
    // var_dump( $file);
    // var_dump( $file);
    // var_dump($file);
    // 关闭URL请求
    curl_close ( $curl );
    // 将文件写入获得的数据
    $filename = $path . $saveName;
    $write = @fopen ( $filename, "w" );
    if ($write == false) {
        return false;
    }
    if (fwrite ( $write, $file ) == false) {
        return false;
    }
    if (fclose ( $write ) == false) {
        return false;
    }
 }

     //随机生成四位数
    function fourcode()
    {
        $num="";
        for($i=0;$i<4;$i++){
            $num .= rand(0,9);
         }
         return  $num;
    }

/**
 * 功能：生成二维码
 * @param string $qr_data   手机扫描后要跳转的网址
 * @param string $qr_level  默认纠错比例 分为L、M、Q、H四个等级，H代表最高纠错能力
 * @param string $qr_size   二维码图大小，1－10可选，数字越大图片尺寸越大
 * @param string $save_path 图片存储路径
 * @param string $save_prefix 图片名称前缀
 */
function createQRcode($save_path,$qr_data='PHP QR Code :)',$qr_level='L',$qr_size=4,$save_prefix='qrcode'){
    if(!isset($save_path)) return '';
    //设置生成png图片的路径
    $PNG_TEMP_DIR = & $save_path;
    //导入二维码核心程序
    vendor('PHPQRcode.class#phpqrcode');  //注意这里的大小写哦，不然会出现找不到类，PHPQRcode是文件夹名字，class#phpqrcode就代表class.phpqrcode.php文件名
    //检测并创建生成文件夹
    if (!file_exists($PNG_TEMP_DIR)){
        mkdir($PNG_TEMP_DIR);
    }
    $filename = $PNG_TEMP_DIR.'test.png';
    $errorCorrectionLevel = 'L';
    if (isset($qr_level) && in_array($qr_level, array('L','M','Q','H'))){
        $errorCorrectionLevel = & $qr_level;
    }
    $matrixPointSize = 4;
    if (isset($qr_size)){
        $matrixPointSize = & min(max((int)$qr_size, 1), 10);
    }

    if (isset($qr_data)) {

        if (trim($qr_data) == ''){
            die('data cannot be empty!');
        }
        //生成文件名 文件路径+图片名字前缀+md5(名称)+.png
        $filename = $PNG_TEMP_DIR.$save_prefix.md5($qr_data.'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        //开始生成
        QRcode::png($qr_data, $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    } else {
        //默认生成
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);
    }

    if(file_exists($PNG_TEMP_DIR.basename($filename)))
        return basename($filename);
    else
        return FALSE;
}

/*封装二维码 
  $src_path 二维码 
  $type_path图片类型
  $position 职位
  $salary  薪资待遇
  $fringe  福利待遇 
*/
function fcode($src_path, $type_path, $position, $salary, $fringe ){
	 $dst_path = 'Public/img/bei.jpg';
	// $src_path = '2.png';
	 $type_path= 'Public/img/'.$type_path;


	//创建图片的实例

	$dst = imagecreatefromstring(file_get_contents($dst_path));
     
    $src_path=substr($src_path, 1); 
   
	$src = imagecreatefromstring(file_get_contents($src_path));
	$type = imagecreatefromstring(file_get_contents($type_path));
	//打上文字
	$font = 'Public/fonts/msyh.ttf';//字体
	$black= imagecolorallocate($dst, 0x00, 0x00, 0x00);//字体颜色
	$golden= imagecolorallocate($dst, 253,135,025);//字体颜色
	imagefttext($dst, 12, 0, 16, 30, $black, $font,  $position);
	imagefttext($dst, 12, 0, 16, 85, $black, $font, '薪资待遇');
	imagefttext($dst, 12, 0, 280, 85, $golden, $font, $salary.'元 / 天');
	imagefttext($dst, 12, 0, 16, 135, $black, $font, '福利待遇');
	imagefttext($dst, 12, 0, 160, 135, $golden, $font,$fringe );
	imagefttext($dst, 12, 0, 126, 490, $black , $font, '扫码查看详情');
	// var_dump(file_get_contents($src_path));
	//获取水印图片的宽高
	list($src_w, $src_h) = getimagesize($src_path);
	//将水印图片复制到目标图片上，最后个参数50是设置透明度，这里实现半透明效果
	/*40是左右 250 距离顶部 200 shi图片高宽 100 是水印的 透明度*/
	imagecopyresampled($dst, $src, 108, 310, 0, 0, 140, 140, 424, 424); 
	// imagecopymerge($dst, $src, 40, 250, 0,0, 200, 200, 100);
	imagecopymerge($dst, $type, 100, 16, 0,0, 32, 16, 100);
	//如果水印图片本身带透明色，则使用imagecopy方法
	//imagecopy($dst, $src, 10, 10, 0, 0, $src_w, $src_h);
	//输出图片

	list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
	switch ($dst_type) {
	    case 1://GIF
	        // header('Content-Type: image/gif');
	        // imagegif($dst);
  
	        break;
	    case 2://JPG
	        // header('Content-Type: image/jpeg');
            $img_addre='Public/codeer/re'.time().'.jpg';
	        imagejpeg($dst, $img_addre);
	       
	    case 3://PNG
	        // header('Content-Type: image/png');
	        // imagepng($dst);
      
	        break;
	    default:
	        break;
	}
	imagedestroy($dst);
	imagedestroy($src);

	return $img_addre;

}
/**
 * 上传图片
 * create by wuguangyun
 */
function uploadPic($img){
    $expData = explode(';',$img);
    $postfix   = explode(':',$expData[0]);
    $type = $postfix[1];
    switch($type){
        case 'image/png':
            $ext='.png';
            break;
        case 'image/jpeg';
            $ext='.jpeg';
            break;
        case 'image/jpeg':
            $ext='.jpg';
            break;
        case 'image/bmp':
            $ext='.bmp';
            break;
        default:
            $ext='.jpg';
    }
    $r = rand(10,1000);
    $file_path='uploads/images/'.time().'_'.$r.$ext;
    $img_content = str_replace('data:'.$type.';base64,','',$img);
    $img_content = base64_decode($img_content);
    $res = file_put_contents($file_path,$img_content);
    if($res){
        return "/".$file_path;
    }
    return $res;
}
/**
 * 该方法用上了英文字母、年月日、Unix 时间戳和微秒数、随机数，重复的可能性大大降低，还是很不错的。使用字母很有代表性，一个字母对应一个年份，总共16位
 */
 function createOrderId() {
    $yCode = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J');
    $orderSn = $yCode[intval(date('Y')) - 2011] . strtoupper(dechex(date('m'))) . date('d') . substr(time(), -5) . substr(microtime(), 2, 5) . sprintf('%02d', rand(0, 99));
    return $orderSn;
}





?>
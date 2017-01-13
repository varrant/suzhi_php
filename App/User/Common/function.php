<?php
/*身份证扫描*/
function cardrec($picaddre){
  	header("Content-type: text/html; charset=utf-8"); 
    $host = "http://jisusfzsb.market.alicloudapi.com";
    $path = "/idcardrecognition/recognize";
    $method = "POST";
    $appcode = "d3c82c0dd9ec43d0aaa73242baaeb6c7";
    $headers = array();
    array_push($headers, "Authorization:APPCODE " . $appcode);
    //根据API的要求，定义相对应的Content-Type
    array_push($headers, "Content-Type".":"."application/x-www-form-urlencoded; charset=UTF-8");
    $querys = "typeid=2";
    $imgtxt = file_get_contents($picaddre);
    $aa= base64_encode($imgtxt);
    $bodys ='pic='.urlencode($aa);
    $url = $host . $path . "?" . $querys;
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, false);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }

   curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);

   	return curl_exec($curl);
}
    /*获取openid*/
    function getopenid($url){
        $oCurl = curl_init();
        if(stripos($url,"https://")!==FALSE){
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($oCurl, CURLOPT_SSL_VERIFYHOST, FALSE);
            curl_setopt($oCurl, CURLOPT_SSLVERSION, 1); //CURL_SSLVERSION_TLSv1
        }
        curl_setopt($oCurl, CURLOPT_URL, $url);
        curl_setopt($oCurl, CURLOPT_RETURNTRANSFER, 1 );
        $sContent = curl_exec($oCurl);
        $aStatus = curl_getinfo($oCurl);
        curl_close($oCurl);
        $res=json_decode($sContent,true);
        return $res['openid'];
    }

?>
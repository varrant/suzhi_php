<?php
return array(
	//'配置项'=>'配置值'
	 define('WEB_HOST', 'http://suzhi.hzjuym.com'),
	'WxConfig'=>array(
        'APPID' => 'wx861438b92b0b0ba9',
        'MCHID' => '1423681202',
        'KEY' => 'SUZ2016SUZ2016SUZ2016SUZ2016SUZ2',
        'APPSECRET' => 'b6099da3b28fc9572ed2084819e2c7cc',
        'JS_API_CALL_URL' => WEB_HOST.'/index.php/Home/Wxpay/index',
        'SSLCERT_PATH' => WEB_HOST.'/ThinkPHP/Library/Vendor/Weixinpay/cacert/apiclient_cert.pem',
        'SSLKEY_PATH'  => WEB_HOST.'/ThinkPHP/Library/Vendor/Weixinpay/cacert/cacert/apiclient_key.pem',
        'NOTIFY_URL' =>  WEB_HOST.'/index.php/Home/Wxpay/notify',
        'CURL_TIMEOUT' => 30
    ),
    
    'APPID' => 'wx861438b92b0b0ba9',
    'APPSECRET' => 'b6099da3b28fc9572ed2084819e2c7cc',

);
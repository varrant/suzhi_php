<?php
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
    $imgtxt = file_get_contents('1477190594477.jpg');
    $aa= base64_encode($imgtxt);
    // $image_file = '1477190594477.jpg';
    // $image_info = getimagesize($image_file);
    // $base64_image_content = "data:{$image_info['mime']};base64," . chunk_split(base64_encode(file_get_contents($image_file)));
    // echo($base64_image_content);
    $bodys ='pic='.urlencode($aa);
    // $bodys = "{\"inputs\":[{\"image\":{\"dataType\":50,\"dataValue\":\"$base64_image_content\"},\"configure\":{\"dataType\":50,\"dataValue\":\"{\\\"side\\\":\\\"face\\\"}\"}}]}";
    var_dump($bodys);
    // var_dump($bodys);
    $url = $host . $path . "?" . $querys;
    var_dump($url);
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_FAILONERROR, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, true);
    if (1 == strpos("$".$host, "https://"))
    {
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    }

   curl_setopt($curl, CURLOPT_POSTFIELDS, $bodys);

    var_dump(curl_exec($curl));
?>
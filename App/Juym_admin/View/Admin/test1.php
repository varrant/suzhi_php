<?php


$url="https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=HI7k0fNVXlhDtoSQZ5WWoK3ATt1xGbcAaoqLgpYC2KbK_WTKD1RDcNTli50iCuTMT83DBo9cn-N-iFZtVYgFbHB4Gdxjy8GpkMW1w8eHhNSpKuTm80yNBgaev97baU9lRYBcAIADKN";

// $postJosnData="{ 'type':'news','offset':0, 'count':2}";

 	// $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postJosnData);    
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);  
    $data = curl_exec($ch);
    var_dump($data);  
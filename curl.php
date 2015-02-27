<?php
    $urlWithoutProtocol = "http://topsshoponline.tops.co.th/p/Mitrphol-Refined-White-Sugar-1kg";
    $request         = "";
    $isRequestHeader = false;
 
    $exHeaderInfoArr   = array();
    $exHeaderInfoArr[] = "Content-type: text/xml";
    $exHeaderInfoArr[] = "Authorization: "."Basic ".base64_encode("authen_user:authen_pwd");
 
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $urlWithoutProtocol);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    curl_setopt($ch, CURLOPT_HEADER, (($isRequestHeader) ? 1 : 0));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    if( is_array($exHeaderInfo) && !empty($exHeaderInfo) )
    {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $exHeaderInfo);
    }
    $response = curl_exec($ch);
    curl_close($ch);
 
    echo $response;
?>
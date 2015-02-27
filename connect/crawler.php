<?php
$queue = array();
$d_list = array();

function formatUrlsInText($text){
   // $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
    $reg_exUrl= "/\/d\/[a-zA-Z0-9\_\-\.]+/";
    preg_match_all($reg_exUrl, $text, $matches);
    $usedPatterns = array();
    foreach($matches[0] as $pattern){
    	var_dump($pattern);
    }
        
}

function crawl($url)
{
	$content = file_get_contents($url);
	$urls = array();
	formatUrlsInText($content);
}

$urls = crawl("http://topsshoponline.tops.co.th");


?>
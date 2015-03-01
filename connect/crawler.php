<?php

include("collect.php");




function getDUrlsInText($text){
    $urls = array();
    $reg_exUrl= "/\/d\/[a-zA-Z0-9\_\-\.]+/";
    preg_match_all($reg_exUrl, $text, $matches);
    $usedPatterns = array();
    foreach($matches[0] as $pattern){
    	$urls[] = $pattern;
    }
    return $urls;
}

function getPUrlsInText($text){
    $urls = array();
    $reg_exUrl= "/\/p\/[a-zA-Z0-9\_\-\.\/]+/";
    preg_match_all($reg_exUrl, $text, $matches);
    $usedPatterns = array();
    foreach($matches[0] as $pattern){
        $urls[] = $pattern;
    }
    return $urls;
}

function isValidDPage($text){
    return (strpos($text,"search-no-results-th")===false);
}

function getDataFromWeb(){
    $conn = new mysqli("localhost", "root","3edcCDE#","ebasket");

    $baseUrl = 'http://topsshoponline.tops.co.th'; 
    $dPartList = array_unique(getDUrlsInText(file_get_contents($baseUrl)));
    $pPartList = array();
    $count =1;
    foreach($dPartList as $dPart)
    {
        //if($count==2)break;
        $dUrl = $baseUrl.$dPart."?page=";
        for($i=0;$i<100;$i++)
        {
            $dUrl2 = $dUrl.$i;
            $dPage = file_get_contents($dUrl2);
            if(!isValidDPage($dPage))
            {
                break;
            }
            $pPartList = array_unique(array_merge($pPartList,getPUrlsInText($dPage)));
        }
        echo 'D '.$count.'/'.count($dPartList)."\n" ;
        $count++;
    }

    $count =1;
    foreach($pPartList as $pPart)
    {
       // if($count==2)break;
        $pUrl = $baseUrl.$pPart;
        $result=collectDataFromPage(file_get_contents($pUrl));
        echo 'P '.$count.'/'.count($pPartList)."\n" ;
        $count++;

        $conn->query("INSERT INTO products (barcode,pname,price) VALUES ('".$result['barcode']."','".$result['name']."',".$result['price'].")");


    }

    //return $result;
    $conn->close();
}
echo "GOGO\n";
getDataFromWeb();

?>
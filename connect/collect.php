<?php

$lines = array();
$file = fopen("example.html", "r");
while(!feof($file)){
    $line = fgets($file);
    $lines[] = $line;
}
fclose($file);

$barcode ="";
$name = "";
$price =0;

foreach($lines as $line)
{
	// find barcode
	$barcodebefore = '<meta property="og:image" content="http://topsshoponline.tops.co.th/productimages/lpimage/';
	$posbar = strpos($line,$barcodebefore);
	if($posbar!==false)
	{
		$barcode = substr($line,$posbar+strlen($barcodebefore),13);
	}

	//find price
	$priceafter = ' บาท';
	$posafprice = strpos($line, $priceafter);
	if($posafprice !== false)
	{
		$price1 = substr($line, 0, $posafprice-1);
		$posbeprice = strrpos($price1,' ');
		if($posbeprice !== false)
		{
			$price = floatval(substr($price1,$posbeprice));
		}
	}

	//find name
	$namebefore = '<meta property="og:url" content="http://topsshoponline.tops.co.th/p/';
	$posname = stripos($line, $namebefore);
	if($posname !== false)
	{
		$name1 = substr($line, $posname+strlen($namebefore));
		$posname = strpos($name1, '"');
		if($posname !== false)
		{
			$name2 = substr($name1,0,$posname);

			while(true)
			{
				$posslash = strpos($name2,'/');
				if($posslash === false)
				{
					break;
				}
				$name2 = substr($name2,$posslash+1);
			}

			$name = str_replace("-", " ", $name2);
		}
	}
}

echo $barcode." ";
echo $name." ";
echo $price." ";


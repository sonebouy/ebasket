<?php
	$objConnect = mysql_connect("localhost","wonderworl","3WQMt_4-dp");
	$objDB = mysql_select_db("wonderworl_ebasket");

	$strSQL = "SELECT * FROM products";

	$objQuery = mysql_query($strSQL);
	
	while(true){
		$obResult = mysql_fetch_array($objQuery);

		if(!$obResult)	break;

		$arr["Name"] = $obResult["name"];
		$arr["Price"] = $obResult["price"];
		echo json_encode($arr);
	}

	mysql_close($objConnect);
	
?>

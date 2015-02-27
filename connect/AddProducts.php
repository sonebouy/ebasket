<html>
<head>
	<meta charset="utf-8">
</head>
<?php
	include('db.php');
		
	mysql_query("INSERT INTO products ( barcode, name, price, did ) VALUES ('".$_POST['barcode']."', '".$_POST['name']."', '".$_POST['price']."', '".$_POST['did']."')",$con) or die ("<script> alert('Username/E-mail นี้มึคนอื่นใช้แล้ว'); window.location='../register.php'; </script>");
	header("Location:../index.php");
?>

</html>
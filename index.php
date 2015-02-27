<!DOCTYPE html>
<html lang="en">
	<head> 
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
		<meta charset="utf-8">
		<title>Add Products</title>
		<link href="css/AddProducts.css" rel="stylesheet">
	</head>
	<body>
		<br>
		<div class="container">
  			<div class="row">
  				<div class="col-md-8">
  					<div class="container">
					    <div class="row" >
					        <div class="span4 offset4 well" style="padding-bottom:0px;">
					            <legend>Add Products</legend>
					            <form method="POST" action="connect/AddProducts.php" accept-charset="UTF-8">
					           	<input type="text" id="barcode" class="span4" name="barcode" placeholder="barcode">
					           	<input type="text" id="name" class="span4" name="name" placeholder="name">
					           	<input type="text" id="price" class="span4" name="price" placeholder="price">
					           	<input type="text" id="did" class="span4" name="did" placeholder="did">
					         
					            <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>
					            </form>

					            <form method="POST" action="connect/AddFromTops.php" accept-charset="UTF-8">
					            	<button type="submit" name="GetWeb" class="btn btn-info btn-block">GetWeb</button>
					            </form>
					        </div>
					    </div>
					</div>
  				</div>
  			</div>
		</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
	</body>
</html>
<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>
		
</head>
<body>

<?php include "navigation.php";?>

<?php $servername = "localhost";
$username = "root";
$password = "";
$db_name = "click_dev";


// Create connection
$conn = mysqli_connect($servername, $username , $password ,$db_name);

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$SQL = "SELECT * 
		FROM customer
		ORDER BY F_NAME ASC ";

$result = mysqli_query($conn, $SQL);

if (mysqli_num_rows($result) > 0) {
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
	{
		$f_name = $row['F_NAME'];
		$s_name = $row['S_NAME'];
		$p_code = $row['POSTCODE'];	
		$tel = $row['TEL_NUM'];
		$email = $row['EMAIL'];
	}
}
?>

<form name="myform" action="customerform.php" method="POST"> 
	  <div class="panel panel-primary">
	  	
		 <div class="panel-heading"><h3>2Click booking form</h3></div>
		  <div class="panel-body">
		  	<div class="row">
			    <div class="col-sm-5">
			   	 <input type="text" class="form-control" id="search" name="search">
			   	 <script>
			   		$( ".search	" ).autocomplete({
			   		source: [ "$s_name" ]
			   		});
			   	 </script>
			    </div>
			    <button class="btn btn-primary" type="submit" id="submit" placeholder="search for order ...">Search</button>
			 </div>
		</div>
	</div>	
</form>	
<button class="btn btn-primary" type="submit" id="addNew" onclick="window.location='form.php'">Add new order</button>
</div>		    
</body>
</html>
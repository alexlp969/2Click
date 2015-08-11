<?php
class functions
{
	 public $servername;
	 public $username;
	 public $password;
	 public $db_name;
	 public $conn;
	 
	 
	public function head_links ($title)
	{
		echo '<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
				<meta name="description" content="">
				
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

				<!-- Optional theme -->
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
				
				<!-- Latest compiled and minified JavaScript -->
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
				 
				<script src="//code.jquery.com/jquery-1.10.2.js"></script>
				<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
				
				<title>'.$title.'</title>';
		
		error_reporting(E_ERROR | E_WARNING | E_PARSE);
	}
	public function nav_bar()
	{
		
		echo '
			<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			</button>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
			<li><a href="../search/index.php">Existing Customers</a></li>
			<li><a href="../newCustomer/index.php">Add New Customer</a></li>
			<li><a href="../Excel/index.php">Upload Excel Form</a></li>				
		    </ul>
			</div><!--/.nav-collapse -->
			</div>
			</nav>
			<br>
			<br>
			<br> ';
	}
	public function customer_tabs()
	{
		echo'<div id="tabs">
				<ul class="nav nav-tabs">
				<li role="presentation"><a href="#tabs-1">User details</a></li>
				<li role="presentation"><a href="#tabs-2">Product</a></li>
				<li role="presentation"><a href="#tabs-3">Job Description</a></li>
				<li role="presentation"><a href="#tabs-4">Invoice</a></li>
				</ul>';
	}
	public function open_connection()
	{
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name = "click_dev";
		
		
		// Create connection
		$conn = mysqli_connect($servername, $username , $password ,$db_name);
		
		// Check connection
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
	}
	
}

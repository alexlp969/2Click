<html>
<head>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
 
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<?php 
include "navigation.php";  
	
$customer_number = htmlspecialchars($_GET["customer_num"]);

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
?>

  <script>
$(function() {
$( "#tabs" ).tabs();
});
</script>

<script>
function cancel()
{
	window.location="../search/index.php";
}

</script>

<?php require 'databaseConnect.php';?>
</head>
<body>
<div id="tabs">
<ul class="nav nav-tabs">
<li role="presentation"><a href="#tabs-1">User details</a></li>
<li role="presentation"><a href="#tabs-2">Product</a></li>
<li role="presentation"><a href="#tabs-3">Job Description</a></li>
</ul>
<div id="tabs-1" class="panel panel-primary">
		  	<?php 
		  	$userdetailsSQL = "SELECT * FROM customer WHERE CUSTOMER_NUM='$customer_number'";
		  	$result = mysqli_query($conn, $userdetailsSQL);
		  
		  			// output data of each row
//var_dump($userdetailsSQL);
		  	
		  				while($row = mysqli_fetch_assoc($result)) {
		  					$f_name = $row['F_NAME'];
		  					$s_name = $row['S_NAME'];
		  					$p_code = $row['POSTCODE'];
		  					$email = $row['EMAIL'];
		  					$tel = $row['TEL_NUM'];
		  					$customer_number = $row['CUSTOMER_NUM'];
		  					$address = $row['ADDRESS'];
		  						
		  					
		  					$equipmentSQL = "SELECT * FROM equipment WHERE CUSTOMER_NUM='$customer_number'";
		  					$result2 = mysqli_query($conn, $equipmentSQL);
		  					
		  					$row2 = mysqli_fetch_assoc($result2);
		
		  					$equipment = $row2['EQUIPMENT'];
		  					$make = $row2['MAKE'];
		  					$cable = $row2['CABLE'];
		  					$charger = $row2['CHARGER'];
		  					$case = $row2['C_ACE'];
		  					$cd = $row2['CD'];
		  					$manual = $row2['MANUAL'];
		  					$additional = $row2['ADDITIONAL'];
		  					$job_ref = $row2['JOB_REF'];
		  					$created = $row2['CREATED'];
		  					$dateIn = explode(" ", $created);
		  					
		  					$jobDescriptionSQL = "SELECT * FROM product WHERE JOB_REF='$job_ref'";
		  					$result3 = mysqli_query($conn, $jobDescriptionSQL);
		  					
		  					$row3 = mysqli_fetch_assoc($result3);
		  					
		  					$description = $row3['DESCRIPTION'];					
		  		
		  		
		  		
		  					
	echo ' <div class="panel-heading">User details</div>
	    	  <div class="panel-body">
			<div class="row">
		  		<form action="editFunctions.php" method="POST">
				    <label class="col-sm-1">Forname:</label>
				    <div class="col-sm-3">
				   	 <input type="text" class="form-control" id="f_name" name="f_name" value="'.$f_name.' ">
				    </div>
				    <label class="col-sm-1">Surname:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="s_name" name="s_name" value="'.$s_name.'">
				    </div>
				 <label class="col-sm-1">Customer number</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="customer_num" name="customer_num" readonly="readonly" value="'.$customer_number.'" >
			    	</div>
				    
			    </div>
			    <div class="row"><br></div>
			    <div class="row">
			    <label class="col-sm-1">Postcode:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="postcode" name="postcode" value="'.$p_code.'">
				    </div>
			    	<label class="col-sm-1">Telephone Number:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Telephone Number" value="'.$tel.'">
			    	</div>
			    	<label class="col-sm-1">Email:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Email" value="'.$email.'">
			    	</div>
			    </div>
				  <div class="row"><br></div>
					<div class="row">
			  		<label class="col-sm-1">Address:</label>
			    	<div class="col-sm-10">
			    		<textarea type="text" class="form-control" id="address" name="address" placeholder="Address" >' .$address .'</textarea>
			    	</div>
			  		</div>							    
			  </div>
			  
</div>
<div id="tabs-2" class="panel panel-primary">
			 <div class="panel-heading">Product</div>
			  <div class="panel-body">
			  <div class="row">
				    <label class="col-sm-1">Equipment:</label>
				    <div class="col-sm-3">
				   	 <input type="text" class="form-control" id="equipment" name="equipment" placeholder="Equipment" value="'.$equipment.'">
				    </div>
				    <label class="col-sm-1">Make:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="make" name="make" placeholder="Make" value="'.$make.'">
				    </div>	
			    	<label class="col-sm-1">Job Reference:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="job_ref" name="job_ref" placeholder="job" readonly="readonly" value="'.$job_ref.'">
			    	</div>				    		    
			    </div>
			    <div class="row"><br></div>
			    <div class="row">
			   
			    	<label class="col-sm-1">Charger:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="charger" name="charger" placeholder="Charger" value="'.$charger.'">
			    	</div>
			    	<label class="col-sm-1">Case:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="case" name="case" placeholder="Case"  value="'.$case.'">
			    	</div>
			    	 <label class="col-sm-1">CD:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="cd" name="cd" placeholder="CD" value="'.$cd.'">
			    	</div>
			    </div>
			     <div class="row"><br></div>
			    <div class="row">
			    <label class="col-sm-1">Cable:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="cable" name="cable" placeholder="Cable" value="'.$cable.'">
				    </div>	
			    	<label class="col-sm-1">Manual:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="manual" name="manual" placeholder="Manual" value="'.$manual.'">
			    	</div>
			    	<label class="col-sm-1">Additional:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="additional" name="additional" placeholder="Additional" value="'.$additional.'">
			    	</div>
			    </div>
			    </div>		
</div>
<div id="tabs-3" class="panel panel-primary">	
			 <div class="panel-heading">Job Description</div>
			  <div class="panel-body">
			  <div class="row">			   
			    	<label class="col-sm-1">Job Description:</label>
			    	<div class="col-sm-6">
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description" >' . $description . '</textarea>
			    	</div>
			   	</div>		 
			  </div>
		</div>
 	  </div>
			    			
			 
			    			  <button class="btn btn-primary" type="submit" id="edit"  > Save </button>
		</form>	    
			    			  <button class="btn" type="submit" id="cancel" href="search.php" onclick='."window.location='../search/index.php'".'>Cancel</button>	

   </div>	
</div>
</div>
</div>';
		  				}
		  	
		  	?>
		  	
			

	</body>
</html>
				    
		  

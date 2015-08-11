<html>
<head>
<?php 
include "../classes/functions.php";

$display_logic = new functions();
$display_logic -> head_links('Add a new customer');
$display_logic -> nav_bar();
?>

  <script>
$(function() {
$( "#tabs" ).tabs();
});
</script>
 
<script>
function cancel()
{
	window.location="search.php";
}
</script>



<?php require '../databaseConnect.php';?>
</head>
<body>
<div id="tabs">
<ul class="nav nav-tabs">
<li role="presentation"><a href="#tabs-1">User details</a></li>
<li role="presentation"><a href="#tabs-2">Product</a></li>
<li role="presentation"><a href="#tabs-3">Job Description</a></li>
</ul>
<?php 
if(isset($_GET['msg']))
{
	$msg = $_GET['msg'];
	if($msg == '1')
	{
		echo'<div class="alert alert-success" role="alert" style="margin-bottom: 0px;">Record saved successfully</div>';
	}
	elseif($msg == '2')
	{
		echo'<div class="alert alert-danger" role="alert" style="margin-bottom: 0px;"><b>ERROR: </b> Record could not be saved </div>';
	}
}


$S_numbers = rand(1, 100000);

for($i = 0; $i < 1; $i++)
{
	$customerID = 'C'.$S_numbers;
}

$numbers = rand(100, 100000);

for($i = 0; $i < 1; $i++)
{
	$reference = 'R'.$numbers;
}



?>
<div id="tabs-1" class="panel panel-primary">
		  	
			 <div class="panel-heading">User details</div>
			  <div class="panel-body">
			<div class="row">
			<form action="formFunctions.php" method="POST">

			    <label class="col-sm-1">Forname:</label>
			    <div class="col-sm-3">
			   	 <input type="text" class="form-control" id="f_name" name="f_name" placeholder="Forname">
			    </div>
			    <label class="col-sm-1">Surname:</label>
			    <div class="col-sm-3">
			    	<input type="text" class="form-control" id="s_name" name="s_name" placeholder="Surname">
			    </div>
			     <label class="col-sm-1">Customer number</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="customer_num" name="customer_num" readonly="readonly" value="<?php echo $customerID; ?>" >
			    	</div>  
			   
			    
		    </div>
		    <div class="row"><br></div>
		    <div class="row">
		     		   <label class="col-sm-1">Telephone Number:</label>
		    	<div class="col-sm-3">
		    		<input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Telephone Number">
		    	</div>  
		    	<label class="col-sm-1">Email:</label>
		    	<div class="col-sm-3">
		    		<input type="text" class="form-control" id="email" name="email" placeholder="Email">
		    	</div>
		    	<label class="col-sm-1">Postcode:</label>
			    <div class="col-sm-3">
			    	<input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode">
			    </div>
			    </div>
			    <div class="row"><br></div>
			    <div class="row">			    
		    	<label class="col-sm-1">Address:</label>
			    	<div class="col-sm-10">
			    		<textarea type="text" class="form-control" id="address" name="address" placeholder="Address"></textarea>
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
				   	 <input type="text" class="form-control" id="equipment" name="equipment" placeholder="Equipment">
				    </div>
				    <label class="col-sm-1">Make:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="make" name="make" placeholder="Make">
				    </div>	
				     <label class="col-sm-1">Cable:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="cable" name="cable" placeholder="Cable">
				    </div>			    
			    </div>
			    <div class="row"><br></div>
			    <div class="row">
			   
			    	<label class="col-sm-1">Charger:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="charger" name="charger" placeholder="Charger">
			    	</div>
			    	<label class="col-sm-1">Case:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="case" name="case" placeholder="Case">
			    	</div>
			    	 <label class="col-sm-1">CD's:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="cd" name="cd" placeholder="CD's">
			    	</div>
			    </div>
			     <div class="row"><br></div>
			    <div class="row">
			   
			    	<label class="col-sm-1">Manual:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="manual" name="manual" placeholder="Manual">
			    	</div>
			    	<label class="col-sm-1">Additional:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="additional" name="additional" placeholder="Additional">
			    		<input type="hidden" id="customer_num" name="customer_num" value="<?php echo $customerID?>">
			    		<input type="hidden" id="job_ref" name="job_ref" value="<?php echo $reference; ?>">
			    	</div>
			    </div>
			   
  </div>
			 
</div>
<div id="tabs-3" class="panel panel-primary">	
			 <div class="panel-heading">Job Description</div>
			  <div class="panel-body">
			  <div class="row">		
			  <label class="col-sm-1">Job_Ref</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="job_ref" name="job_ref" readonly="readonly" value="<?php echo $reference; ?>" >
			    	</div>   			    	
			   	</div>
			   	<div class="row">	
			   	<br>
			   	</div>
			   	<div class="row">	
			   	<label class="col-sm-1">Job Description:</label>
			    	<div class="col-sm-6">
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description"></textarea>
			    	</div>
			   	</div>
			  </div>
			 </div>  	
			     <button class="btn btn-primary" type="submit" id="submit">Submit</button>
			   
			  </form>
			 
			  	 <button class="btn" id="cancel" onclick="cancel();">Cancel</button>
	</div>
   </div>	
</div>
</div>
</div>

	</body>
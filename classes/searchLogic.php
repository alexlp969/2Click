<?php
class searchLogic
{
		public $action;	
		public $search;
		public $con;
		public $multiAction;
	
	
		function __construct()
		{
				
					$this->action = $_POST['action'];
					$this->search = $_POST['search'];		
					$this->multiAction = $_GET['multiAction'];	
		}
		
		private function DB()
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
	
		function logic()
		{
			 if($this->action == "search")
			 {
				$this->customerForm();
			}
			elseif($this->multiAction == "search")
			{
				$this->customerForm();				
			}
			else
			{
				$this->displayLogic();
			}
		}
		
		function customerForm()
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
			
			echo'<div id="tabs">
					<ul class="nav nav-tabs">
					<li role="presentation"><a href="#tabs-1">User details</a></li>
					<li role="presentation"><a href="#tabs-2">Product</a></li>
					<li role="presentation"><a href="#tabs-3">Job Description</a></li>
					<li role="presentation"><a href="#tabs-4">Invoice</a></li>
					</ul>
				<div id="tabs-1" class="panel panel-primary">';
			
			if(isset($_GET['msg']))
			{
				$msg = $_GET['msg'];
				if($msg == '1')
				{
					echo'<div class="alert alert-success" role="alert" style="margin-bottom: 0px;">Record UPDATED successfully</div>';
				}
				elseif($msg == '2')
				{
					echo'<div class="alert alert-danger" role="alert" style="margin-bottom: 0px;"><b>ERROR: </b> Record could not be UPDATED </div>';
				}
			}
				if($_GET["customer_num"])
			{
				$this->search = $_GET['customer_num'];
			}
			 
			 
			$userdetailsSQL = "SELECT * FROM customer WHERE S_NAME='$this->search' OR F_NAME='$this->search' OR CUSTOMER_NUM='$this->search'";
			$result = mysqli_query($conn, $userdetailsSQL);
			
		
		
			// output data of each row
			
			$row_count = mysqli_num_rows($result);
			 
			 
			 
			if($row_count > 1)
			 {
			
		
			echo'<div class="panel-heading">Multiple users</div>
					<div class="panel-body">
						<table class="table table-hover">
						<tr>
			<td>Customer name</td>
			<td>Customer ID</td>
			</tr>';
			while($row = mysqli_fetch_assoc($result)) {
			$f_name = $row['F_NAME'];
			$s_name = $row['S_NAME'];
			$customer_number = $row['CUSTOMER_NUM'];
				
				
			echo'	<tr>
			<td><a href="index.php?multiAction='.'search'.'&customer_num='.$customer_number.'">'.$f_name . ' ' . $s_name.'</a></td>
			<td>'.$customer_number.'</td>
			
			</tr>';
			}
			echo'					</table>
			</div>
			</div>';
			
			} else {
				
			while($row = mysqli_fetch_assoc($result)) {
		  					$f_name = $row['F_NAME'];
		  					$s_name = $row['S_NAME'];
		  					$p_code = $row['POSTCODE'];
		  					$email = $row['EMAIL'];
		  					$tel = $row['TEL_NUM'];
		  					$customer_number = $row['CUSTOMER_NUM'];
		  					$address = $row['ADDRESS'];
		  					
		  					
		  					$equipmentSQL = "SELECT * FROM equipment WHERE CUSTOMER_NUM='$customer_number'";
		  					$result2 = mysqli_query($conn, $equipmentSQL) or die(mysqli_error());
		  					
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
		  					
		  					
		  					echo'	<script>
									function edit()
									{
										window.location="../edit.php?customer_num='.$customer_number.'";
									}
									</script>';
				
			echo ' <div class="panel-heading">User details</div>
			  <div class="panel-body">
			<div class="row">
				    <label class="col-sm-1">Forname:</label>
				    <div class="col-sm-3">
				   	 <input type="text" class="form-control" id="f_name" name="f_name" readonly="readonly" value="'.$f_name.' ">
				    </div>
				    <label class="col-sm-1">Surname:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="s_name" name="s_name" readonly="readonly" value="'.$s_name.'">
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
				    	<input type="text" class="form-control" id="postcode" name="postcode" readonly="readonly" value="'.$p_code.'">
				    </div>
			    	<label class="col-sm-1">Telephone Number:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Telephone Number" readonly="readonly" value="'.$tel.'">
			    	</div>
			    	<label class="col-sm-1">Email:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Email" readonly="readonly" value="'.$email.'">
			    	</div>
			    </div>
				  <div class="row"><br></div>
					<div class="row">
			  		<label class="col-sm-1">Address:</label>
			    	<div class="col-sm-10">
			    		<textarea type="text" class="form-control" id="address" name="address" placeholder="Address" readonly="readonly">' .$address .'</textarea>
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
				   	 <input type="text" class="form-control" id="equipment" name="equipment" placeholder="Equipment" readonly="readonly" value="'.$equipment.'">
				    </div>
				    <label class="col-sm-1">Make:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="s_name" name="s_name" placeholder="Make" readonly="readonly" value="'.$make.'">
				    </div>
			    	<label class="col-sm-1">Job Reference:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="job" name="job" placeholder="Additional" readonly="readonly" value="'.$job_ref.'">
			    	</div>
			    </div>
			    <div class="row"><br></div>
			    <div class="row">
			
			    	<label class="col-sm-1">Charger:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Charger" readonly="readonly" value="'.$charger.'">
			    	</div>
			    	<label class="col-sm-1">Case:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Case" readonly="readonly" value="'.$case.'">
			    	</div>
			    	 <label class="col-sm-1">CD:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="CD" readonly="readonly" value="'.$cd.'">
			    	</div>
			    </div>
			     <div class="row"><br></div>
			    <div class="row">
			    <label class="col-sm-1">Cable:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="postcode" name="Cable" placeholder="Cable" readonly="readonly" value="'.$cable.'">
				    </div>
			    	<label class="col-sm-1">Manual:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Manual" readonly="readonly" value="'.$manual.'">
			    	</div>
			    	<label class="col-sm-1">Additional:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Additional" readonly="readonly" value="'.$additional.'">
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
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description" readonly="readonly">' . $description . '</textarea>
			    	</div>
			   	</div>
			  </div>
		</div>
   <div id="tabs-4" class="panel panel-primary">
			 <div class="panel-heading">Invoice</div>
			  <div class="panel-body">
			  <div class="row">
				    <label class="col-sm-1">Forname:</label>
				    <div class="col-sm-3">
				   	 <input type="text" class="form-control" id="f_name" name="f_name" readonly="readonly" value="'.$f_name.' ">
				    </div>
				 <label class="col-sm-1">Job number</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="customer_num" name="customer_num" readonly="readonly" value="'.$job_ref.'" >
			    	</div>
				    <button class="btn btn-default btn-lg" onclick="window.print();">
						  <span class="glyphicon glyphicon-print"></span>
					</button>
			    </div>
			 		<div class="row"><br></div>
			    <div class="row">
			    		 <label class="col-sm-1">Surname:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="s_name" name="s_name" readonly="readonly" value="'.$s_name.'">
				    </div>
			  		 <label class="col-sm-1">Date in:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="s_name" name="s_name" readonly="readonly" value="'.$dateIn[0].'">
				    </div>
			    </div>
				  <div class="row"><br></div>
					<div class="row">
			  		<label class="col-sm-1">Address:</label>
			    	<div class="col-sm-3">
			    		<textarea type="text" class="form-control" id="address" name="address" placeholder="Address" readonly="readonly">' .$address .'</textarea>
			    	</div>
   					<label class="col-sm-1">Date out:</label>
   					<div class="col-sm-3">
   						<input type="text" class="form-control" id="date_out" name="date_out">
   					</div>
			  		</div>
				<div class="row"><br></div>
			  <div class="row">
   		<label class="col-sm-1">Postcode:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="postcode" name="postcode" readonly="readonly" value="'.$p_code.'">
				    </div>
				 </div>
			<div class="row"><br></div>
			  <div class="row">
			    	<label class="col-sm-1">Telephone Number:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Telephone Number" readonly="readonly" value="'.$tel.'">
			    	</div>
			    </div>
			   <div class="row"><br></div>
			  <div class="row">
			    	<label class="col-sm-1">Email:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Email" readonly="readonly" value="'.$email.'">
			    	</div>
				 </div>
			<div class="row"><br></div>
			  <div class="row">
				    		<label class="col-sm-1">Charger:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="tel_num" name="tel_num" placeholder="Charger" readonly="readonly" value="'.$charger.'">
			    	</div>
			    	<label class="col-sm-1">Case:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Case" readonly="readonly" value="'.$case.'">
			    	</div>
			    	 <label class="col-sm-1">CD:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="CD" readonly="readonly" value="'.$cd.'">
			    	</div>
			    </div>
			     <div class="row"><br></div>
			    <div class="row">
			    <label class="col-sm-1">Cable:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="postcode" name="Cable" placeholder="Cable" readonly="readonly" value="'.$cable.'">
				    </div>
			    	<label class="col-sm-1">Manual:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Manual" readonly="readonly" value="'.$manual.'">
			    	</div>
			    	<label class="col-sm-1">Additional:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="email" name="email" placeholder="Additional" readonly="readonly" value="'.$additional.'">
			    	</div>
				</div>
							<div class="row"><br></div>
			  <div class="row">
				<label class="col-sm-1">Job Description:</label>
			    	<div class="col-sm-4">
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description" readonly="readonly" >' . $description .'</textarea>
			    	</div>
			    <label class="col-sm-1">Actual work done:</label>
			    	<div class="col-sm-4">
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description" ></textarea>
			    	</div>
			    </div>
			    <div class="row"><br></div>
			    <div class="row">
			    			1: Equipment left for repair should be collected within 30 days otherwise it will be disposed off. <br>
			   				2: It is client responsiblity to save data or programs before any repairs are carried out thus 2Click will not be held responsible for any loss of data. <br>
			    			3: Equipment left for repair may encounter minor cosmetic damage during the repair process. <br>
			    			4: 2Click may request a charge of &#163;15.00 Inc VAT when booking in. <br>
			    			5: All successfull repairs have 90 days warranty. <br>
			   		 </div>
			  </div>
			  </div>
			
			
			    			  <button class="btn btn-primary" type="submit" id="edit" onclick="edit();" > Edit </button>
			 
			    			  <button class="btn" type="submit" id="cancel" href="search.php" onclick='."window.location='index.php'".'>Cancel</button>
			
  			 </div>
		</div>
	</div>
</div>';
		}
	}
}

		function displayLogic()
		{
		echo'<form  action="index.php" method="POST"> 
				  <div class="panel panel-primary">
				  	
					 <div class="panel-heading"><h3>2Click booking form</h3></div>
					  <div class="panel-body">
					  	<div class="row">
						    <div class="col-sm-5">
						   	 <input type="text" class="form-control" id="search" name="search">
							 <input type="hidden" class="action" name="action" value="search">
						   	 <script>
						   		$( ".search	" ).autocomplete({
						   		source: [ "$s_name" ]
						   		});
						   	 </script>
						    </div>
						    <button class="btn btn-primary" type="submit" placeholder="search for order ...">Search</button>
						 </div>
					</div>
				</div>	
			</form>	
		</div>';
	}

}
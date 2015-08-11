<?php
class FormLogic
{
	public $action;
	public $customerID;
	public $reference;
	
	
	
	function __construct()
	{
		$this->action1 = $_POST['action1'];		
		$this->action = $_GET['type'];
		$this->search = $_POST['search'];
	}
	
	function logic()
	{
		if($this->action == "newCustomer")
		{
			$this->newCustomer();
		}
		elseif($this->action == "existingCustomer")
		{
			$this->existingCustomer();
		}
		elseif($this-> action1 == "search")
		{
			$this->existingCustomerForm();
		}
		else
		{
			$this->displayLogic();
		}
	}

	function generateCustomerNumber()
	{
		$S_numbers = rand(1, 100000);
		
		for($i = 0; $i < 1; $i++)
		{
			$this->customerID = 'C'.$S_numbers;
		}
		
		$numbers = rand(100, 100000);
		
		for($i = 0; $i < 1; $i++)
		{
			$this->reference = 'R'.$numbers;
		}
	}
	
	function existingCustomer()
	{
		echo'<form  action="index.php" method="POST">
				  <div class="panel panel-primary">
				
					 <div class="panel-heading"><h3>Search for an existing customer</h3></div>
					  <div class="panel-body">
					  	<div class="row">
						    <div class="col-sm-5">
						   	 <input type="text" class="form-control" id="search" name="search">
							 <input type="hidden" class="action" name="action1" value="search">
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
	
	function existingCustomerForm()
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
		
		$userdetailsSQL = "SELECT * FROM customer WHERE S_NAME='$this->search' OR F_NAME='$this->search' OR CUSTOMER_NUM='$this->search'";
		$result = mysqli_query($conn, $userdetailsSQL);
		
		while($row = mysqli_fetch_assoc($result)) {
			
			$customer_number = $row['CUSTOMER_NUM'];
			
			$equipmentSQL = "SELECT * FROM equipment WHERE CUSTOMER_NUM='$customer_number'";
			$result2 = mysqli_query($conn, $equipmentSQL) or die(mysqli_error());
				
			$row2 = mysqli_fetch_assoc($result2);
			
			$job_ref = $row2['JOB_REF'];
		}
		
		echo'<div id="tabs">
<ul class="nav nav-tabs">
<li role="presentation"><a href="#tabs-1">User details</a></li>
<li role="presentation"><a href="#tabs-2">Product</a></li>
<li role="presentation"><a href="#tabs-3">Job Description</a></li>
</ul>
				
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
			    		<input type="text" class="form-control" id="customer_num" name="customer_num" readonly="readonly" value="'. $customer_number. '" >
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
			    	 <label class="col-sm-1">CD:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="cd" name="cd" placeholder="CD">
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
			    		<input type="hidden" id="customer_num" name="customer_num" value="'.$customer_number.'">
			    		<input type="hidden" id="job_ref" name="job_ref" value="'.$job_ref.'">
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
						    		<input type="text" class="form-control" id="job_ref" name="job_ref" readonly="readonly" value="'. $job_ref.'" >
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
</div>';
	}
	
	function newCustomer()
	{
		$this->generateCustomerNumber();
		
		echo'<div id="tabs">
<ul class="nav nav-tabs">
<li role="presentation"><a href="#tabs-1">User details</a></li>
<li role="presentation"><a href="#tabs-2">Product</a></li>
<li role="presentation"><a href="#tabs-3">Job Description</a></li>
</ul>
				
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
			    		<input type="text" class="form-control" id="customer_num" name="customer_num" readonly="readonly" value="'. $this->customerID. '" >
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
			    	 <label class="col-sm-1">CD:</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="cd" name="cd" placeholder="CD">
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
			    		<input type="hidden" id="customer_num" name="customer_num" value="'.$this->customerID.'">
			    		<input type="hidden" id="job_ref" name="job_ref" value="'.$this->reference.'">
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
						    		<input type="text" class="form-control" id="job_ref" name="job_ref" readonly="readonly" value="'. $this->reference.'" >
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
</div>';
	
	}
	
	function displayLogic()
	{
		echo'<div id="tabs-1" class="panel panel-primary">
		 
			 <div class="panel-heading"></div>
			  <div class="panel-body">
				<div class="jumbotron">
				  <h1>Is this a new of existing customer?</h1>
				<br>
				  <p><a class="btn btn-primary btn-lg" href="../newCustomer/index.php?type=newCustomer" role="button">New customer</a> <a class="btn btn-primary btn-lg" href="../newCustomer/index.php?type=existingCustomer" role="button">Existing customer</a></p>
				</div>
			</div>
		</div>
	</div>';
	}
}
<style>
.center {
    margin: auto;
    width: 60%;
    padding: 10px;
}

</style>

<?php 
include "../classes/functions.php";
$display_logic = new functions();
$display_logic -> head_links('Invoice');

$f_name = $_POST['f_name'];
$job_ref = $_POST['customer_num'];
$s_name = $_POST['s_name'];
$dateIn = $_POST['inDate'];
$address = $_POST['address'];
$p_code = $_POST['postcode'];
$tel = $_POST['tel_num'];
$email = $_POST['email'];
$charger = $_POST['charger'];
$case = $_POST['case'];
$cd = $_POST['cd'];
$cable = $_POST['Cable'];
$manual = $_POST['Manual'];
$additional = $_POST['Additional'];
$description = $_POST['Job'];
$dateOut = $_POST['date_out'];

echo '<div id="invoice" class="center" style="width: 1000px;">
		<div class="row">
		 <label class="col-sm-1">Job number</label>
			    	<div class="col-sm-3">
			    		<input type="text" class="form-control" id="customer_num" name="customer_num" readonly="readonly" value="'.$job_ref.'" >
			    	</div>
		</div>
			  <div class="row"><br></div>  				
		<div class="row">
		<label class="col-sm-1">Forname:</label>
				    <div class="col-sm-3">
				   	 <input type="text" class="form-control" id="f_name" name="f_name" readonly="readonly" value="'.$f_name.' ">
				    </div>
				
			    	<label class="col-sm-1">Surname:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="s_name" name="s_name" readonly="readonly" value="'.$s_name.'">
				    </div>
				   </div>
				      <div class="row"><br></div>
				    <div class="row">
			  		 <label class="col-sm-1">Date in:</label>
				    <div class="col-sm-3">
				    	<input type="text" class="form-control" id="dateIn" name="dateIn" readonly="readonly" value="'.$dateIn.'">
				    </div>
				    <label class="col-sm-1">Date out:</label>
   					<div class="col-sm-3">
   						<input type="text" class="form-control" id="date_out" name="date_out" readonly="readonly" value="'.$dateOut.'">
   					</div>
</div>
				<div class="row"><br></div>
					<div class="row">
			  		<label class="col-sm-1">Address:</label>
			    	<div class="col-sm-7">
			    		<textarea type="text" class="form-control" id="address" name="address" placeholder="Address" readonly="readonly">' .$address .'</textarea>
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
			    </div>
			   <div class="row"><br></div>
			  <div class="row">
			    	<label class="col-sm-1">Email:</label>
			    	<div class="col-sm-7">
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
			    	<div class="col-sm-5">
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description" readonly="readonly" >' . $description. '</textarea>
			    	</div>
			    <label class="col-sm-1">Actual work done:</label>
			    	<div class="col-sm-5">
			    		<textarea type="text" class="form-control" id="Job" name="Job" placeholder="Job description" readonly="readonly" ></textarea>
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
			    				</div>';
?>
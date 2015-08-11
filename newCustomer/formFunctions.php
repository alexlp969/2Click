<?php 
require '../databaseConnect.php';

$first_name = htmlspecialchars($_POST["f_name"]);
$second_name = htmlspecialchars($_POST["s_name"]);
$postcode = htmlspecialchars($_POST["postcode"]);
$tel_num = htmlspecialchars($_POST["tel_num"]);
$email = htmlspecialchars($_POST["email"]);
$equipment = htmlspecialchars($_POST["equipment"]);
$make = htmlspecialchars($_POST["make"]);
$cable = htmlspecialchars($_POST["cable"]);
$charger = htmlspecialchars($_POST["charger"]);
$case = htmlspecialchars($_POST["case"]);
$cd = htmlspecialchars($_POST["cd"]);
$manual = htmlspecialchars($_POST["manual"]);
$additional = htmlspecialchars($_POST["additional"]);
$job = htmlspecialchars($_POST["Job"]);
$address = htmlspecialchars($_POST["address"]);
$job_ref = htmlspecialchars($_POST["job_ref"]);
$customerNum = htmlspecialchars($_POST["customer_num"]);

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "click_dev";


// Create connection
$conn = mysqli_connect($servername, $username , $password ,$db_name);


	$populate = "INSERT INTO customer(  F_NAME
										,S_NAME
										,TEL_NUM
										,EMAIL
										,ADDRESS
										,POSTCODE
										,CUSTOMER_NUM)
						 VALUES('$first_name'
								,'$second_name'
								,'$tel_num'
								,'$email'
								,'$address'
								,'$postcode'
								,'$customerNum')";
	
	
	if (mysqli_query($conn, $populate)) {
		echo "New user record created successfully";
		$msg = '1';
	} else {
		echo "Error: " . $populate . "<br>" . mysqli_error($conn);
		$msg = '2';
	}
	
	$populateEquipment = "INSERT INTO equipment (
												EQUIPMENT
												,MAKE
												,CABLE
												,CHARGER
												,c_ace
												,CD
												,MANUAL
												,ADDITIONAL
												,CUSTOMER_NUM
												,JOB_REF
												) 	
								 VALUES (
								 		'$equipment'
								 		,'$make'
								 		,'$cable'
								 		,'$charger'
								 		,'$case'
								 		, '$cd'
										, '$manual'
										, '$additional'
										, '$customerNum'
										, '$job_ref')";
	
	if (mysqli_query($conn, $populateEquipment)) {
		echo "New equipment record created successfully";
		$msg = '1';
	} else {
		echo "Error: " . $populateEquipment . "<br>" . mysqli_error($conn);
		$msg = '2';
	}
	
	$populateProduct = "INSERT INTO product ( EQUIPMENT
											  ,DESCRIPTION
										  	  ,JOB_REF													
													)
										VALUES (
													'$equipment'
													,'$job'
													,'$job_ref')";
	
	if (mysqli_query($conn, $populateProduct)) {
		echo "New product record created successfully";
		$msg = '1';
	} else {
		echo "Error: " . $populateProduct . "<br>" . mysqli_error($conn);
		$msg = '2';
	}
	
	//$msg = '1';

	mysqli_close($conn);
	//redirect();


	header("Location: index.php?msg=" .$msg. "&job_ref=" .$job_ref );
	



?>


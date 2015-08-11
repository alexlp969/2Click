<?php
$first_name = htmlspecialchars($_POST["f_name"]);
$second_name = htmlspecialchars($_POST["s_name"]);
$postcode = htmlspecialchars($_POST["postcode"]);
$tel_num = htmlspecialchars($_POST["tel_num"]);
$email = htmlspecialchars($_POST["email"]);
$equipment = htmlspecialchars($_POST["equipment"]);
$address = htmlspecialchars($_POST["address"]);
$equipment = htmlspecialchars($_POST["equipment"]);
$make = htmlspecialchars($_POST["make"]);
$cable = htmlspecialchars($_POST["cable"]);
$charger = htmlspecialchars($_POST["charger"]);
$case = htmlspecialchars($_POST["case"]);
$cd = htmlspecialchars($_POST["cd"]);
$manual = htmlspecialchars($_POST["manual"]);
$additional = htmlspecialchars($_POST["additional"]);
$job = htmlspecialchars($_POST["Job"]);
$job_ref = htmlspecialchars($_POST["job_ref"]);
$customerNum = htmlspecialchars($_POST["customer_num"]);


var_dump($second_name);
var_dump($email);


$servername = "localhost";
$username = "root";
$password = "";
$db_name = "click_dev";

// Create connection
$conn = mysqli_connect($servername, $username , $password ,$db_name);

$user_details = "UPDATE customer SET F_NAME='$first_name'
											,S_NAME='$second_name'
											,email='$email'
											,ADDRESS='$address'
											,TEL_NUM='$tel_num'
											,POSTCODE='$postcode' 
								WHERE CUSTOMER_NUM='$customerNum'";

if (mysqli_query($conn, $user_details)) {
	echo "New user record created successfully";
	$msg = '1';
} else {
	echo "Error: " . $user_details . "<br>" . mysqli_error($conn);
	$msg = '2';
}

$product = "UPDATE equipment SET EQUIPMENT='$equipment'
								 			,MAKE='$make'
								 			,CABLE='$cable'
								 			,CHARGER='$charger'
								 			,C_ACE='$case'
								 			,CD='$cd'
								 			,MANUAL='$manual'
								 			,ADDITIONAL='$additional'
								 WHERE CUSTOMER_NUM='$customerNum'";
if (mysqli_query($conn, $product)) {
	echo "New user record created successfully";
	$msg = '1';
} else {
	echo "Error: " . $product . "<br>" . mysqli_error($conn);
	$msg = '2';
}

$job_description = "UPDATE product SET EQUIPMENT='$equipment'
												,DESCRIPTION='$job'
											WHERE JOB_REF='$job_ref'";
if (mysqli_query($conn, $job_description)) {
	echo "New user record created successfully";
	$msg = '1';
} else {
	echo "Error: " . $job_description . "<br>" . mysqli_error($conn);
	$msg = '2';
}

mysqli_close($conn);

header("Location: customerform.php?msg=" .$msg. "&customer_num=" .$customerNum );
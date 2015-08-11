<?php

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

$UsrName = $_POST['Username'];

$logIn = "SELECT * FROM user";

$result = mysqli_query($conn, $logIn);

while($row = mysqli_fetch_assoc($result)) 
{
	$username = $row['USER_NAME'];
	
	if($username == $UsrName )
	{
		header("Location: search.php");
	}
	else 
	{
		header("Location: log_in.php?msg=1");
	}
}





<?php 
class databaseConnect
{

	protected $servername;
	protected $username;
	protected $password;
	protected $db_name;
	public $conn;
	
	public function open_connection()
	{
		$this->servername = "localhost";
		$this->username = "root";
		$this->password = "";
		$this->db_name = "click_dev";
		
		
		// Create connection
		$this->conn = mysqli_connect($this->servername, $this->username , $this->password ,$this->db_name);
		
		// Check connection
		if (!$this->conn) {
			die("Connection failed: " . mysqli_connect_error());
			
			echo"test";
		}
	}
	
	public function close_connection()
	{
		mysqli_close($this->conn);		
	}
	public function output()
	{
		$this->open_connection();
	}
	
}
//$con = new databaseConnect;
//$con->open_connection();

//var_dump($con);
//$close_con ->close_connection();

?>
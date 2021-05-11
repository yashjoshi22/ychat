<?php
	/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'sms');

/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
	// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
else
{
	
}





/*
	$host="localhost";
	$user="root";
	$pass="";
	$db="sms";


	$conn=mysqli_connect($host,$user,$pass,$db);*/
		

		
	/*if($conn)
	{
		
		$db=mysqli_select_db($conn,$db);
		if($db)
		{
			echo "Selected Database";
		}
		else
		{
			echo "Not selected database";
		}
	}
	else
	{
		echo "connection fails";
	}*/

?>
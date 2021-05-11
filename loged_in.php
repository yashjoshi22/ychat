<?php
session_start();
$userprofile=$_SESSION['user_name'];

if($userprofile==true)
{

		echo "<h1> your successfully loged in </h1>";
}
else
{
	header('location:login.php');
}


	


?>
<h2> <a href="logout.php"> Logout </a></h2> 

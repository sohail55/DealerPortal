<?php
	$username="dhamulta_member_ledger";//change username 
	$password="dhamulta_member_ledger"; //change password
	$host="localhost";
	$db_name="dhamulta_member_ledger"; //change databasename
	

	$connect=mysqli_connect($host,$username,$password,$db_name);
	

	if(!$connect)
	{
		echo json_encode("Connection Failed");
	}
	

	?>
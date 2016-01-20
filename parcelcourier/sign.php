<?php
session_start();
ob_start();
include 'scripts/db.php';
$username =$_POST['username'];
$password =$_POST['password'];

$query = mysql_query('SELECT * FROM users WHERE username= "'.$username.'" AND password = "'.$password.'" '); // Check the table with posted credentials
	$num_rows		= mysql_num_rows($query); // Get the number of rows

	if ($num_rows==0)
	{
	$result = '<font color="red">Incorrect details </font>';
	include 'index.php';
	}
	else
	{
	while ($row	=	mysql_fetch_array($query))
	{
	
	
	$_SESSION['username']= $row['username'];
	$_SESSION['email']= $row['email'];
	if ($row['state']==1)
	{
	echo '<script type="text/javascript">window.location = "./admin.php"; </script>';
	}
	else
	{
	echo '<script type="text/javascript">window.location = "./parcel.php"; </script>';
	}
	}
	
	}
?>
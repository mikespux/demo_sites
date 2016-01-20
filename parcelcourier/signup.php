<?php
session_start();
	ob_start();
include('scripts/db.php');
$username=$_POST['username'];
$pass=$_POST['pass'];
$email=$_POST['email'];
if(filter_var($email ,FILTER_VALIDATE_EMAIL))
{
if (isset($username) && isset($pass) && $username!='')
{
if($pass!='admin')
{
mysql_query("INSERT INTO users (username,email,password,state) values('$username','$email','$pass','0')");
$result = 'You have successfully registered a new user';
include 'sign-up.php';
}
else
{
mysql_query("INSERT INTO users (username,email,password,state) values('$username','$email','$pass','1')");
$result = 'You have successfully registered a new user';
include 'sign-up.php';
}
}
else

{
$result = '<font color="red">Please enter all fields</font>';
include 'sign-up.php';
}
}
else
{
$result = '<font color="red">Invalid email</font>';
include 'sign-up.php';
}
?>
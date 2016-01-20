<?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("swift",$connect);

if(isset($_POST["update"])){
	if($_POST["update"]=="yes"){
	$username=$_POST["username"];
	$email=$_POST["email"];
	$password=$_POST["password"];
	$password1=md5($password);

$query="UPDATE flight_users set f_uname='$username' , f_mailid='$email', f_password='$password1' where f_id=".$_POST['uid'];
if(mysql_query($query))
echo "<center>Record Updated</center><br>";
header('Refresh: 1; url=edit_users.php');
	}
}

if(isset($_GET['operation'])){
if($_GET['operation']=="delete"){
$query="DELETE from flight_users where f_id=".$_GET['uid'];	
if(mysql_query($query))
echo "<center>Record Deleted!</center><br>";
header('Refresh: 1; url=edit_users.php');
}
}
?>
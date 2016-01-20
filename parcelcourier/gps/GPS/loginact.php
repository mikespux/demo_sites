<?php
	session_start();
	include "koneksi.php";
	$user=$_POST['usernm'];
	$pass=$_POST['pswd'];
	$sql="select id from armada where username='$user' and password=password('$pass')";
	$query=mysql_query($sql);
	$jumlah=mysql_num_rows($query);
	
	if($jumlah==1){
		$data=mysql_fetch_array($query);		
		$_SESSION['id']=$data['id'];		
		header("location:petadinamis.php");	
	}else{
		header("location:login.php?error=Maaf, username atau password salah");	
	}
?>
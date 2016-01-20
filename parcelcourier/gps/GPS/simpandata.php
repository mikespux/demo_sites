<?php
	session_start();
	include "koneksi.php";
	$lat=$_POST['lat'];
	$lon=$_POST['lon'];
	//$sql="update armada set lat='$lat', long='$lon' where id='$_SESSION[id]'";
	$sql="update armada set lat='$lat', lon='$lon' where id='$_SESSION[id]'";
	$query=mysql_query($sql) or die($sql);
	//$data=mysql_fetch_array($query);
	echo "sukses";
?>
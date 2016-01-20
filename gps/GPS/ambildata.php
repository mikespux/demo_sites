<?php
	include "koneksi.php";
	$id=$_POST['id'];
	$sql="select * from armada order by nama limit $id, 1";
	$query=mysql_query($sql) or die(mysql_error());
	$data=mysql_fetch_array($query);
	echo $data['lat'];
?>
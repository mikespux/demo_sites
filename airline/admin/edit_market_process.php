<?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("swift",$connect);



if(isset($_POST["update"])){
	if($_POST["update"]=="yes"){
	$name=$_POST["flightname"];
	$from=$_POST["from"];
	$to=$_POST["to"];
	$depdate=$_POST["depdate"];
	$arivdate=$_POST["arivdate"];
$deptime=$_POST["deptime"];
	$arivtime=$_POST["arivtime"];
	$price=$_POST["price"];
	
	
$query="UPDATE flight_search set fno='$name' , from_city='$from', to_city='$to' ,departure_date='$depdate' ,arrival_date='$arivdate' 
,departure_time='$deptime' ,arrival_time='$arivtime',e_price= '$price' where id=".$_POST['market_id'];
if(mysql_query($query))
echo "<center>Record Updated</center><br>";

header('Refresh: 1; url=edit_markets.php');


	}
}

if(isset($_GET['operation'])){
if($_GET['operation']=="delete"){
$query="DELETE from flight_search where id=".$_GET['market_id'];	
if(mysql_query($query))
echo "<center>Record Deleted!</center><br>";
header('Refresh: 1; url=edit_markets.php');
}
}
?>
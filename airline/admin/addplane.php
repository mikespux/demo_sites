<?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("swift",$connect);




	
	$name=$_POST["flightname"];
	$from=$_POST["from"];
	$to=$_POST["to"];
	$depdate=$_POST["depdate"];
	$arivdate=$_POST["arivdate"];
   $deptime=$_POST["deptime"];
	$arivtime=$_POST["arivtime"];
	$seats=$_POST["seats"];
	$price=$_POST["price"];
	 if($name == "")
{
	echo '<script>alert("Please add flight name");history.back(-1);</script>';
}

else if($from == "")
{
	echo '<script>alert("Please enter from");history.back(-1);</script>';
}
else if($to == "")
{
	echo '<script>alert("Please enter to");history.back(-1);</script>';
}
else if($depdate == "")
{
	echo '<script>alert("Please enter Departure Date");history.back(-1);</script>';
}
else if($arivdate == "")
{
	echo '<script>alert("Please enter Arrival Date");history.back(-1);</script>';
}
$query= mysql_query("INSERT INTO flight_search(fno,from_city,to_city,departure_date,arrival_date,departure_time,arrival_time,e_seats_left,b_seats_left
,e_price,b_price) values('".$name."','".$from."','".$to."','".$depdate."','".$arivdate."','".$deptime."','".$arivtime."','".$seats."','".$seats."','".$price."','".$price."')")or die(mysql_error());if(mysql_query($query))
if($query)

		{
			echo"<script>
			alert(\"Plane successifully Added\");
			history.back(-1);
			</script>";
		}
		
		else
			
			{
				echo '<script>alert("Unable to store the details to the database");
				history.back(-1);
				</script>';
				header('Refresh: 2; url=addplane.php');

			}
			
			
?>
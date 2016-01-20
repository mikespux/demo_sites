<?php
require_once("connection.php");
//$m_id = $_POST['market_id'];
$name =  $_POST['market_name'];
$const = $_POST['consti'];
$rating = $_POST['rate'];
//$file= $_POST['file'];

$submit = $_POST['submit'];

if($name == "")
{
	echo '<script>alert("Please enter market name");history.back(-1);</script>';
}
else if($const == "--Select Constituency--")
{
	echo '<script>alert("Please select a constituency");history.back(-1);</script>';
}
else if($rating == "--Add rating--")
{
	echo '<script>alert("Please select rating");history.back(-1);</script>';
}
else
{
	if($submit)
	{
		
		
					//$sql3 = "SELECT * from markets where constituency='".$const"' AND market_name='".$name."' ";
					$sql3 = mysql_query("SELECT * FROM `markets`WHERE market_name = '".$name."' ");
					$sql4 = mysql_query("SELECT * FROM `markets`WHERE constituency = '".$const."' ");
					$res = ($sql3);
					$res2 = ($sql4);
					$count3 = mysql_num_rows($res);
					$count = mysql_num_rows($res2);
					if($count3 && $count== 1)
						{
							echo '<script>alert("The market '.$name.'  already exists in '.$const.'  ");history.back(-1);</script>';
						}
		
			else
					$query= mysql_query("INSERT INTO markets (market_name,constituency,rating) values('".$name."','".$const."','".$rating."')")or die(mysql_error());
					
					if($query)
					{
						echo"<script>
							alert(\"market has been added successifully\");
							history.back(-1);
							</script>";
					}
				
						else
							{ 
								die("  THE QUERY NOT PERFORMED" .mysql_error());
							}
	}
				
} 
			
		
	
?>
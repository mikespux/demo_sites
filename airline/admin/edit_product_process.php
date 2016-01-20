<?php
$connect=mysql_connect("localhost","root","");
mysql_select_db("swift",$connect);


if(isset($_POST["update"])){
	if($_POST["update"]=="yes"){
	$name=$_POST["product_name"];
	
	$date=$_POST["sd"];
	

$query="UPDATE routes set name='$name' , date='$date' where id=".$_POST['product_id'];
if(mysql_query($query))

{
echo "<center>Record Updated</center><br>";

header('Refresh: 1; url=edit_products.php');

}
else
{
				echo '<script>alert("Unable to store the details to the database");
				history.back(-1);
				</script>';
				header('Refresh: 1; url=edit_products.php');

			}
	}
	}

if(isset($_GET['operation'])){
if($_GET['operation']=="delete"){
$query="delete from routes where id=".$_GET['product_id'];	
if(mysql_query($query))
echo "<center>Record Deleted!</center><br>";
header('Refresh: 1; url=edit_products.php');
}
}
?>
<html>
<body>


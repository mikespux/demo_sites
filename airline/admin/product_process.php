<?php
require_once("connection.php");

//$code = $_POST['product_code'];
$name = $_POST['name'];

$date = $_POST['sd'];

 if($name == "")
{
	echo '<script>alert("Please add route");history.back(-1);</script>';
}

else if($date == "")
{
	echo '<script>alert("Please enter Date");history.back(-1);</script>';
}

	$query= mysql_query("INSERT INTO routes(name,date) values('".$name."','".$date."')")or die(mysql_error());
	if($query)

		{
			echo"<script>
			alert(\"Route successifully Added\");
			history.back(-1);
			</script>";
		}
		
		else
			
			{
				echo '<script>alert("Unable to store the details to the database");
				history.back(-1);
				</script>';
				header('Refresh: 2; url=edit_products.php');

			}




?>
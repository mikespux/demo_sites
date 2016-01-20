<?	
global $xflag,$abcde;
$xflag=$_REQUEST["flag"];

	if($_SERVER["REQUEST_METHOD"]) {

		$abcde = $_POST;
		
	} 

include ("./raw.php");
include_once ($app_path."lib.php");
include_once ($app_path."extract_db_data.php");



	if (!$_SERVER["QUERY_STRING"]) { 

		/* If there is no variable passed make google maps */
		include ($app_path."makemap.php");
	}
	else 	{
		include ($app_path."makemap.php");
	/* Data is coming from device, post in db */
	} 
?>
  </body>
</html>


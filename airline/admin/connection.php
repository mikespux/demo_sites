
<?php
require_once('params.php');
	$conn = mysql_connect($db_hostname,$db_username,$db_password);
		if (!$conn) die (" There was a problem: ".mysql_error());
		mysql_select_db($db_database);
?>		
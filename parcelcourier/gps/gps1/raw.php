<?

// This file reads the config from the db and stores it in variable, that is made available to all the pages in this app.
// reduces the overheads to read from the db every time...

	global $cnt;

	// Database level configuration
	$dbhost="localhost";
	$dbuser="root";
	$dbport="3306";
	$dbpass="";
	$db_db="gps";

	// imei number that needs to be displayed.
	$ximei="354777031492395";


	// This is where the file is stored from portlistener.pl perl
	$incoming_file=getConfig("incoming_file");

	// Google API key for the below URL

	$xkey=getConfig("xkey");
	$xzoom=getConfig("xzoom");

	// Title of the webpage
	$xtitle=getConfig("xtitle");
	
	//URL of the webpage- ! important, the above key is linked to this.
	$homeurl=getConfig("homeurl");
	$app_path=getConfig("app_path");

	// Experimental by Alok, to show distances, leave it off
	$showdistance=getConfig("showdistance");

	// not experimental :)
	$distmulti = getConfig("distmulti");

	// Expense values
	$auto_fare=getConfig("auto_fare");
	$taxi_fare=getConfig("taxi_fare");
	$ac_cab = getConfig("ac_cab");
	$co_fare = getConfig("co_fare");
	$currency = getConfig("currency");

	// Size of the map
	$xwidth=getConfig("xwidth");
	$xheight=getConfig("xheight"); 

	// Seconds in which maps are to be refreshed, in case current track selected
	$map_refresh=getConfig("map_refresh");

	// snap on enabled ?
	$xsnapon = getConfig("snapon");

	// This is the gps float error, you dont want application to notice
	// Basically, the lat/long must change more than this, to be displayed
  	// Smaller the figure, more granualr the data, but also error creeps in due to gps device float
	$dull_lat=getConfig("dull_lat");
	$dull_long=getConfig("dull_long");

	// Last x records to be shown on the map...
	$start_x=getConfig("start_x");
	$last_x=getConfig("last_x");
	$maxmarkers = getConfig("maxmarkers");

	// Color/width of the line

	$device=getdevConfig($ximei, "device_no");
	$mileage=getdevConfig($ximei, "mileage");
	$linecolor=getdevConfig($ximei, "linecolor");
	$linewidth=getdevConfig($ximei, "linewidth");
	$car_desc=getdevConfig($ximei, "description");




// ---------- functions below this line	

function getConfig($label, $tab="gpstracker-config") {
	global $dbhost, $dbuser, $dbport, $dbpass, $db_db;

		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		
		if (!$conn) {
		    echo "Unable to connect to DB: " . mysql_error();
		    exit;
		}
		  
		if (!mysql_select_db($db_db)) {
		    echo "Unable to select $db_db: " . mysql_error();
		    exit;
		}
		
		$sql = "SELECT `value1` as xvalue1  
		        FROM   `$db_db`.`$tab`
		        WHERE  `label` = '".$label."'";
		
// echo $sql."<br>";

		$result = mysql_query($sql);
		
		if (!$result) {
		    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
		    exit;
		}
		
		if (mysql_num_rows($result) == 0) {
		    echo "No rows found, nothing to print so am exiting";
		    exit;
		}
		
		while ($row = mysql_fetch_assoc($result)) {
		    $val = $row["xvalue1"];
		}
//	echo $val;
		
		mysql_free_result($result);
		return ($val);
		}


function getdevConfig($imei, $label) {
	global $dbhost, $dbuser, $dbport, $dbpass, $db_db;
		$tab = 'device_info';

		$conn = mysql_connect($dbhost, $dbuser, $dbpass);
		
		if (!$conn) {
		    echo "Unable to connect to DB: " . mysql_error();
		    exit;
		}
		  
		if (!mysql_select_db($db_db)) {
		    echo "Unable to select $db_db: " . mysql_error();
		    exit;
		}
		
		$sql = "SELECT `$label` as label  
		        FROM   `$db_db`.`$tab`
		        WHERE  `imei` = '".$imei."'";
		
// echo $sql."<br>";

		$result = mysql_query($sql);
		
		if (!$result) {
		    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
		    exit;
		}
		
		if (mysql_num_rows($result) == 0) {
		    echo "No rows found, nothing to print so am exiting";
		    exit;
		}
		
		while ($row = mysql_fetch_assoc($result)) {
		    $val = $row["label"];
		}
//	echo $val;
		
		mysql_free_result($result);
		return ($val);
		}

?>
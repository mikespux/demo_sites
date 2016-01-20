<?
	$link = mysql_connect($dbhost.":".$dbport, $dbuser, $dbpass);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
global $xflag,$xtot_dist;
date_default_timezone_set('IST+530');

if ($abcde["form_post"]) {
	$xflag="P";
	}


		if ($xflag == "A") {
				// Midway somewhere
				$sql = "SELECT `lat`,`long`,`speed`,`sdate`, `bearing` FROM `$db_db`.`trackpoint` WHERE `lat` <> \"\" ORDER BY `xid` DESC LIMIT ".$start_x.",".$last_x;
				}

				// Latest tracks
		if ($xflag == "B") {
				$sql = "SELECT `lat`,`long`,`speed`,`sdate`,`bearing` FROM `$db_db`.`trackpoint` WHERE `lat` <> \"\" ORDER BY `xid` DESC LIMIT 0,".$last_x;
				}

		if ($xflag == "C") {
				// For making today'
				// creating $st_time
				$st_time=date('Y-m-d 00:00:00');
				// creating $end_time curr_time
				$end_time=date('Y-m-d H:i:s');

				$sql = "SELECT `lat`,`long`,`speed`,`sdate`,`bearing` FROM `$db_db`.`trackpoint` WHERE `status` = 'F' AND `sdate` >= '$st_time' AND `sdate` <= '$end_time' ORDER BY `xid` DESC LIMIT 0,$maxmarkers";
				}

		if ($xflag == "D") {
				// For making Yesterday
				// creating $st_time
				$st_time=date('Y-m-').(date('d')-1).' 00:00:00';
				// creating $end_time curr_time
				$end_time=date('Y-m-').(date('d')-1).' 23:59:00';


				$sql = "SELECT `lat`,`long`,`speed`,`sdate`,`bearing` FROM `$db_db`.`trackpoint` WHERE `status` = 'F' AND `sdate` >= '$st_time' AND `sdate` <= '$end_time' ORDER BY `xid` DESC LIMIT 0,$maxmarkers";
				}

		if ($xflag == "E") {
				// For making records between two time points
				// creating $st_time//
				$st_time=$_REQUEST["st_time"];
				// creating $end_time curr_time
				$end_time=$_REQUEST["last_time"];

				$sql = "SELECT `lat`,`long`,`speed`,`sdate`,`bearing` FROM `$db_db`.`trackpoint` WHERE `status` = 'F' AND `sdate` >= '$st_time' AND `sdate` <= '$end_time' ORDER BY `xid` DESC LIMIT 0,$maxmarkers";
				}


		if ($xflag == "P") {
				// For making form filled date
				// creating $st_time
				//  $st_time=date('Y-m-').(date('d')-1).' 00:00:00';
				$st_time=$abcde["st_year"]."-".$abcde["st_month"]."-".$abcde["st_day"]." ".$abcde["st_hour"].":".$abcde["st_mnt"].":".$abcde["st_sec"];
				// creating $end_time curr_time
				// $end_time=date('Y-m-').(date('d')-1).' 23:59:00';
				$end_time=$abcde["en_year"]."-".$abcde["en_month"]."-".$abcde["en_day"]." ".$abcde["en_hour"].":".$abcde["en_mnt"].":".$abcde["en_sec"];
				$sql = "SELECT `lat`,`long`,`speed`,`sdate`,`bearing` FROM `$db_db`.`trackpoint` WHERE `status` = 'F' AND `sdate` >= '$st_time' AND `sdate` <= '$end_time' ORDER BY `xid` DESC LIMIT 0,1000";
				}

		if ($xflag == "") {
				$sql = "SELECT `lat`,`long`,`speed`,`sdate`,`bearing` FROM `$db_db`.`trackpoint` WHERE `lat` <> \"\" ORDER BY `xid` DESC LIMIT 0,".$last_x;
				}
		
//	echo $sql;

	$result = mysql_query($sql);
//	echo $result;
	if (!$result) {
		die('Err:' . mysql_error());
	}
	$i=1;
	$lat0=0;
	$long0=0;
	$lat1=0;
	$long1=0;
	$xtot_dist=0;

	while ($row = mysql_fetch_array($result, MYSQL_NUM)) {

//		echo $row[3]."<BR>";

	

		$lat0 = round(substr($row[0],0,2)+substr($row[0],2)/60,9);
		$long0 = round(substr($row[1],0,3)+substr($row[1],3)/60,9);
	
		$er_float = abs($lat0 - $lat1);
		$el_float = abs($long0 - $long1);
		if ($er_float > $dull_lat) {
			if ($el_float > $dull_long) {
				if ($i == 1) {
					$last_time=$row[3];
				}

				if ($i > 0) {
					$bearing = (rad2deg(atan2(sin(deg2rad($long1) - deg2rad($long0)) * cos(deg2rad($lat1)), cos(deg2rad($lat0)) * sin(deg2rad($lat1)) - sin(deg2rad($lat0)) * cos(deg2rad($lat1)) * cos(deg2rad($long1) - deg2rad($long0)))) + 360) % 360;
					$xdir=getCompassDirection($bearing);
					$xdist= getDistance($lat0, $long0, $lat1, $long1);
					if ($i > 1) {
						$nxtdisp = "&lt;br&gt; Dist2nxt:".round($xdist,2)." kms";
						$xtot_dist = $xtot_dist + $xdist;
					} else {
						$nxtdisp = "";
					}
				}
				// echo "WWWW".$xdir."EEEE";'N', 'NNE', 'NE', 'NEE', 

				if ($xsnapon) {
					extract(snapon($lat0, $long0));
					$xlat[$i]=$ylat;
					$xlong[$i]= $ylong;
					}
				else {
					$xlat[$i]= $lat0;
					$xlong[$i]= $long0;
				}
				//$xinfo[$i]="@ ".$row[3]. "&lt;br&gt;Speed: " . $row[2]. " km/hr &lt;br&gt;Bearing: " .$xdir." (".$bearing.") &lt;br&gt; Lat/Long: (".$xlat[$i]."),(".$xlong[$i].") ";
				$xinfo[$i]="Car: ".$car_desc."&lt;br&gt;@ ".format_date($row[3]). "&lt;br&gt;Speed: " . round($row[2]*1.655,2). " km/hr &lt;br&gt;Bearing: " .$xdir." (".$bearing.")".$nxtdisp ."&lt;br&gt; Lat/Long: (".$xlat[$i]."),(".$xlong[$i].") &lt;br&gt;".$xdesc;

				$xlabel[$i]=substr($row[3],11,20);
				$lat1 = $xlat[$i];
				$long1 = $xlong[$i];
				$st_time=$row[3];
				$i++;
			}
		}
	
	}
        $tot_rec=$i;
				
//	echo "Total distance covered: ".round(($xtot_dist),3) ." Kms.";
	mysql_free_result($result);


$cnt=count($xlat);
// 00000000000000000000000
// echo "// KKKK".$cnt."dFFF\n";

// echo  "<markers >";
$linkk = "<markers class='binfo'>\n";

$i=1;
do 	{ 
	if($xlat[$i] != 0) {
		$str = "<marker lat=\"".$xlat[$i]."\" lng=\"".$xlong[$i]."\" html=\"".$xinfo[$i]."\"  label=\"".$xlabel[$i]."\" />\n";
		$linkk = $linkk.$str;
	}
//	echo $str;
	$i++;
	}
	while ($i < $cnt);


//echo '\n<line colour="'.$linecolor.'" width="'.$linewidth.'" html="You clicked the red polyline">';
$linkk = $linkk.'<line colour="'.$linecolor.'" width="'.$linewidth.'" html="You clicked the red polyline">';

$i=1;
do {
	if($xlat[$i] != 0) {
		$str =   "\n<point lat=\"".$xlat[$i]."\" lng=\"".$xlong[$i]."\" />" ;
		$linkk = $linkk.$str;
//	echo $str;
		}
	$i++;
	}
	while ($i < $cnt);
// echo "</line>\n"."\n</markers>"; 
$linkk = $linkk."</line></markers>";

$filename = 'data.xml';
$somecontent = $linkk;

// Let's make sure the file exists and is writable first.
if (is_writable($filename)) {

    if (!$handle = fopen($filename, 'w')) {
         echo "Cannot open file ($filename)";
         exit;
    }

    if (fwrite($handle, $somecontent) === FALSE) {
        echo "Cannot write to file ($filename)";
        exit;
    }
   // 	    echo "Success, wrote ($somecontent) to file ($filename)";
	    fclose($handle);
	} else {
    	    echo "The file $filename is not writable";
	}


?>
<?php

include_once ($app_path."raw.php");
include_once ($app_path."lib.php");
include_once ($app_path."extract_db_data.php");

echo "<html><head> <meta http-equiv='refresh' content='4; url=".$homeurl."'> </head><body>";

$lines = file($incoming_file);

// Loop through our array, and clean up dirty records
$i=0;
foreach ($lines as $line_num => $line) {
	$str = str_replace("##,imei:".$ximei.",A;","",$line);
   	$str = str_replace("imei:","",$str);
	$str = str_replace("##,","",$str);
	// Check if the array is ok to be added
	list($p1,$p2,$dust) = explode(";",$str);
	list($iemi,$dust) = explode (",",$p2);	
	if ($iemi==$ximei)	{		
		$raw_data[$i] = str_replace(";",",",$str);
		$i++;
	} 
	else {
	
	}
}

	$link=xdb_connect();


foreach ($raw_data as $line_num => $st) {

	list ($sdate, $rip, $lip,$iemi,$type,$ddate,$phone,$status,$abc1,$abc2,$lat, $dlat, $long, $dlong, $speed, $abc3) = explode (",", $st);
	$sdate=date_maker($sdate);
	$ddate=date_maker($ddate);

	$sql = "INSERT INTO `$db_db`.`trackpoint` (`lock`,`sdate`, `ddate`, `local_ip`, `remote_ip`, `imei`, `alert_type`, `phone_no`, `status`, `bearing`, `unknown2`, `unknown3`, `lat`, `dlat`, `long`, `dlong`, `speed`, `xid`) VALUES ('$sdate.$ddate.$long.$lat','$sdate', '$ddate', '$lip', '$rip', '$iemi', '$type', '$phone', '$status', '$abc1', '$abc2', '$abc3', '$lat', '$dlat', '$long', '$dlong', '$speed', '$xid');";

	$result = mysql_query($sql);
//	if (!$result) {
//	    echo ('Invalid query: ' . mysql_error());
//	}


}

mysql_close($link);
echo "Data parsed\n";
echo "<center><blink>Data parsed from $incoming_file...... taking you back to map......</blink></center>";


function date_maker ($dt) {
	$yr="20".substr($dt,0,2);
	$mnth=substr($dt,2,2);
	$day=substr($dt,4,2);
	$hr=substr($dt,6,2);
	$mnt=substr($dt,8,2);
	$sec=substr($dt,10,2);
	$n_date=$yr."-".$mnth."-".$day." ".$hr.":".$mnt.":00";
	return $n_date;
}


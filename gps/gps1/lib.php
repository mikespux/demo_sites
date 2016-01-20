<?
include_once ($app_path."raw.php");

function xdb_connect() {
	global $dbhost,$dbport,$dbuser,$dbpass;
	$link = mysql_connect($dbhost.":".$dbport, $dbuser, $dbpass);
	if (!$link) {
	    die('Could not connect: ' . mysql_error());
	}
	return $link;
}


function fwrite_stream($fp, $string) {
    for ($written = 0; $written < strlen($string); $written += $fwrite) {
        $fwrite = fwrite($fp, substr($string, $written));
        if ($fwrite === false) {
            return $written;
        }
    }
    return $written;
}

function format_date($dt){
//        2010-08-08 03:34:00 
//        03:34:00  08-Aug-2010

	list($part1,$part2)=explode(" ",$dt);
	list($yr,$mn,$da) = explode("-",$part1);
	switch ($mn) {
		case 1: 
			$x="Jan";
			break;
		case 2: 
			$x="Feb";
			break;
		case 3: 
			$x="Mar";
			break;
		case 4: 
			$x="Apr";
			break;
		case 5: 
			$x="May";
			break;
		case 6: 
			$x="Jun";
			break;
		case 7: 
			$x="Jul";
			break;
		case 8: 
			$x="Aug";
			break;
		case 9: 
			$x="Sep";
			break;
		case 10: 
			$x="Oct";
			break;
		case 11: 
			$x="Nov";
			break;
		case 12: 
			$x="Dec";
			break;
		default:
			$x="Aou";
			break;

	}
	$dt = $part2." hrs on ".$da."-".$x."-".$yr;
	return $dt;	
}


function getCompassDirection($bearing) {
	$tmp = round(($bearing) / 22.5);
//	echo $tmp."<BR>";
	switch($tmp) {
		case 1:
			$direction = "NNE";
			break;
		case 2:
			$direction = "NE";
			break;
		case 3:
			$direction = "ENE";
			break;
		case 4:
			$direction = "E";
			break;
		case 5:
			$direction = "ESE";
			break;
		case 6:
			$direction = "SE";
			break;
		case 7:
			$direction = "SSE";
			break;
		case 8:
			$direction = "S";
			break;
		case 9:
			$direction = "SSW";
			break;
		case 10:
			$direction = "SW";
			break;
		case 11:
			$direction = "WSW";
			break;
		case 12:
			$direction = "W";
			break;
		case 13:
			$direction = "WNW";
			break;
		case 14:
			$direction = "NW";
			break;
		case 15:
			$direction = "NNW";
			break;
		default:
			$direction = "N";
		}
		return $direction;
	}


function getDistance($latitude1, $longitude1, $latitude2, $longitude2) {
	global $distmulti;
        $earth_radius = 6371;

        $dLat = deg2rad($latitude2 - $latitude1);
        $dLon = deg2rad($longitude2 - $longitude1);

        $a = sin($dLat/2) * sin($dLat/2) + cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * sin($dLon/2) * sin($dLon/2);
        $c = 2 * asin(sqrt($a));
        $d = $earth_radius * $c;

        return ($d*$distmulti);
}

function snapon ($slat, $slong) {
		global $db_db;

		$sql = "select `name`, `lat`, `long`, `dist`, `description`  FROM `$db_db`.`snapon` WHERE `active`=1";
		$result = mysql_query($sql);
	//	echo $result;
		if (!$result) {
			die('Err:' . mysql_error());
		}

		
		while ($row = mysql_fetch_array($result, MYSQL_NUM)) {
			$snaplat=$row[1];
			$snaplong=$row[2];
			$snapdist =$row[3];
	
			$xdist= getDistance($slat, $slong, $snaplat, $snaplong);
			if (($xdist*1000) < $snapdist) {
//				echo "1".$row[0]."<br>";
//				echo "1";
				$ylat=$snaplat;
				$ylong=$snaplong;
				$xdesc="Snapon: ".$row[4];
				$xbreak=1;
			}
			else {
			//		echo "Dist:".($xdist*1000)."<BR>";
//				echo "0<BR>";
				$ylat=$slat;
				$ylong=$slong;
			        $xdesc="";
				$xbreak=0;
			}
		// snapon record found, go back
		if($xbreak) {
				break;
			}
		}

		return compact('ylat','ylong','xdesc');
	}

?>
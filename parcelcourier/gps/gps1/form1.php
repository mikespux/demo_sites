<?

$str = '<form id="st_form" class="binfo"  method="post" action="'.$homeurl.'"index.php>';
	$str .= "<table>\n";
	$str .= "<tr><td>";
	$str .= "</td><td>";
		$str .= "(dd/mm/yyyy)";
	$str .= "</td><td>";
		$str .= "(hours:minutes:seconds)";
	$str .= "</td></tr>\n";
	$str .="<tr><td>";
		$str .="Trip Start time";
	$str .= "</td><td>";
		$str .= mk_select("st_day", "01", "31", "day")."/ ";
		$str .= mk_select("st_month", "01", "12", "month")."/ ";
		$str .= mk_select("st_year", "2009", "2020", "year");
	$str .= "</td><td>";
		$str .= mk_select("st_hour", "00", "23", "hour").": ";
		$str .= mk_select("st_mnt", "00", "59", "minute").": ";
		$str .= mk_select("st_sec", "00", "00", "second");

	$str .= "</td></tr>\n";

	$str .="<tr><td>";
	$str .="Trip End time";
	$str .= "</td><td>";
		$str .= mk_select("en_day", "01", "31", "day")."/ ";
		$str .= mk_select("en_month", "01", "12", "month")."/ ";
		$str .= mk_select("en_year", "2009", "2020", "year");
	$str .= "</td><td>";

		$str .= mk_select("en_hour", "00", "23", "hour").": ";
		$str .= mk_select("en_mnt", "00", "59", "minute").": ";
		$str .= mk_select("en_sec", "00", "00", "second");
	$str .= "</td></tr>\n";
	$str .= "</table>\n	";
$str .= '<INPUT TYPE=hidden NAME="form_post" VALUE="true">';
$str .= '<INPUT TYPE=SUBMIT NAME="SUBMIT" VALUE="Submit!">';

$str .= "</form>";

echo $str;


function mk_select($name, $st, $en, $def) {

	$j=0;
	while ($st <= $en) {
		$arr[$j]= str_pad($st, 2, "0", STR_PAD_LEFT);
		$st++;
		$j++;
	}


	// function to make a select tag
	$result= "<SELECT NAME='".$name."'>\n\t";
	$i=0;
	while ($i < count($arr) ) {
		if ($def == "hour") {
			if ($arr[$i] == date('H')){
				$selected = "SELECTED";
			}
			else {
				$selected = "";
			}			
		} elseif ($def == "minute") {
		   if($name == "en_mnt") {
			if ($arr[$i] == date('i')){
				$selected = "SELECTED";
			}
			else {
				$selected = "";
			}
		    }			

		} elseif ($def == "month") {
			if ($arr[$i] == date('m')){
				$selected = "SELECTED";
			}
			else {
				$selected = "";
			}			

		} elseif ($def == "day") {
			if ($arr[$i] == date('d')){
				$selected = "SELECTED";
			}
			else {
				$selected = "";
			}			
		} elseif ($def == "year") {

			if ($arr[$i] == date('Y')){

				$selected = "SELECTED";
			}
			else {
				$selected = "";
			}			

		} else {
			$selected = "";
		}
		$result .= "<OPTION  ".$selected."  VALUE='".$arr[$i]."'>".$arr[$i]."</OPTION>\n\t";
		$i++;
	}
	$result .= "</SELECT>\n";
	return $result;
}

?>
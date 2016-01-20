<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
	<head>
    		<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
		<? if ($xflag=='B') { 
			echo "<meta http-equiv='refresh' content='".$map_refresh."'; url=".$homeurl."?flag=B>";
		 }
		?>
    		<title>
		<? 
			echo $xtitle; 
		?>
		</title>
		<script type="text/javascript" src="addStyleSheet.js"></script>


    		<script src="http://maps.google.com/maps?file=api&amp;v=2&amp;sensor=false&amp;key=<? echo $xkey; ?>" type="text/javascript"></script>
  	</head>
  <body onunload="GUnload()">
    <!-- you can use tables or divs for the overall layout -->
    <table border=0>
	<tr>
	<td colspan=3>
			<div class="label" id="info">
			Starting record <B><? echo format_date($st_time); ?> </B>  |
			Last record <B><? echo format_date($last_time); ?> </B>   |
			Total records: <? echo $tot_rec; ?> <a href="<? echo $homeurl."?flag=E&st_time=$st_time&last_time=$last_time"; ?> ">(o)</a><br>
	</td>
	</tr>
      	<tr>
		<td>
			<div class="label" id="info">
			Approx distance covered: <B><? echo round(($xtot_dist),3); ?> </B>Kms.
			<br>Approx expense: <B><? echo $currency." ".round(($xtot_dist * $mileage),2); ?></B>
			<hr>
				<br>Equiv. Auto fare: <B><? echo $currency." ".round(($xtot_dist * $auto_fare + 10),2); ?></B>
				<br>Equiv. Taxi fare: <B><? echo $currency." ".round(($xtot_dist * $taxi_fare + 20),2); ?></B>
				<br>Equiv. AC Cab fare: <B><? echo $currency." ".round(($xtot_dist * $ac_cab + 40),2); ?></B>
				<br>Equiv. Co. claim: <B><? echo $currency." ".round(($xtot_dist * $ibm_fare),2); ?></B>
			<br><hr>

		</td>
	        <td>
	       		<div id="map" style="width: <? echo $xwidth; ?>px; height: <? echo $xheight; ?>px"></div>
        	</td>

        	<td width = 150 valign="top" style="text-decoration: none; color: #4444ff;">
        		<div class="label" id="side_bar"></div>
        	</td>
	</tr>
	<tr>
		<td>
		</td>
		<td>
			<div class="binfo" id="info">
			<?
				include ($app_path."form1.php");
			?>
			</div>
		</td>
		<TD>
			<div class="label" text-decoration: none; id="rbot">
				<a href="<? echo $homeurl;?> ">Refresh</a><br>
				<a href='<? echo $homeurl."parse.php";?>'>Parse data</a><br><hr>
				<a href='<? echo $homeurl."?flag=B" ;?> '>Latest track</a><br>
				<a href='<? echo $homeurl."?flag=A" ;?> '>Long</a><br>
				<a href='<? echo $homeurl."?flag=C" ;?> '>Today</a><br>
				<a href='<? echo $homeurl."?flag=D" ;?> '>Yday</a><br>
			</div>

		</td>
      	</tr>
    </table>

	<?
	include ($app_path."scripts.php");
	?>



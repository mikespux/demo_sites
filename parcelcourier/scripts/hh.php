<?php
include('db.php');
$cplate = $_POST['cplate'];
$cname = $_POST['cname'];
$csubmit = $_POST['csubmit'];
//update location varibales
$updatesubmit= $_POST['updatesubmit'];
$updatecplate= $_POST['updatecplate'];
$destination= $_POST['destination'];

if(isset($csubmit))
{
mysql_query("INSERT INTO tracks(plate, name) values('$cplate','$cname')");
echo 1;
}
if(isset($updatesubmit))
{
include('ore.php');
$query = mysql_query("SELECT * FROM parcel WHERE courier_nopl='".$updatecplate."' AND status='onway'");
while($row = mysql_fetch_array($query))
{
$rec = $row['reciever_no'];
$sender = $row['sender_pno'];
$dest = $row['destination'];
$debug = true;

			if ($dest==$destination)
			{
			$message = "Please pick your parcel at '".$dest."' parcel courier offices";
			mysql_query("UPDATE parcel SET status='reached' WHERE courier_nopl='".$updatecplate."'");
			}
			else
			{
			$message = "Your parcel has reached '".$dest."'";
			}
			ozekiSend($rec,$message,$debug);

}


echo 2;
}
else
{
echo 0;
}
?>
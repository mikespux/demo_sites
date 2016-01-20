<?php
include('db.php');
if($_GET['clparcels'])
{
$id=$_GET['clparcels'];
$sql= ('UPDATE parcel SET status="recieved"')
 mysql_query( $sql);
 echo 1;

}
else
{
echo 0;
}

?>
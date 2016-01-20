<?php
include ('scripts/db.php');
$random =(rand(10,100));
$random1 =(rand(15,123));
$parcel_name = $_POST['parcel_name'];
$amount = $_POST['amount'];
$parcel_weight = $_POST['parcel_weight'];
$sender_number = $_POST['sender_number'];
$receiever_no = $_POST['receiever_no'];
$courier_name = $_POST['courier_name'];
$destination = $_POST['destination'];
$number_plate = $_POST['number_plate'];
$id_no = $_POST['id_no'];

if(isset($sender_number) && isset($receiever_no) && isset($number_plate)) 
{
mysql_query("INSERT INTO parcel (parcel_no, parcel_weight,parcel_name,sender_pno,sender_idno,reciever_no,cost,courier_name,destination,courier_nopl,passlock)
values('$random','$parcel_weight','$parcel_name','$sender_number','$id_no','$receiever_no','$amount','$courier_name','$destination','$number_plate','$random1')
");
$alert='<span class="alert alert-success" style="width:100%">Parcel successfully registered</span>';
include('./parcel.php');
}
?>
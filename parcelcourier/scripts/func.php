<?php
include('db.php');
$cplate = $_POST['cplate'];
$cname = $_POST['cname'];
$csubmit = $_POST['csubmit'];
//update location varibales
$updatesubmit= $_POST['updatesubmit'];
$updatecplate= $_POST['updatecplate'];
$destination= $_POST['destination'];
function getTname()
{
$query =mysql_query('SELECT DISTINCT name FROM tracks');
while ($row = mysql_fetch_array($query))
{
 echo '<option >'.$row['name'].'</option>';
}
}
function getPlate()
{
$query =mysql_query('SELECT DISTINCT plate FROM tracks');
while ($row = mysql_fetch_array($query))
{
 echo '<option >'.$row['plate'].'</option>';
}
}
function getRec()
{
$query =mysql_query('SELECT DISTINCT reciever_no FROM parcel');
while ($row = mysql_fetch_array($query))
{
 echo '<option >'.$row['reciever_no'].'</option>';
}
}
if(isset($csubmit))
{
mysql_query("INSERT INTO tracks(plate, name) values('$cplate','$cname')");
echo 1;
}
		else if(isset($updatesubmit))
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
						$message = "Your parcel has reached ".$destination."";
						}
				ozekiSend($rec,$message,$debug);

				}

		echo 2;
		}
		
else if($_GET['func'] == "recphone" && isset($_GET['func'])) { 
 recphone($_GET['drop_var']); 
   
}
		
else
{
echo 0;
}
function recphone($drop_var)
{

$query = mysql_query('SELECT * FROM parcel where reciever_no="'.$drop_var.'"');
echo '<div class="block-flat">
						<div class="header">							
							<h3>Customers Parcel</h3>
						</div>
						<div class="content">
							<table>
								<thead>
									<tr>
										<th >Sender</th>
										<th>Reciever</th>
										<th>Parcel No</th>
										<th class="text-right">Actions</th>
									</tr>
								</thead><tbody>';
while ($row =mysql_fetch_array($query))
{
$id = $row['id'];
echo '
								
									<tr class="record">
										<td >'.$row['sender_pno'].'</td>
										<td>'.$row['reciever_no'].'</td>
										<td class="text-right">'.$row['parcel_no'].'</td>
										<td class="text-center">
										<a class="label label-danger" href="#" title="Clear parcel" clparcels="'.$id.'"  id="clparcel'.$id.'">Clear Parcel <i class="fa fa-check"></i></a></td>
									</tr>';
									echo "<script type='text/javascript'>
									$(function() {
									$('#wait_1').hide();
									
									$('#clparcel".$id."').click(function(){
									//Save the link in a variable called element
									
									var element = $(this);
									var resultclear = $('.resultclear'); // Get the result div
									//Find the id of the link that was clicked
									var del_id = element.attr('clparcels');

									//Built a url to send
									var info = 'clparcels=' + del_id;
										  if(confirm('Sure you want to clear this parcel?? There is NO undo!'))
											  {
										  $.ajax({
									   type: 'GET',
									   url: 'scripts/clearparcel.php',
									   data: info,
									   success: function(responseText){									   
									    if(responseText == 0){
									   resultclear.html('<div class=\'alert alert-warning text-center\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\'><i class=\'icon-remove\'></i></button>You succefully deactivated the user.<br /></div>');
									  
									   }
									   if(responseText == 1){
									   resultclear.html('<div class=\'alert alert-success text-center\'><button type=\'button\' class=\'close\' data-dismiss=\'alert\'><i class=\'icon-remove\'></i></button>You succefully activated the user.<br /></div>');
									 
									   }
									   }
									   
									 });
									 
											 $(this).parents('.record').animate({ backgroundColor: '#fbc7c7' }, 'fast')
											.animate({ opacity: 'hide' }, 'slow');
										  }
											return false;
										});
									});
									</script>
									";
									
								
}
echo '</tbody>
							</table>						
						</div>
					</div>';
}

?>

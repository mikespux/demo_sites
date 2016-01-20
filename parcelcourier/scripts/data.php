<?php

include('db.php');
function getparcels()
{
echo '<thead>
										<tr>
											<th>Parcel No</th>
											<th>Sender</th>
											<th>Reciever</th>
											<th>Cost</th>
											
										</tr>
									</thead><tbody>';
									
								$query =	mysql_query("SELECT * FROM parcel");
								while($row = mysql_fetch_array($query))
								{
								
									echo '
										<tr class="odd gradeX">
											<td>'.$row['parcel_no'].'</td>
											<td>'.$row['sender_pno'].'</td>
											<td>'.$row['reciever_no'].'</td>
											<td>'.$row['cost'].'</td>
											
										</tr>
										';
									
									}
								echo '</tbody>';

}

?>
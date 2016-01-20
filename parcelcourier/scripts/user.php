<?php

include('db.php');
function getusers()
{
echo '<thead>
										<tr>
											<th>User ID</th>
											<th>User Name</th>
											<th>User Mail</th>
											<th>State</th>
											
										</tr>
									</thead><tbody>';
									
								$query =	mysql_query('SELECT * FROM users');
								while($row = mysql_fetch_array($query))
								{
								
									echo '
										<tr class="odd gradeX">
											<td>'.$row['id'].'</td>
											<td>'.$row['username'].'</td>
											<td>'.$row['email'].'</td>
											<td>'.$row['state'].'</td>
											
										</tr>
										';
									
									}
								echo '</tbody>';';

}

?>
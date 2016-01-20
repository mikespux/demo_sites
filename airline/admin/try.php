<?php

require_once("connection.php");
$sql="SELECT market_name FROM markets";
$result=mysql_query($sql);
?>
<p>
									       <label>Market Name</label>
<select name="market_name" id="market_name" class="small-input">
<option>chhose</option>
<?php
while($row=mysql_fetch_array($result))
{
?>
<option><?php echo $row['market_name']; ?></option>
<?php
}
?>
</select>
</p>
											
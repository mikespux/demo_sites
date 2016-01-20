<?php
if ($submit=="Send")
{
$url='http://127.0.0.1:9501/api?';
$url.="action=sendMessage";
$url.="&login=admin";
$url.="&password=ozeki";
$url.="&recepient=".urlencode($recepient);
$url.="&messageData=".urlencode($message);
$url.="&sender=".urlencode($sender);
echo "<table border=0>
<tr>
<td>Sender</td><td><input type='text' name='sender'></td>
</tr>";
file($url);
}
?>
<html>
<form method=post action='txt.php'>
<tr>
<td>Recepient</td><td><input type='text' name='recepient'></td>
</tr>
<tr>
<td>Message</td><td><input type='text' name='message'</td>
</tr>
<tr>
<td colspan=2><input type=submit name=submit value=Send>
</form>
</tr>
</table>
</form>
</html>

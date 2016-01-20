<?php
session_start();
ob_start();
if($_SESSION['username']=='')
{
header('Location:index.php');
}

?>
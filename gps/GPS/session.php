<?php
session_start();
if(!session_is_registered('id')) {
	header("location:login.php?error=Maaf, Anda Belum Login");	
}
?>
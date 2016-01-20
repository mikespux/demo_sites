<?php

	session_start();
	session_destroy();
	header('Location: http://localhost/airline/index.php');

?>